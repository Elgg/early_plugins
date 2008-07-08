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
	$body = elgg_view_title($title = elgg_echo('file:yours:friends'));
	
	set_context('file');
	if ($friends = get_user_friends($user_guid, $subtype, 999999, 0)) {
		$friendguids = array();
		foreach($friends as $friend) {
			$friendguids[] = $friend->getGUID();
		}
		$body .= get_filetype_cloud($friendguids);
	} else {
		$body .= "";
	}

	$body .= list_user_friends_objects(page_owner(),'file');

	$body = elgg_view_layout('one_column',$body);
	
	// Finally draw the page
	page_draw(sprintf(elgg_echo("file:friends"),$_SESSION['user']->name), $body);
?>