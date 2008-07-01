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
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	// Get objects
		set_context('search');
		$objects = list_entities("object","file",page_owner(),10,false);
		set_context('file');
		$filelist = get_filetype_cloud(page_owner());
		$body = elgg_view_layout('one_column', $filelist . $objects);
	
	// Finally draw the page
		page_draw(sprintf(elgg_echo("file:user"),page_owner_entity()->name), $body);
?>