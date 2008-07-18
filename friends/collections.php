<?php

	/**
	 * Elgg collections of friends
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Start engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// You need to be logged in for this one
		gatekeeper();
		
		$body = elgg_view_title(elgg_echo('friends:new'));
		
		//grab the users collections
		$collections = get_user_access_collections($_SESSION['user']->getGUID());
		
	    $body .= elgg_view('friends/collections', array('collections' => $collections));
		
	// Format page
		$body = elgg_view_layout('one_column',$body);
		
	// Draw it
		echo page_draw(elgg_echo('friends:add'),$body);

?>