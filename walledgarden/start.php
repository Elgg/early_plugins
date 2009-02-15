<?php

	/**
	 * Walled garden support.
	 * 
	 * @package ElggWalledGarden
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	function walledgarden_init()
	{
		global $CONFIG;
		
		$CONFIG->disable_registration = true;
		
		elgg_set_viewtype('default');
		
		if (current_page_url() != $CONFIG->url) 
			extend_view('pageshells/pageshell', 'walledgarden/walledgarden');
		
		// Extend system CSS with our own styles
				extend_view('css','walledgarden/css');
				
       // Replace the default index page
			register_plugin_hook('index','system','custom_index');
			

	}
	
	function custom_index() {
			
			if (!@include_once(dirname(dirname(__FILE__))) . "/walledgarden/index.php") return false;
			return true;
			
	}
	
	register_elgg_event_handler('init','system','walledgarden_init');
?>