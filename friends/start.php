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
    		
    		//add a widget
			    add_widget_type('friends',"Friends","Display some of your friends.");
			
		}
		
		register_elgg_event_handler('init','system','friends_init');

?>