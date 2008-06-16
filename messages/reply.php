<?php

	/**
	 * Elgg send a message page
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// If we're not logged in, forward to the front page
		if (!isloggedin()) forward();
		
	// get the message being replied to 
	    $message = get_entity(get_input("message"));
		
    // Get the message guid that is being replied to and display the create message form
		$area1 = elgg_view("messages/forms/reply", array('entity' => $message));
		$body = elgg_view_layout("one_column", $area1);
		
	// Display page
		page_draw(sprintf(elgg_echo('messages:send'),$page_owner->name),$body);
		
?>