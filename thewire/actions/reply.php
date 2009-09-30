<?php

	/**
	 * Elgg thewire: reply action
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */

	// Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) forward();

	// Get input data
		$reply = get_input('note');
		$access_id = get_input('access');
		$method = get_input('method');
		$parent = (int)get_input('parent');
		$parent_object = get_entity($parent);
		$owner_guid = $_SESSION['user']->guid; //you need to be logged in to post
		
	// Make sure the message isn't blank
		if (empty($reply)) {
			register_error(elgg_echo("thewire:blank"));
			forward("mod/thewire/reply.php");
			
	// Otherwise, save the thewire post 
		} else {
			
			if(!$parent_object->annotate('wire_reply',$reply,$parent_object->access_id, $_SESSION['guid'])){
				register_error(elgg_echo("thewire:error"));
				forward("mod/thewire/reply.php");
			}
	        
	// Success message
			system_message(elgg_echo("thewire:posted"));
	
	// Forward 
			forward("mod/thewire/everyone.php");
				
		}
		
?>