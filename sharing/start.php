<?php

	/**
	 * Elgg sharing plugin
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Sharing initialisation function
		function sharing_init() {
			
			// Grab the config file
				global $CONFIG;
			
			// Set up menu for logged in users
				if (isloggedin()) {
					add_menu(elgg_echo('sharing'), $CONFIG->wwwroot . "pg/sharing/",array(
						menu_item(elgg_echo('sharing:add'),$CONFIG->wwwroot."mod/sharing/add.php"),
						// menu_item(elgg_echo('sharing:this'),$CONFIG->wwwroot."mod/sharing/add.php?address=previous"),
						menu_item(elgg_echo('sharing:this'),"javascript:location.href='". $CONFIG->wwwroot . "mod/sharing/add.php?address='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)"),
						menu_item(elgg_echo('sharing:read'),$CONFIG->wwwroot."pg/sharing/" . $_SESSION['user']->username),
						menu_item(elgg_echo('sharing:inbox'),$CONFIG->wwwroot."pg/sharing/" . $_SESSION['user']->username . "/inbox"),
						menu_item(elgg_echo('sharing:friends'),$CONFIG->wwwroot."pg/sharing/" . $_SESSION['user']->username . "/friends"),
						menu_item(elgg_echo('sharing:everyone'),$CONFIG->wwwroot."mod/sharing/everyone.php"),
						menu_item(elgg_echo('sharing:bookmarklet'),$CONFIG->wwwroot."mod/sharing/bookmarklet.php"),
					));
			// And for logged out users
				} else {
					add_menu(elgg_echo('sharing'), $CONFIG->wwwroot . "mod/sharing/everyone.php",array(
						menu_item(elgg_echo('sharing:everyone'),$CONFIG->wwwroot."mod/sharing/everyone.php"),
					));
				}
				
			// Register a page handler, so we can have nice URLs
				register_page_handler('sharing','sharing_page_handler');
				
			// Add our CSS
				extend_view('css','sharing/css');
			
		}
		
		/**
		 * Shares page handler; allows the use of fancy URLs
		 *
		 * @param array $page From the page_handler function
		 * @return true|false Depending on success
		 */
		function sharing_page_handler($page) {
			
			// The first component of a share URL is the username
			if (isset($page[0])) {
				set_input('username',$page[0]);
			}
			
			// The second part dictates what we're doing
			if (isset($page[1])) {
				switch($page[1]) {
					case "read":		set_input('share',$page[2]);
										@include(dirname(__FILE__) . "/read.php");
										break;
					case "friends":		@include(dirname(__FILE__) . "/friends.php");
										break;
					case "inbox":		@include(dirname(__FILE__) . "/inbox.php");
										break;
				}
			// If the URL is just 'sharing/username', or just 'sharing/', load the standard share index
			} else {
				@include(dirname(__FILE__) . "/index.php");
				return true;
			}
			
			return false;
			
		}

	// Make sure the initialisation function is called on initialisation
		register_elgg_event_handler('init','system','sharing_init');

	// Register actions
		global $CONFIG;
		register_action('sharing/add',false,$CONFIG->pluginspath . "sharing/actions/add.php");
		register_action('sharing/delete',false,$CONFIG->pluginspath . "sharing/actions/delete.php");

?>