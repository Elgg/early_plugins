<?php

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'messageboard:board' => "Message board",
			'messageboard:desc' => "This is a message board that you can put on your profile where other users can comment.",
			
         /**
	     * Message board widget river
	     **/
	        
	        'messageboard:river:annotate' => "%s has had a new comment posted on their message board.",
	        'messageboard:river:create' => "%s added the message board widget.",
	        'messageboard:river:update' => "%s updated their message board widget.",
			
		/**
		 * Status messages
		 */
	
			'messageboard:posted' => "You successfully posted on the message board.",
			'messageboard:deleted' => "You successfully deleted the message.",
	
		/**
		 * Error messages
		 */
	
			'messageboard:blank' => "Sorry; you need to actually put something in the message area before we can save it.",
			'messageboard:notfound' => "Sorry; we could not find the specified item.",
			'messageboard:notdeleted' => "Sorry; we could not delete this message.",
	     
			'messageboard:failure' => "An unexpected error occurred when adding your message. Please try again.",
	
	);
					
	add_translation("en",$english);

?>