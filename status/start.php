<?php

	/**
	 * Elgg status plugin
	 * This plugin allows users to set their current status
	 * @todo - use ajax for the refresh
	 * @todo - alow uses to pull in their status from an external service such as facebook
	 * 
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	
		function status_init() {
			
			add_widget_type('status',"". elgg_echo("status:status") . "","" . elgg_echo("status:desc") . ".");
			
		}
		
		register_elgg_event_handler('init','system','status_init');

?>