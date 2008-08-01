<?php

	/**
	 * Elgg file search
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/

	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// Set context
		set_context('search');
		
	// Get input
		$tag = get_input('tag');
		$subtype = get_input('subtype');
		$owner_guid = (int) get_input('owner_guid',0);
		$search_viewtype = get_input('search_viewtype');
		
		if ($owner_guid > 0)
			set_page_owner($owner_guid);
		
		if (!$objecttype = get_input('object')) {
			$objecttype = "";
		}
		if (!$md_type = get_input('tagtype')) {
			$md_type = "";			
		}
		$owner_guid = get_input('owner_guid',0);
		if (substr_count($owner_guid,',')) {
			$owner_guid = explode(",",$owner_guid);
		}
		$page_owner = get_input('page_owner',0);
		if ($page_owner) set_page_owner($page_owner);

		if (empty($tag)) {
			$area1 = elgg_view_title(elgg_echo('file:type:all'));
		} else {
			if (is_array($owner_guid)) {
				$area2 = elgg_view_title(elgg_echo("file:friends:type:" . $tag));
			} else if (page_owner() && page_owner() != $_SESSION['guid']) {
				$area2 = elgg_view_title(sprintf(elgg_echo("file:user:type:" . $tag),page_owner_entity()->name));
			} else{
				$area2 = elgg_view_title(elgg_echo("file:type:" . $tag));
			}
		}
		if ($owner_guid) {
			$area1 = get_filetype_cloud($owner_guid);
		} else {
			$area1 = get_filetype_cloud();
		}
		$limit = 10;
		if ($search_viewtype == "gallery") $limit = 12;
		if (!empty($tag)) {
			$area2 .= list_entities_from_metadata($md_type, $tag, $objecttype, $subtype, $owner_guid, $limit, false);
		} else {
			$area2 .= list_entities("object", "file", $owner_guid, $limit, false);
		}
		
		set_context("file");
		
		$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
		
		page_draw(sprintf(elgg_echo('searchtitle'),$tag),$body);

?>