<?php
	/**
	 * Elgg file browser
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * 
	 * 
	 * TODO: File icons, download & mime types
	 */

	//require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	require_once(dirname(dirname(dirname(__FILE__))) . "/elggnew/engine/start.php");
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);

	// Get objects
	$objects = get_entities("object","file:file", page_owner(), "time_created desc", $limit, $offset);

	// Draw page
	$body .= file_draw($objects);

	// Draw footer
	$body .= file_draw_footer($limit, $offset);
	
	// Finally draw the page
	page_draw(sprintf(elgg_echo("file:yours"),$_SESSION['user']->name), $body, elgg_view("file/tag_cloud", array()));
?>