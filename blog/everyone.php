<?php

	/**
	 * Elgg view all blog posts from all users page
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		define('everyoneblog','true');
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
// Get the current page's owner
		$page_owner = $_SESSION['user'];
		set_page_owner($_SESSION['guid']);
		
		$area2 = elgg_view_title(elgg_echo('blog:everyone'));

		$area2 .= list_entities('object','blog',0,10,false);

		// get tagcloud
		$area3 = "This will be a tagcloud for all blog posts";

		// get categories
		$area3 .= "This will be categories";

		// get recent comments
		$area3 .= "This will be categories";

		$body = elgg_view_layout("blog_layout", '', $area2, $area3);
		
	// Display page
		page_draw(elgg_echo('blog:everyone'),$body);
		
?>