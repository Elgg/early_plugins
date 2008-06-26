<?php

	/**
	 * Elgg sharing plugin add share page
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Start engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// You need to be logged in for this one
		gatekeeper();
		
		$body = elgg_view_title(elgg_echo('sharing:add'));
		
	// If we've been given a share to edit, grab it
		if ($guid = get_input('share',0)) {
			$entity = get_entity($guid);
			if ($entity->canEdit()) {
				$body .= elgg_view('sharing/form',array('entity' => $entity));
			}
		} else {
			$body .= elgg_view('sharing/form');
		}
		
	// Format page
		$body = elgg_view_layout('one_column',$body);
		
	// Draw it
		echo page_draw(elgg_echo('sharing:add'),$body);

?>