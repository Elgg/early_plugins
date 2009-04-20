<?php
	/**
	 * Elgg file browser save action
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	global $CONFIG;	
	
	file_handle_save($CONFIG->wwwroot . "pg/file/","file");
?>