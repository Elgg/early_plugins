<?php
	/**
	 * Elgg file browser uploader action
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	
	gatekeeper();
	
	// Get variables
		
	file_handle_upload("file/","file","file");
	
	exit;
		
//	$container_user = get_entity($container_guid);
//	
//	forward($CONFIG->wwwroot . "pg/file/" . $container_user->username);

?>