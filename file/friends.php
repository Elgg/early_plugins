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
	
	set_context('search');
	$title = elgg_view_title($title = elgg_echo('file:yours:friends'));
	$body = list_user_friends_objects(page_owner(),'file');
	set_context('file');
	if ($friends = get_user_friends($user_guid, $subtype, 999999, 0)) {
		$friendguids = array();
		foreach($friends as $friend) {
			$friendguids[] = $friend->getGUID();
		}
		$filter_options = get_filetype_cloud($friendguids);
	} else {
		$filter_options = "";
	}

	$body = elgg_view_layout('one_column',$title . $filter_options . $body);
	
	// Finally draw the page
	page_draw(sprintf(elgg_echo("file:friends"),$_SESSION['user']->name), $body);
?>