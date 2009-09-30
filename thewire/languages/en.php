<?php

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'thewire' => "The wire",
			'thewire:user' => "%s's wire",
			'thewire:posttitle' => "%s's wire: %s",
			'thewire:everyone' => "All conversations",
			'thewire:all' => "All conversations",
			'thewire:read' => "Your conversations",	
			'thewire:strapline' => "%s",
			'thewire:add' => "Post a message",
			'thewire:post' => "Post",
		    'thewire:text' => "A message",
			'thewire:reply' => "reply",
			'thewire:replies' => "replies",
			'thewire:via' => "via",
			'thewire:viasite' => "via site",
			'thewire:mentions' => "@mentions",
			'thewire:conversationstarted' => "Conversation started",
			'thewire:viewconversation' => "View conversation",
			'thewire:hideconversation' => "Hide conversation",
			'thewire:wired' => "Posted to the wire",
			'thewire:charleft' => "characters left",
			'item:object:thewire' => "The wire",
			'thewire:notedeleted' => "note deleted",
			'thewire:doing' => "Post a message:",
			'thewire:newpost' => 'Post a message:',
			'thewire:addpost' => 'Post a message:',
			'thewire:latest' => 'Latest',
			'thewire:comment' => 'commented on ',
			'thewire:acomment' => 'a comment',
			'thewire:agroup' => 'groups',
			'thewire:createdgroup' => 'New group',
			'thewire:readuser' => 'Conversations',
			'thewire:untrackmsg' => 'You are no longer tracking that conversation',
			'thewire:trackmsg' => 'You are now tracking that conversation',
			'thewire:trackerror' => 'There has been a problem tracking or removing this tracked conversation',
			'thewire:remove' => 'remove',
			'thewire:track' => 'track',
			'thewire:untrack' => 'untrack',
			'thewire:trackeditems' => 'Tracked items',
			'thewire:more' => 'More',
	
        /**
	     * The wire river
	     **/
	        
	        //generic terms to use
	        'thewire:river:created' => "posted",
	        
	        //these get inserted into the river links to take the user to the entity
	        'thewire:river:create' => "a message to the wire",
	        
	    /**
	     * Wire widget
	     **/
	     
	        'thewire:sitedesc' => 'This widget shows the latest from The wire',
	        'thewire:yourdesc' => 'This widget shows your conversations on The Wire',
	        'thewire:friendsdesc' => 'This widget will show the latest from your friends on The Wire',
	        'thewire:friends' => 'Your friends conversations',
	        'thewire:num' => 'Number of items to display',
	        
	        
	
		/**
		 * Status messages
		 */
	
			'thewire:posted' => "Your wire message was successfully posted.",
			'thewire:deleted' => "Your wire message was successfully deleted.",
	
		/**
		 * Error messages
		 */
	
			'thewire:blank' => "Sorry; you need to actually put something in the textbox before we can save it.",
			'thewire:notfound' => "Sorry; we could not find the specified wire message.",
			'thewire:notdeleted' => "Sorry; we could not delete this wire message.",
	
	
		/**
		 * Settings
		 */
			'thewire:smsnumber' => "Your SMS number if different from your mobile number (mobile number must be set to public to post The wire). All phone numbers must be in international format.",
			'thewire:channelsms' => "The number to send SMS messages to is <b>%s</b>",
			
	);
					
	add_translation("en",$english);

?>