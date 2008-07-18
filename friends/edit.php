<?php

	/**
	 * Elgg add a collection of friends
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
		
		//set the title
		$body = elgg_view_title(elgg_echo('friends:collectionedit'), false);
		
		//grab the collection id passed to the edit form
		$collection_id = get_input('collection');
		
		//get the full collection
		$collection = get_access_collection($collection_id);
		//get all members of the collection
		$collection_members = get_members_of_access_collection($collection_id);
		
	    $body .= elgg_view('friends/forms/edit', array('collection' => $collection, 'collection_members' => $collection_members));
		
	// Format page
		$body = elgg_view_layout('one_column',$body);
		
	// Draw it
		echo page_draw(elgg_echo('friends:add'),$body);

?>