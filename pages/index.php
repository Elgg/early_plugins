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

	global $CONFIG;
	
	// Add menus
	$owner = page_owner_entity();
    add_submenu_item(sprintf(elgg_echo("pages:user"), page_owner_entity()->name), $CONFIG->url . "pg/pages/owned/" . page_owner_entity()->username);
    if (($owner) && ($owner->canWriteToContainer($_SESSION['user']))){
        add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/");
        add_submenu_item(elgg_echo('pages:welcome'), $CONFIG->url . "pg/pages/welcome/");
    }
    					
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	
	$title = sprintf(elgg_echo("pages:user"),page_owner_entity()->name);
	
	// Get objects
	$context = get_context();
	
	set_context('search');
	
	
	// If there are no objects then prompt to add new ones
	if (!get_entities('object', 'page_top', page_owner()))
	{
		forward($CONFIG->wwwroot . "pg/pages/new/?container_guid=" . page_owner());
		exit;
	}
	
	$objects = list_entities("object", "page_top", page_owner(), $limit, false);
	
	set_context($context);
	
	//get the owners latest welcome message
	$welcome_message = get_entities("object", "pages_welcome", $owner->guid, '', 1);
	
	$body = elgg_view_title($title);
	$body .= elgg_view("pages/welcome", array('entity' => $welcome_message));
	$body .= $objects;
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	// Finally draw the page
	page_draw($title, $body);
?>