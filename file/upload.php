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
	$body = elgg_view_layout('one_column', elgg_view("file/upload", array('container_guid' => $container_guid)));
	
	page_draw(elgg_echo("file:upload"), $body);
	
?>