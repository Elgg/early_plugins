<?php

	/**
	 * Elgg blog friends page
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@curverider.co.uk>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}

	//set the title
		$area1 = elgg_view_title(elgg_echo('blog:friends'));
		
	// Get a list of blog posts
		$area2 = list_user_friends_objects($page_owner->getGUID(),'blog',10,false);
		
	// Display them in the page
        $body = elgg_view_layout("two_column_left_sidebar", '', $area1 . $area2);
		
	// Display page
		page_draw(elgg_echo('blog:friends'),$body);
		
?>