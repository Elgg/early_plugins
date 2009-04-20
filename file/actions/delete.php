<?php

	/**
	 * Elgg file delete
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

		$guid = (int) get_input('file');
		if (file_delete($guid)) {
			system_message(elgg_echo("file:deleted"));
		} else {
			register_error(elgg_echo("file:deletefailed"));			
		}
		
		forward("pg/file/" . $_SESSION['user']->username);

?>