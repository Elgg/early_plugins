<?php

	/**
	 * Elgg thewire index page
	 * 
	 * @package Elggthewire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}
		
		$area1 = elgg_view("thewire/sidebar_links", array('user_wire' => 'yes'));
	
	// title
	    $area2 = elgg_view_title(elgg_echo("thewire:readuser"));
	// add form
	    $area2 .= elgg_view("thewire/forms/add");
	// Display the user's wire
		$get_wireposts = get_entities_from_annotations("object", "thewire", "wire_reply", "", $page_owner->getGUID(), 0, 20, $offset, "desc", false);
		$area2 .= elgg_view("thewire/display", array("entities" => $get_wireposts));

		//include a view for plugins to extend
		$area3 .= elgg_view("thewire/sidebar_options", array("object_type" => 'thewire'));
		
    //select the correct canvas area
	    $body = elgg_view_layout("sidebar_boxes", $area1, $area2, $area3);
		
	// Display page
		page_draw(sprintf(elgg_echo('thewire:user'),$page_owner->name),$body);
		
?>