<?php

	/**
	 * Elgg sharing plugin inbox page
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Start engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// List shares
		$body = elgg_view_title(elgg_echo('sharing:inbox'));
		set_context('search');
		$body .= list_entities_from_relationship('share',page_owner(),true,'object','sharing');
		set_context('sharing');
		
	// Format page
		$body = elgg_view_layout('one_column',$body);
		
	// Draw it
		echo page_draw(elgg_echo('sharing:inbox'),$body);

?>