<?php

	/**
	 * Elgg read a message page
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
		
	// Get the full message object to read
	    $message = get_entity(get_input("message"));
	    
	// If the message is being read from the inbox, mark it as read, otherwise don't
	// this is to stop a user who checks out a message they have sent having it being marked 
	// as read for the recipient
	    if(get_input('type') != "sent"){
    	    
            // Mark the message as being read now
	        if ($message->getSubtype() == "messages") {
    	    
    	        //set the message metadata to 1 which equals read
    	        $message->readYet = 1;
    	    
	        }
	        
        }
	    
    // Display it
	    $area1 = elgg_view("object/messages",array(
											'entity' => $message,
											'entity_owner' => $page_owner,
											'full' => true
											));
											
    // select the canvas area
        $body = elgg_view_layout("one_column", $area1);
		
	// Display page
		page_draw(sprintf(elgg_echo('messages:message')),$body);
		
?>