<?php

	/**
	 * Elgg view all blog posts from all users page
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@curverider.co.uk>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
		$area1 = elgg_view_title(elgg_echo('blog:everyone'));

		$area1 .= list_entities('object','blog',0,10,false);
		$body = elgg_view_layout("one_column", $area1);
		
	// Display page
		page_draw(elgg_echo('blog:everyone'),$body);
		
?>