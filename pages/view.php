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

	$page_guid = get_input('page_guid');
	set_context('pages');
	
	$pages = get_entity($page_guid);
	
	$title = $pages->title;
	$body = elgg_view_title($title);
	$body .= elgg_view_entity($pages, true);
	
	$sidebar = pages_get_entity_sidebar($pages);
	
	$body = elgg_view_layout('narrow_right_sidebar',$body, $sidebar);
	
	// Finally draw the page
	page_draw($title, $body);
?>