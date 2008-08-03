<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();
		
	$page_guid = get_input('page_guid');
		
    $pages = get_entity($page_guid);
	if ($pages->container_guid) {
		set_page_owner($pages->container_guid);
	} else {
		set_page_owner($pages->owner_guid);
	}

	$limit = (int)get_input('limit', 20);
	$offset = (int)get_input('offset');
	
	$page_guid = get_input('page_guid');
	$pages = get_entity($page_guid);
	
	$title = $pages->title . ": " . elgg_echo("pages:history");
	$area2 = elgg_view_title($title);
	
	$context = get_context();
	
	set_context('search');
	
	$area2 .= list_annotations($page_guid, 'page', $limit, false);
	
	set_context($context);
	
	
	$area1 = pages_get_entity_sidebar($pages);
	
	pages_set_navigation_parent($pages);
	$area3 = elgg_view('pages/sidebar/tree');
	
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2, $area3);
	
	page_draw($title, $body);
?>