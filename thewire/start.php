<?php

	/**
	 * Elgg wire plugin
	 * The wire is simple twitter like plugin that allows users to post notes to the wire
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	require_once(dirname(__FILE__) . '/thewire_functions.php');
	 
	function thewire_init() {
			
			// Load system configuration
				global $CONFIG;
				
			// Set up menu for logged in users
				if (isloggedin()) {
					add_menu(elgg_echo('thewire'), $CONFIG->wwwroot . "mod/thewire/everyone.php");		
				} 
				
			// Extend system CSS with our own styles, which are defined in the thewire/css view
				extend_view('css','thewire/css');
				
		    //extend views
				extend_view('activity/thewire', 'thewire/activity_view');
				extend_view('profile/status', 'thewire/profile_status');
				
			// Register a page handler, so we can have nice URLs
				register_page_handler('thewire','thewire_page_handler');
				
			// Register a URL handler for thewire posts
				register_entity_url_handler('thewire_url','object','thewire');
				
			// Your thewire widget
			    add_widget_type('thewire',elgg_echo("thewire:readuser"),elgg_echo("thewire:yourdesc"));
			    
			// Register entity type
				register_entity_type('object','thewire');
				
			// Listen for SMS create event
			register_elgg_event_handler('create','object','thewire_incoming_sms');
			
			// Register granular notification for this type
			if (is_callable('register_notification_object'))
				register_notification_object('object', 'thewire', elgg_echo('thewire:newpost'));
			
			// Listen to notification events and supply a more useful message for SMS'
			register_plugin_hook('notify:entity:message', 'object', 'thewire_notify_message');

			// Register create wire object handler for any event
			//register_elgg_event_handler('create','all','thewire_create_object', 1000); // We want this to appear after command processing

		}
		
		function thewire_pagesetup() {
			
			global $CONFIG;

			//add submenu options
				if (get_context() == "thewire") {
					if ((page_owner() == $_SESSION['guid'] || !page_owner()) && isloggedin()) {
						add_submenu_item(elgg_echo('thewire:read'),$CONFIG->wwwroot."pg/thewire/" . $_SESSION['user']->username);
						add_submenu_item(elgg_echo('thewire:everyone'),$CONFIG->wwwroot."mod/thewire/everyone.php");
						//add_submenu_item(elgg_echo('thewire:add'),$CONFIG->wwwroot."mod/thewire/add.php");
					} 
				}
			
		}
		
		/**
		 * thewire page handler; allows the use of fancy URLs
		 *
		 * @param array $page From the page_handler function
		 * @return true|false Depending on success
		 */
		function thewire_page_handler($page) {
			
			// The first component of a thewire URL is the username
			if (isset($page[0])) {
				set_input('username',$page[0]);
			}
			
			// The second part dictates what we're doing
			if (isset($page[1])) {
				switch($page[1]) {
					case "friends":		// TODO: add friends thewire page here
										break;
				}
			// If the URL is just 'thewire/username', or just 'thewire/', load the standard thewire index
			} else {
				@include(dirname(__FILE__) . "/index.php");
				return true;
			}
			
			return false;
			
		}

		function thewire_url($thewirepost) {
			
			global $CONFIG;
			return $CONFIG->url . "pg/thewire/" . $thewirepost->getOwnerEntity()->username;
			
		}
		
		/**
		 * Returns a more meaningful message for SMS messages.
		 *
		 * @param unknown_type $hook
		 * @param unknown_type $entity_type
		 * @param unknown_type $returnvalue
		 * @param unknown_type $params
		 */
		function thewire_notify_message($hook, $entity_type, $returnvalue, $params)
		{
			$entity = $params['entity'];
			$to_entity = $params['to_entity'];
			$method = $params['method'];
			if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'thewire'))
			{
				$descr = $entity->description;
				if ($method == 'sms') {
					$owner = $entity->getOwnerEntity();
					return $owner->username . ': ' . $descr;
				}
				if ($method == 'email') {
					$owner = $entity->getOwnerEntity();
					return $owner->username . ': ' . $descr . "\n\n" . $entity->getURL();
				}
			}
			return null;
		}
		
		/**
		 * Create a new wire post.
		 *
		 * @param string $post The post
		 * @param int $access_id Public/private etc
		 * @param int $parent Parent post (if any)
		 * @param string $method The method (default: 'site')
		 * @return bool
		 */
		function thewire_save_post($post, $access_id, $method = "site")
		{
			
			global $SESSION; 
			
			// Initialise a new ElggObject
			$thewire = new ElggObject();
			
			// Tell the system it's a thewire post
			$thewire->subtype = "thewire";
			
			// Set its owner to the current user
			$thewire->owner_guid = get_loggedin_userid();
			
			// For now, set its access to public (we'll add an access dropdown shortly)
			$thewire->access_id = $access_id;
			
			// Set its description appropriately
			$thewire->description = $post;
			
		    // add some metadata
	        $thewire->method = $method; //method, e.g. via site, sms etc
	        
	        //save
			$save = $thewire->save();
	        
			if($save){
				add_to_river('river/object/thewire/create','create',$SESSION['user']->guid,$thewire->guid);
				//create an empty annotation so we can pull out all wire messages using the annotation
				//functions
				$thewire->annotate('wire_reply',"",$thewire->access_id, $_SESSION['guid']);
			}
	        
	        
	        return $save;

		}
		
		/**
		 * Create a reply wire post.
		 *
		 * @param string $post The post
		 * @param int $access_id Public/private etc
		 * @param int $parent Parent post (if any)
		 * @param string $method The method (default: 'site')
		 * @param array $relationship The relationships for the parent object
		 * @return bool
		 */
		function thewire_reply_post($post, $access_id, $method = "site", $relationship)
		{
			
			global $SESSION; 
			
			//check the array exists
			if(isset($relationship)){
				foreach($relationship as $mess){
					//we only want the relationship "on_the_wire"
					if($mess->relationship == "on_the_wire"){
						$parent = (int)$mess->guid_one;//this is the parent object the comment is one
						$wire_message = (int)$mess->guid_two;//this is that parent's wire message
						break;
					}
				}
			}
			
			//grab the entities
			$parent_object = get_entity($parent);
			$thewire_object = get_entity($wire_message);
			
			//Set some data
			$reply = $post;
			$access_id = $parent_object->access_id;
			$method = $method;
			$owner_guid = $_SESSION['user']->guid; //you need to be logged in to post a reply
			
			// Make sure the message isn't blank and the entities exist
			if(empty($reply) || !($thewire_object) || !($parent_object)) {
				
				return false;
			
			}else{
				
				if($thewire_object->annotate('wire_reply',$reply,$access_id, $owner_guid))
					return true;
				else
					return false;
				
			}

		}
		
		/**
		 * Listen and process incoming SMS'
		 */
		function thewire_incoming_sms($event, $object_type, $object)
		{
			global $CONFIG;
			if (($object) && ($object->subtype == get_subtype_id('object', 'sms')))
			{
				// Get user from phone number
				if ((is_plugin_enabled('smsclient')) && (is_plugin_enabled('smslogin')))
				{
					$access_id = $CONFIG->default_access; 
					// By this stage the owner should be logged in (requires SMS Login)
					if (thewire_save_post($object->description, $access_id, 'sms'))
						return false;
					
				}
			}
					
			return true; // always create the shout even if it can't be sent
		}

	/**
	 * Creates a new message when a new object is created
	 */
		function thewire_create_object($event, $object_type, $object) {

			if ($object instanceof ElggObject) {
				//perhaps we need an array of objects not to include?
				if ($object->getSubtype() != 'thewire' && $object->getSubtype() != 'messages' && $object->getSubtype() != 'todo' &&
					(!empty($object->title) || !empty($object->description))) {
						
					if (empty($object->title)) {
						$title = $object->description;
					} else {
						$title = $object->title;
					}
					
					//$url = thewire_shrink_url($object->getURL());
					$url = $object->getURL();
					
					$subtype = thewire_get_subtype($object->getSubtype());
					
					if (strlen($title . ' ' . $url) > 140) {
						$lengthtocut = strlen($title . ' ' . $url) - 136;
						$title = substr($title,0,strlen($title) - $lengthtocut);
						$title = $lengthtocut;
					}
					
					$text = "<a href=\"{$url}\">" . $title . "</a>"; // . $url;
					
					$save_post = thewire_save_post($text, $object->access_id,$subtype);
					
					//if post saved create a link between the object and wire post
					//guid one is the object and guid two is the wire post
					if($save_post)
						add_entity_relationship($object->guid, "on_the_wire", $save_post);
					
				}
				
			}
			
			if ($object instanceof ElggGroup) {
				if ($object->getType() == 'group' && $object->getSubtype() != 'messages' &&
					(!empty($object->name))) {
						
					$title = $object->name;
					
					//$url = thewire_shrink_url($object->getURL());
					$url = $object->getURL();
					
					if (strlen($title . ' ' . $url) > 140) {
						$lengthtocut = strlen($title . ' ' . $url) - 136;
						$title = substr($title,0,strlen($title) - $lengthtocut);
						$title = $lengthtocut;
					}
					
					$via_group = elgg_echo("thewire:agroup");		
					$text = elgg_echo("thewire:createdgroup") . ": " . $title . ' ' . $url;				
					thewire_save_post($text, $object->access_id,$via_group);
					
				}
				
			}
			
			if ($object instanceof ElggAnnotation) {
				if (($object->getSubtype() == 'generic_comment' || $object->getSubtype() == 'group_topic_post') && $object->getSubtype() != 'messages') {
					if ($real_obj = get_entity($object->entity_guid)) {

						if ($real_obj instanceof ElggEntity) {
						
							$title = '';
							if (empty($real_obj->title)) {
								$title = $real_obj->description;
							} else {
								$title = $real_obj->title;
							}
							
							$via_comment = elgg_echo("thewire:acomment");
							$obect_url = "<a href=\"{$real_obj->getURL()}\">" . $title . "</a>";
							
							$text = sprintf(elgg_echo('thewire:comment'),$title) . ' ' . $obect_url;
							
							//get relationships, this is to attach a reply to the main object wire post
							$get_message_guid = get_entity_relationships($real_obj->guid);
							
							//post this comment as a reply to the main objects wire message
							thewire_reply_post($text, $real_obj->access_id, $via_comment, $get_message_guid);
							
							//thewire_save_post($text, $real_obj->access_id,$via_comment);
						
						}
						
					}
				}
			}
			
			return true;
			
		}
		
	/**
	 * Returns a nice string for an object's subtype
	 *
	 * @param string $subtype the object's registered subtype
	 * @return string a friendly version for the wire.
	 */
	 
	function thewire_get_subtype($subtype){
	
		switch($subtype){
			case 'blog':
			$new_subtype = "blogs";
			break;
			case 'file':
			$new_subtype = "files";
			break;
			case 'groupforumtopic':
			$new_subtype = "group discussion";
			break;
			case 'Comments':
			$new_subtype = "comments";
			break;
			case 'page':
			$new_subtype = "pages";
			break;
			case 'page_top':
			$new_subtype = "pages";
			break;
			default:
			$new_subtype = $subtype; //if no match just return the object's subtype
			break;
		}
			
		return $new_subtype;
		
	}
	
	// Make sure the thewire initialisation function is called on initialisation
		register_elgg_event_handler('init','system','thewire_init');
		register_elgg_event_handler('pagesetup','system','thewire_pagesetup');
		
	// Register actions
		global $CONFIG;
		register_action("thewire/add",false,$CONFIG->pluginspath . "thewire/actions/add.php");
		register_action("thewire/reply",false,$CONFIG->pluginspath . "thewire/actions/reply.php");
		register_action("thewire/track",false,$CONFIG->pluginspath . "thewire/actions/track.php");
		register_action("thewire/delete",false,$CONFIG->pluginspath . "thewire/actions/delete.php");
		register_action("thewire/delete_reply",false,$CONFIG->pluginspath . "thewire/actions/delete_reply.php");
		
?>