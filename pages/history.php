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

	$limit = (int)get_input('limit', 10);
	$offset = (int)get_input('offset');
	
	$page_guid = get_input('page_guid');
	$pages = get_entity($page_guid);
	
	$title = elgg_echo("pages:history");
	$body = elgg_view_title($title);
	
	$context = get_context();
	
	set_context('search');
	
	$body .= list_annotations($page_guid, 'page', $limit, false);
	
	set_context($context);
	
	
	$sidebar = pages_get_entity_sidebar($pages);
	
	$body = elgg_view_layout('narrow_right_sidebar',$body, $sidebar);
	
	page_draw($title, $body);
?>