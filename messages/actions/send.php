<?php

    /**
	 * Elgg send a message action page
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
	 // Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) forward();
     
    // Get input data
		$title = get_input('title'); // message title
        $message_contents = get_input('message'); // the message
        $send_to = get_input('send_to'); // this is the user guid to whom the message is going to be sent
        $reply = get_input('reply'); // this is the guid of the message replying to
        
    // put in another check to make sure the user can only send messages as themselves
        $owner_id = $_SESSION['user']->getGUID();
		
    // Make sure the message field and send to field are not blank
		if (empty($message_contents) || empty($send_to)) {
			register_error(elgg_echo("messages:blank"));
			forward("mod/messages/send.php");
			
	// Otherwise, 'send' the message 
		} else {
    		
    // Initialise a new ElggObject
			$message = new ElggObject();
	// Tell the system it's a message
			$message->subtype = "messages";
	// Set its owner to the current user
			$message->owner_guid = $_SESSION['user']->getGUID();
	// For now, set its access to public (we'll add an access dropdown shortly)
			$message->access_id = 2;
	// Set its description appropriately
			$message->title = $title;
			$message->description = $message_contents;
			
    // set the metadata
            $message->toId = $send_to; // the user receiving the message
            $message->readYet = 0; // this is a toggle between 0 / 1 (1 = read)
            $message->hiddenFrom = 0; // this is used when a user deletes a message in their sentbox, it is a flag
            $message->hiddenTo = 0; // this is used when a user deletes a message in their inbox
            
			
			
	    // Save 'send' the message
			if (!$message->save()) {
				register_error(elgg_echo("messages:error"));
				forward("mod/messages/send.php");
			}
			
	    // if the new message is a reply then create a relationship link between the new message
	    // and the message it is in reply to
	    
	        if($reply){
    	        
    	        $create_relationship = add_entity_relationship($message->guid, "reply", $reply);
    	        
	        }
			
        // Success message
			system_message(elgg_echo("messages:posted"));
	
        // Forward to the users sentbox
			forward("mod/messages/sent.php");	
    
        } // end of message check if statement
     
    
?>