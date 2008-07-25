<?php
	/**
	 * Elgg file browser uploader
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	gatekeeper();

	// Render the file upload page

	$container_guid = (int) get_input('container_guid', $_SESSION['guid']);
	$area1 = elgg_view_title($title = elgg_echo('file:upload'));
	$area2 = elgg_view("file/upload", array('container_guid' => $container_guid));
	$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
	
	page_draw(elgg_echo("file:upload"), $body);
	
?>