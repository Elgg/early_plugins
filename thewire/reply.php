<?php

	/**
	 * Elgg thewire reply page
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// If we're not logged in, forward to the front page
		if (!isloggedin()) forward(); 
		
	// choose the required canvas layout and items to display
	    $area2 = elgg_view_title(elgg_echo('thewire:text'));
	    
	// get the wire note 
	    $wire_note = get_entity(get_input("note_id"));
	// get any replies
	    $wire_note_replies = get_entities_from_metadata("parent", $wire_note->guid, "object", "thewire", 0, $limit = 999);
	    
	    $area2 .= elgg_view("thewire/forms/reply", array('entity' => $wire_note, 'replies' => $wire_note_replies));
	    $body = elgg_view_layout("two_column_left_sidebar", '',$area2);
		
	// Display page
		page_draw(elgg_echo('thewire:reply'),$body);
		
?>