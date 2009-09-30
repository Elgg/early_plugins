<?php

	/**
	 * Elgg view all thewire posts from all users page
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
		$username = get_input('username',null);
		
		// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}
		
		$area1 = elgg_view("thewire/sidebar_links", array('mentions' => 'yes'));
		
		$area2 = elgg_view_title(elgg_echo("thewire:mentions"));
	
	//add form
		$area2 .= elgg_view("thewire/forms/add");
		$get_wireposts = get_entities_from_mentions("object", "thewire", "wire_reply", "", 0, 0, 20, $offset, "desc", false, 0, 0, $username);
		$area2 .= elgg_view("thewire/display", array("entities" => $get_wireposts));
		
		//$area2 .= list_entities_replies($username, 'object','thewire'); // elgg_view("thewire/view",array('entity' => $thewireposts));
	    $body = elgg_view_layout("sidebar_boxes", $area1, $area2, $area3);
		
	// Display page
		page_draw(elgg_echo('thewire:everyone'),$body);
		
?>