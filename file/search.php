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
		
		if (!empty($tag)) {
			// $body = elgg_view_title(sprintf(elgg_echo('searchtitle'),$tag));
			$body = elgg_view_title($title = elgg_echo("file:type:" . $tag));
			if ($owner_guid) {
				$body .= get_filetype_cloud(page_owner());
			} else {
				$body .= get_filetype_cloud();
			}
			$limit = 10;
			if ($search_viewtype == "gallery") $limit = 9;
			$body .= list_entities_from_metadata($md_type, $tag, $objecttype, $subtype, $owner_guid, $limit, false);
			$body = elgg_view_layout('one_column',$body);
		}
		
		page_draw(sprintf(elgg_echo('searchtitle'),$tag),$body);

?>