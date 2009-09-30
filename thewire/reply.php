<?php

	/**
	 * Elgg thewire reply page
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 *
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// If we're not logged in, forward to the front page
		if (!isloggedin()) forward(); 
		
		
	// choose the required canvas layout and items to display
	    $area1 = elgg_view("thewire/sidebar_links");
	    $area2 = elgg_view_title(elgg_echo('thewire:reply'));
	    $area2 .= elgg_view("thewire/forms/reply");
	    $body = elgg_view_layout("sidebar_boxes", $area1,$area2);
		
	// Display page
		page_draw(elgg_echo('thewire:addpost'),$body);
		
?>