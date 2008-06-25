<?php
	/**
	 * Elgg file saver
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	gatekeeper();

	// Render the file upload page
	
	$file = (int) get_input('file_guid');
	if ($file = get_entity($file)) {
		if ($file->canEdit()) { 
			$body = elgg_view_layout('one_column', elgg_view("file/upload",array('entity' => $file)));
			page_draw(elgg_echo("file:upload"), $body);
		}
	} else {
		forward();
	}
	
?>