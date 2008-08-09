<?php

	/**
	 * Walled garden support.
	 * 
	 * @package ElggWalledGarden
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	function walledgarden_init()
	{
		global $CONFIG;
		
		if (current_page_url() != $CONFIG->url) 
			extend_view('pageshells/pageshell', 'walledgarden/walledgarden'); 
	}
	
	register_elgg_event_handler('init','system','walledgarden_init');
?>