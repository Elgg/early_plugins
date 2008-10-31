<?php

	/**
	 * Elgg wire plugin
	 * The wire is simple twitter like plugin that allows users to post notes to the wire
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	/**
	 * thewire initialisation
	 *
	 * These parameters are required for the event API, but we won't use them:
	 * 
	 * @param unknown_type $event
	 * @param unknown_type $object_type
	 * @param unknown_type $object
	 */

		function thewire_init() {
			
			// Load system configuration
				global $CONFIG;
				
			// Load the language file
				register_translations($CONFIG->pluginspath . "thewire/languages/");
				
			// Set up menu for logged in users
				if (isloggedin()) {
		
					add_menu(elgg_echo('thewire'), $CONFIG->wwwroot . "pg/thewire/");
			
				} 
				
			// Extend system CSS with our own styles, which are defined in the thewire/css view
				extend_view('css','thewire/css');
				
		    // Extend system JS with our own javascript, which are defined in the thewire/scripts view
				// extend_view('js','thewire/scripts/counter'); FIND OUT ABOUT THIS
				
			// Register a page handler, so we can have nice URLs
				register_page_handler('thewire','thewire_page_handler');
				
			// Register a URL handler for thewire posts
				register_entity_url_handler('thewire_url','object','thewire');
				
			// Your thewire widget
			    add_widget_type('thewire',elgg_echo("thewire:read"),elgg_echo("thewire:yourdesc"));
			    
			// All site thewire widget
			    add_widget_type('all_thewire',elgg_echo("thewire:everyone"),elgg_echo("thewire:sitedesc"));
			    
	        // Friends thewire widget
			//    add_widget_type('friends_thewire',elgg_echo("thewire:friends"),elgg_echo("thewire:friendsdesc"));
			    
			// Register entity type
				register_entity_type('object','thewire');
				
			// Listen for SMS create event
			register_elgg_event_handler('create','object','thewire_incoming_sms');
			
			// Override access controls
			register_plugin_hook('permissions_check', 'object', 'thewire_permission_override');
			register_plugin_hook('container_permissions_check', 'object', 'thewire_permission_override');

			    
		}
		
		function thewire_pagesetup() {
			
			global $CONFIG;

			//add submenu options
				if (get_context() == "thewire") {
					if ((page_owner() == $_SESSION['guid'] || !page_owner()) && isloggedin()) {
						add_submenu_item(elgg_echo('thewire:read'),$CONFIG->wwwroot."pg/thewire/" . $_SESSION['user']->username);
						add_submenu_item(elgg_echo('thewire:everyone'),$CONFIG->wwwroot."mod/thewire/everyone.php");
						add_submenu_item(elgg_echo('thewire:add'),$CONFIG->wwwroot."mod/thewire/add.php");
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
					case "read":		set_input('thewirepost',$page[2]);
										@include(dirname(__FILE__) . "/read.php");
										break;
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
		 * Listen and process incoming SMS'
		 */
		function thewire_incoming_sms($event, $object_type, $object)
		{
			global $__THEWIRE_CRON_TMP_ENTITY;
			
			if (($object) && ($object->subtype == get_subtype_id('object', 'sms')))
			{
				// Get user from phone number
				$owner = get_entities_from_metadata('plugin:settings:thewire:smsnumber', $object->title, 'user');
				if (!$owner) $owner = get_entities_from_metadata('mobile', $object->title, 'user'); // Try your mobile number if couldn't find explicit number
				if ($owner)
				{
					
					// We have an owner - this is one of our users.
					$owner = $owner[0];
					
					$thewire = new ElggObject();
					$thewire->subtype = "thewire";
					$thewire->owner_guid = $owner->guid;
					$thewire->access_id = 2;
					$thewire->description = $object->description;
			        $thewire->method = 'sms';

			        $__THEWIRE_CRON_TMP_ENTITY = $thewire;
			        
			        $context = get_context();
					set_context(md5($thewire->description));	
					
					$thewire->save();
					// TODO : Stitch up replies & inherit access levels
					
					set_context($context);
					$__THEWIRE_CRON_TMP_ENTITY = null;
			        // We have created a wire entry so stop sms from being saved.
			        return false;
			        
				}
			}
					
			return true; // always create the shout even if it can't be sent
		}
		
		/**
		 * Override permissions to permit saving with owner on logged out data.
		 *
		 */
		function thewire_permission_override($hook, $entity_type, $returnvalue, $params)
		{
			global $__THEWIRE_CRON_TMP_ENTITY;
			$entity = $params['entity'];
			if (!$entity)
				$entity = $__THEWIRE_CRON_TMP_ENTITY;

			if (($entity) && 
				( ($entity->subtype == get_subtype_id('object', 'thewire')) || ($entity->subtype == 'thewire')) 
			&& (get_context() == md5($entity->description)))
			{
				return true;
			}
			
			return $returnvalue;
		}
	
	// Make sure the thewire initialisation function is called on initialisation
		register_elgg_event_handler('init','system','thewire_init');
		register_elgg_event_handler('pagesetup','system','thewire_pagesetup');
		
	// Register actions
		global $CONFIG;
		register_action("thewire/add",false,$CONFIG->pluginspath . "thewire/actions/add.php");
		register_action("thewire/delete",false,$CONFIG->pluginspath . "thewire/actions/delete.php");
		
?>