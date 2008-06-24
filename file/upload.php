<?php
	/**
	 * Elgg file browser uploader
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	gatekeeper();

	// Render the file upload page
	
	$body = elgg_view_layout('one_column', elgg_view("file/upload"));
	
	page_draw(elgg_echo("file:upload"), $body);
	
?>