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
		
    // Get the users friends; this is used in the drop down to select who to send the message to
        $friends = $_SESSION['user']->getFriends();
        
    // Set the page title
	    $area1 = elgg_view_title(elgg_echo("messages:sendmessage"));
        
    // Get the send form
		$area1 .= elgg_view("messages/forms/message",array('friends' => $friends));

	// Format
		$body = elgg_view_layout("one_column", $area1);
		
	// Draw page
		page_draw(sprintf(elgg_echo('messages:send'),$page_owner->name),$body);
		
?>