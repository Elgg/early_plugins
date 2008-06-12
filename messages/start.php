<?php

	/**
	 * Elgg internal messages plugin
	 * This plugin lets user send each other messages.
	 * Each message has a series of metadata which is used to control who the message displays
	 * 
	 * The metadata toggles are hiddenForm - used to delete from the sentbox, hiddenTo - used to delete from the inbox,
	 * readYet - 0 means no, 1 means yes it has been read
	 * This is actually a tricky little plugin as there is only ever one instance of a message, how it is viewed
	 * depends on how it is looked at and by who, the owner or recipient
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	/**
	 * Messages initialisation
	 *
	 * These parameters are required for the event API, but we won't use them:
	 * 
	 * @param unknown_type $event
	 * @param unknown_type $object_type
	 * @param unknown_type $object
	 */
	 
	    function messages_init() {
    	    
    	    // Load system configuration
				global $CONFIG;
				
			// Load the language file
				register_translations($CONFIG->pluginspath . "messages/languages/");
				
			// Menu options
				if (isloggedin()) {
		
					add_menu(elgg_echo('messages'), $CONFIG->wwwroot . "pg/messages/",array(
						menu_item(elgg_echo('messages:inbox'),$CONFIG->wwwroot."pg/messages/" . $_SESSION['user']->username),
						menu_item(elgg_echo('messages:send'),$CONFIG->wwwroot."mod/messages/send.php"),
						menu_item(elgg_echo('messages:sent'),$CONFIG->wwwroot."mod/messages/sent.php"),
					));
			
				}
				
			// Extend system CSS with our own styles, which are defined in the shouts/css view
				extend_view('css','messages/css');
			
			// Register a page handler, so we can have nice URLs
				register_page_handler('messages','messages_page_handler');
				
			// Register a URL handler for shouts posts
				register_entity_url_handler('messages_url','object','messages');
		}
		
		/**
		 * messages page handler; allows the use of fancy URLs
		 *
		 * @param array $page From the page_handler function
		 * @return true|false Depending on success
		 */
		function messages_page_handler($page) {
			
			// The first component of a messages URL is the username
			if (isset($page[0])) {
				set_input('username',$page[0]);
			}
			
			// The second part dictates what we're doing
			if (isset($page[1])) {
				switch($page[1]) {
					case "read":		set_input('message',$page[2]);
										@include(dirname(__FILE__) . "/read.php");
										break;
				}
			// If the URL is just 'messages/username', or just 'messages/', load the standard messages index
			} else {
				@include(dirname(__FILE__) . "/index.php");
				return true;
			}
			
			return false;
			
		}

		function messages_url($message) {
			
			global $CONFIG;
			return $CONFIG->url . "pg/messages/" . $message->getOwnerEntity()->username . "/read/" . $message->getGUID();
			
		}
		
	// Make sure the messages initialisation function is called on initialisation
		register_elgg_event_handler('init','system','messages_init');
		
	// Register actions
		global $CONFIG;
		register_action("messages/send",false,$CONFIG->pluginspath . "messages/actions/send.php");
		register_action("messages/delete",false,$CONFIG->pluginspath . "messages/actions/delete.php");
	 
?>