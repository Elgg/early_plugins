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
	
	$body = list_user_friends_objects(page_owner(),'file');
	if ($friends = get_user_friends($user_guid, $subtype, 999999, 0)) {
		$friendguids = array();
		foreach($friends as $friend) {
			$friendguids[] = $friend->getGUID();
		}
		set_context('search');
		$filelist = get_filetype_cloud($friendguids);
		set_context('file');
	} else {
		$filelist = "";
	}
	$body = elgg_view_layout('two_column',$body,$filelist);
	
	// Finally draw the page
	page_draw(sprintf(elgg_echo("file:friends"),$_SESSION['user']->name), $body);
?>