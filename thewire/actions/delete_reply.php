<?php

	/**
	 * Elgg delete wire reply
	 * 
	 * @package ElggTheWire
	 * @author Curverider <curverider.co.uk>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */

	// Ensure we're logged in
		if (!isloggedin()) forward();
		
	// Make sure we can get the comment in question
		$annotation_id = (int) get_input('id');
		if ($comment = get_annotation($annotation_id)) {	
			if ($comment->owner_guid == $_SESSION['user']->guid || isadminloggedin()){
				$comment->delete();
				system_message(elgg_echo("thewire:deleted"));
			}else
				register_error(elgg_echo("thewire:notdeleted"));
		} else {
			register_error(elgg_echo("thewire:notdeleted"));
		}
		
		forward("mod/thewire/everyone.php");

?>