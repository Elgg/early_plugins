<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();

	$title = elgg_echo("pages:new");
	$body = elgg_view_title($title);
	$body .= elgg_view("forms/pages/edit");
	
	$body = elgg_view_layout('one_column', $body);
	
	page_draw($title, $body);
?>