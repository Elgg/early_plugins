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
					system_message("Failure notice 1 ");
				} else {
					system_message("Yay");
				}

			} else {
				
				system_message("Permission notice");
				
			}

		} else {
			
			system_message("Failure notice 2 ");
			
		}
		
		forward($_SERVER['HTTP_REFERER']);

?>