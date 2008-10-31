<?php

	/**
	 * Elgg thewire: add shout action
	 * 
	 * @package Elggthewire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) forward();

	// Get input data
		$body = get_input('note');
		$tags = get_input('thewiretags');
		$access_id = get_input('access_id');
		$method = get_input('method');
		$parent = get_input('parent');
		if(!$parent)   
		    $parent = 0;
	
	// convert the shout body into tags
	    $tagarray = filter_string($body);
		
	// Make sure the title / description aren't blank
		if (empty($body)) {
			register_error(elgg_echo("thewire:blank"));
			forward("mod/thewire/add.php");
			
	// Otherwise, save the thewire post 
		} else {
			
	// Initialise a new ElggObject
			$thewire = new ElggObject();
	// Tell the system it's a thewire post
			$thewire->subtype = "thewire";
	// Set its owner to the current user
			$thewire->owner_guid = $_SESSION['user']->getGUID();
	// For now, set its access to public (we'll add an access dropdown shortly)
			$thewire->access_id = $access_id;
	// Set its description appropriately
			$thewire->description = $body;
			
    // add some metadata
	        $thewire->method = $method; //method, e.g. via site, sms etc
	        $thewire->parent = $parent; //used if the note is a reply
			
	// Before we can set metadata, we need to save the thewire post
			if (!$thewire->save()) {
				register_error(elgg_echo("thewire:error"));
				forward("mod/thewire/add.php");
			}
	        
	// Now let's add tags. We can pass an array directly to the object property! Easy.
			if (is_array($tagarray)) {
				$thewire->tags = $tagarray;
			}
	        
	// Success message
			system_message(elgg_echo("thewire:posted"));
	
	// Forward to the main thewire page
			forward("mod/thewire/?username=" . $_SESSION['user']->username);
				
		}
		
?>