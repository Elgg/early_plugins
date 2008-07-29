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
	
	$title = elgg_echo("pages:edit");
	$body = elgg_view_title($title);
	
	if (($pages) && ($pages->canEdit()))
	{
		$body .= elgg_view("forms/pages/edit", array('entity' => $pages));
			 
	} else {
		$body .= elgg_echo("pages:noaccess");
	}
	
	$sidebar = pages_get_entity_sidebar($pages);
	
	$body = elgg_view_layout('one_column',$body, $sidebar);
	
	page_draw($title, $body);
?>