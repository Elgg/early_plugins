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

	/**
	 * Initialise the pages plugin.
	 *
	 */
	function pages_init()
	{
		global $CONFIG;
		
		// Set up the menu for logged in users
		if (isloggedin()) 
		{
			add_menu(elgg_echo('pages'), $CONFIG->wwwroot . "pg/pages/owned/" . $_SESSION['user']->username,array(
				//menu_item(elgg_echo('pages:new'), $CONFIG->wwwroot."pg/pages/new/"),
				//menu_item(elgg_echo('pages:yours'), $CONFIG->wwwroot . "pg/pages/owned/" . $_SESSION['user']->username),
				//menu_item(elgg_echo('pages:all'), $CONFIG->wwwroot . "pg/pages/world/"),
			),'pages');
		}
		else
		{
			add_menu(elgg_echo('pages'), $CONFIG->wwwroot . "mod/pages/",array(
				menu_item(elgg_echo('pages:all'),$CONFIG->wwwroot."mod/pages/world.php"),
			));
		}
		
		// Extend hover-over menu	
			extend_view('profile/menu/links','pages/menu');
		
		// Register a page handler, so we can have nice URLs
		register_page_handler('pages','pages_page_handler');
		
		// Register a url handler
		register_entity_url_handler('pages_url','object', 'page_top');
		register_entity_url_handler('pages_url','object', 'page');
		
		// Register some actions
		register_action("pages/edit",false, $CONFIG->pluginspath . "pages/actions/pages/edit.php");
		register_action("pages/delete",false, $CONFIG->pluginspath . "pages/actions/pages/delete.php");
		
		// Extend some views
		extend_view('css','pages/css');
		extend_view('metatags','pages/metatags');
		extend_view('groups/menu/links', 'pages/menu'); // Add to groups context
		
		// For now, we'll hard code the groups profile items as follows:
		// TODO make this user configurable
		
		// Language short codes must be of the form "pages:key"
		// where key is the array key below
		$CONFIG->pages = array(
			'title' => 'text',
			'description' => 'longtext',
			'tags' => 'tags',	
			'access_id' => 'access',
			'write_access_id' => 'access',
		);
	}
	
	function pages_url($entity) {
		
		global $CONFIG;
		
		
		return $CONFIG->url . "pg/pages/view/{$entity->guid}/";
		
	}
	
	/**
	 * Pages page handler.
	 *
	 * @param array $page
	 */
	function pages_page_handler($page)
	{
		global $CONFIG;
		
		if (isset($page[0]))
		{
			// See what context we're using
			switch($page[0])
			{
				case "new" :
					include($CONFIG->pluginspath . "pages/new.php");
          		break;
          		case "welcome" :
					include($CONFIG->pluginspath . "pages/welcome.php");
          		break;
    			case "world":  
   					include($CONFIG->pluginspath . "pages/world.php");
          		break;
    			case "owned" :
    				// Owned by a user
    				if (isset($page[1]))
    					set_input('username',$page[1]);
    					
    				include($CONFIG->pluginspath . "pages/index.php");	
    			break;
    			case "edit" :
    				if (isset($page[1]))
    					set_input('page_guid', $page[1]);
    					
    				 $entity = get_entity($page[1]);
    				 add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/{$page[1]}");
    				 if (($entity) && ($entity->canEdit())) add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/{$page[1]}");
    				 add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/{$page[1]}");

    				include($CONFIG->pluginspath . "pages/edit.php");
    			break;
    			case "view" :
    				
    				if (isset($page[1]))
    					set_input('page_guid', $page[1]);
    					
    				 $entity = get_entity($page[1]);
    				 add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/{$page[1]}");
    				 if (($entity) && ($entity->canEdit())) add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/{$page[1]}");
    				 add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/{$page[1]}");
    					
    				include($CONFIG->pluginspath . "pages/view.php");
    			break;   
    			case "history" :
    				if (isset($page[1]))
    					set_input('page_guid', $page[1]);
    					
    				 $entity = get_entity($page[1]);
    				 add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/{$page[1]}");
    				 if (($entity) && ($entity->canEdit())) add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/{$page[1]}");
    				 add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/{$page[1]}");
    					
    				include($CONFIG->pluginspath . "pages/history.php");
    			break; 				
    			default:
    				include($CONFIG->pluginspath . "pages/new.php");
    			break;
			}
		}
		
	}
	
	/**
	 * Sets the parent of the current page, for navigation purposes
	 *
	 * @param ElggObject $entity
	 */
	function pages_set_navigation_parent(ElggObject $entity) {
		
		$guid = $entity->getGUID();
		
		while ($parent_guid = $entity->parent_guid) {
			$entity = get_entity($parent_guid);
			if ($entity) {
				$guid = $entity->getGUID();
			}
		}
			
		set_input('treeguid',$guid);
	}
	
	function pages_get_path(int $guid) {
		
		if (!$entity = get_entity($guid)) return array();
		
		$path = array($guid);
		
		while ($parent_guid = $entity->parent_guid) {
			$entity = get_entity($parent_guid);
			if ($entity) {
				$path[] = $entity->getGUID();
			}
		}
			
		return $path;
	}
	
	/**
	 * Return the correct sidebar for a given entity
	 *
	 * @param ElggObject $entity
	 */
	function pages_get_entity_sidebar(ElggObject $entity, $fulltree = 0)
	{
		$body = "";
		
		$children = get_entities_from_metadata('parent_guid',$entity->guid);
		$body .= elgg_view('pages/sidebar/sidebarthis', array('entity' => $entity, 
															  'children' => $children,
															  'fulltree' => $fulltree));
		//$body = elgg_view('pages/sidebar/wrapper', array('body' => $body));
			
		return $body;
	}
	
	/**
	 * Extend permissions checking to extend can-edit for write users.
	 *
	 * @param unknown_type $hook
	 * @param unknown_type $entity_type
	 * @param unknown_type $returnvalue
	 * @param unknown_type $params
	 */
	function pages_write_permission_check($hook, $entity_type, $returnvalue, $params)
	{
		$write_permission = $params['entity']->write_access_id;
		$user = $params['user'];
				
		if (($write_permission) && ($user))
		{
			$list = get_write_access_array($user->guid);
				
			if (($write_permission!=0) && (isset($list[$write_permission])))
				return true;
			
		}
	}
	
	// write permission plugin hook
	register_plugin_hook('permissions_check', 'object', 'pages_write_permission_check');
	
	// Make sure the pages initialisation function is called on initialisation
	register_elgg_event_handler('init','system','pages_init');
?>