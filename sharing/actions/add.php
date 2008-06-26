<?php

	/**
	 * Elgg sharing add/save action
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

		$title = get_input('title');
		$guid = get_input('sharing_guid',0);
		$description = get_input('description');
		$address = get_input('address');
		$access = get_input('access',0);
		$shares = get_input('shares',array());
		
		$tags = get_input('tags');
		$tagarray = string_to_tag_array($tags);
		
		if ($guid == 0) {
			
			$entity = new ElggObject;
			$entity->subtype = "sharing";
			$entity->owner_guid = $_SESSION['user']->getGUID();
			
		} else {
			
			$canedit = false;
			if ($entity = get_entity($guid)) {
				if ($entity->canEdit()) {
					$canedit = true;
				}
			}
			if (!$canedit) {
				system_message(elgg_echo('notfound'));
				forward("pg/sharing");
			}
			
		}
		
		$entity->title = $title;
		$entity->address = $address;
		$entity->description = $description;
		$entity->access_id = $access;
		$entity->tags = $tagarray;
		
		if ($entity->save()) {
			$entity->clearRelationships();
			$entity->shares = $shares;
		
			if (is_array($shares) && sizeof($shares) > 0) {
				foreach($shares as $share) {
					$share = (int) $share;
					add_entity_relationship($entity->getGUID(),'share',$share);
				}
			}
			system_message(elgg_echo('sharing:save:success'));
			forward($entity->getURL());
		} else {
			system_message(elgg_echo('sharing:save:failed'));
			forward("pg/sharing");
		}

?>