<?php

	/**
	 * Elgg file delete
	 * 
	 * @package ElggFile
	 * @author Ben Werdmuller
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

		$guid = (int) get_input('file');
		if ($file = get_entity($guid)) {

			if ($file->canEdit()) {

				$thumbnail = $file->thumbnail;
				if ($thumbnail) {

					$delfile = new ElggFile();
					$delfile->owner_guid = $file->owner_guid;
					$delfile->setFilename($thumbnail);
					$delfile->delete();

				}
				
				if (!$file->delete()) {
					system_message(elgg_echo("file:deletefailed"));
				} else {
					system_message(elgg_echo("file:deleted"));
				}

			} else {
				
				system_message(elgg_echo("file:deletefailed"));
				
			}

		} else {
			
			system_message(elgg_echo("file:deletefailed"));
			
		}
		
		forward($_SERVER['HTTP_REFERER']);

?>