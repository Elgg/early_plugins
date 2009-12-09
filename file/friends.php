<?php
	/**
	 * Elgg file browser
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	if (is_callable('group_gatekeeper')) group_gatekeeper();
	
	$owner = page_owner_entity();
	
	$title = sprintf(elgg_echo("file:friends"),$owner->name);
	
	$area2 = elgg_view_title($title);
	
	set_context('search');
	$area2 .= list_user_friends_objects($owner->guid,'file');
	set_context('file');
	$area1 = get_filetype_cloud($owner->guid, true);

	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
	
	// Finally draw the page
	page_draw($title, $body);
?>