<?php

	/**
	 * Elgg sent messages page
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
		
	// Get the logged in user
		$page_owner = $_SESSION['user'];
		set_page_owner($page_owner->getGUID());
		
    // Display all the messages a user owns, these will make up the sentbox
		$messages = $page_owner->getObjects('messages');
		
	// Display them
		$body = elgg_view("messages/view",array('entity' => $messages, 'page_view' => "sent"));
		
	// Display page
		page_draw(sprintf(elgg_echo('messages:sentMessages'),$page_owner->name),$body);
		
?>