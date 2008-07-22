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

	global $CONFIG;
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	
	$title = sprintf(elgg_echo("pages:yours"),page_owner_entity()->name);
	
	// Get objects
	$context = get_context();
	
	set_context('search');
	
	
	// If there are no objects then prompt to add new ones
	if (!get_entities('object', 'page_top'))
	{
		forward($CONFIG->wwwroot . "pg/pages/new/");
		exit;
	}
	
	
	$objects = list_entities("object", "page_top", page_owner(), $limit, false);
	
	set_context($context);
	
	$body = elgg_view_title($title);
	$body .= $objects;
	$body = elgg_view_layout('one_column', $body);
	
	// Finally draw the page
	page_draw($title, $body);
?>