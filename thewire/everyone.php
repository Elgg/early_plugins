<?php

	/**
	 * Elgg view all thewire posts from all users page
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
		$area1 = elgg_view("thewire/sidebar_links");
		//include a view for to-do's to extend
		$area1 .= elgg_view("thewire/todo");
		
		$area2 .= elgg_view_title(elgg_echo("thewire:everyone"));
		if(isloggedin())
			$area2 .= elgg_view("thewire/forms/add");

		$get_wireposts = get_entities_from_annotations("object", "thewire", "wire_reply", "", 0, 0, 20, 0, "desc", false);
		$area2 .= elgg_view("thewire/display", array("entities" => $get_wireposts));

		//include a view for plugins to extend
		$area3 .= elgg_view("thewire/sidebar_options", array("object_type" => 'thewire'));
		
	    $body = elgg_view_layout("sidebar_boxes", $area1, $area2, $area3);

	// Display page
		page_draw(elgg_echo('thewire:everyone'),$body);
		
?>
