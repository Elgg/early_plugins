<?php

	/**
	 * Elgg Friends widget
	 * This plugin allows users to put a list of their friends, on their profile
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	
		function friends_init() {
    		
    		// Load system configuration
				global $CONFIG;
				
			// Load the language file
				register_translations($CONFIG->pluginspath . "friends/languages/");
				
		    // Set up menu for logged in users
				if (isloggedin())
					    add_menu(elgg_echo('friends'), $CONFIG->wwwroot . "pg/friends/" . $_SESSION['user']->username);
    		
    		//add submenu options
				if (get_context() == "friends" || get_context() == "friendsof") {
					add_submenu_item(elgg_echo('friends'),$CONFIG->wwwroot."pg/friends/" . $_SESSION['user']->username);
					add_submenu_item(elgg_echo('friends:of'),$CONFIG->wwwroot."pg/friendsof/" . $_SESSION['user']->username);
					add_submenu_item(elgg_echo('friends:collections'), $CONFIG->wwwroot . "mod/friends/collections.php");
					add_submenu_item(elgg_echo('friends:new'),$CONFIG->wwwroot."mod/friends/add.php");
				}
    		
    		//add a widget
			    add_widget_type('friends',"Friends","Display some of your friends.");
			
		}
		
		register_elgg_event_handler('init','system','friends_init');
		
		// Register actions
		global $CONFIG;
		register_action('friends/addcollection',false,$CONFIG->pluginspath . "friends/actions/addcollection.php");
		register_action('friends/deletecollection',false,$CONFIG->pluginspath . "friends/actions/deletecollection.php");
        register_action('friends/editcollection',false,$CONFIG->pluginspath . "friends/actions/editcollection.php");
        
?>