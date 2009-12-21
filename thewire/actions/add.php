<?php

	/**
	 * Elgg thewire: add shout action
	 * 
	 * @package Elggthewire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */

	// Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) forward();

	// Get input data
		$body = get_input('note');
		$access_id = get_input('access');
		if(!$access_id)
			$access_id = (int)get_default_access(); //if none, inherit the site default
		$location = get_input('location');
		$method = get_input('method');
	
	// Make sure the message isn't blank
		if (empty($body)) {
			register_error(elgg_echo("thewire:blank"));
			forward($_SERVER['HTTP_REFERER']);
			
	// Otherwise, save the thewire post 
		} else {
			
			$wire_post = thewire_save_post($body, $access_id, $method);
			if (!$wire_post) {
				register_error(elgg_echo("thewire:error"));
				if($location == "activity")
					forward("mod/riverdashboard/");
				elseif ($location == 'referer')
					forward($_SERVER['HTTP_REFERER']);
				else 
					forward("mod/thewire/add.php");
			}
			
	// Success message
			system_message(elgg_echo("thewire:posted"));
	
	// Forward 
			//forward("mod/thewire/everyone.php");
			if($location == "activity")
				forward("mod/riverdashboard/");
			elseif ($location == 'referer')
				forward($_SERVER['HTTP_REFERER']);
			else 
				forward("mod/thewire/everyone.php");
		}
		
?>
