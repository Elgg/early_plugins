<?php
	/**
	 * Elgg file browser
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	$tag = get_input("tag");
	
	// Get objects
	set_context('search');
	if ($tag != "")
		$body = list_entities_from_metadata('tags',$tag,'object','file');
	else
		$body = list_entities('object','file');
	set_context('file');
		
	$filelist = get_filetype_cloud();
	$body = elgg_view_layout('one_column',$filelist . $body);

	// Finally draw the page
	page_draw(sprintf(elgg_echo("file:yours"),$_SESSION['user']->name), $body);
?>