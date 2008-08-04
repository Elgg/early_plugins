<?php
	/**
	 * Elgg Pages Edit welcome message
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	// Load configuration
	global $CONFIG;
	
	gatekeeper();

	// Get group fields
	$message = get_input("pages_welcome");
	$owner_guid = get_input("owner_guid");
	
	if ($message && $owner_guid){
    	
		$welcome = new ElggObject();
		// Tell the system it's a pages welcome message
		$welcome->subtype = "pages_welcome";
		$welcome->title = "Welcome";
		$welcome->description = $message;
		$welcome->access_id = 2;//public for now
		
		// Set the owner
		$welcome->owner_guid = $owner_guid;
		
	    // save
		if (!$welcome->save()){
			register_error(elgg_echo("pages:welcomeerror"));
		} else {
    		system_message(elgg_echo("pages:welcomeposted"));
		}

		
	} else {
    	
    	register_error(elgg_echo("pages:welcomeerror"));
    	
	}
    	
	// Forward to the main blog page
	forward("pg/pages/owned/" . get_user($owner_guid)->username);
	exit;
	
?>