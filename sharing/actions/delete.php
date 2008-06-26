<?php

	/**
	 * Elgg sharing delete action
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

		$guid = get_input('share_guid',0);
		if ($entity = get_entity($guid)) {
			
			if ($entity->canEdit()) {
				
				if ($entity->delete()) {
					
					system_message(elgg_echo("sharing:delete:success"));
					forward("pg/sharing/");					
					
				}
				
			}
			
		}
		
		system_message(elgg_echo("sharing:delete:failed"));
		forward("pg/sharing/");

?>