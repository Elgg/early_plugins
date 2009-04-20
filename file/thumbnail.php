<?php

	/**
	 * Elgg file thumbnail
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	// Get engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// Get file GUID
		$file_guid = (int) get_input('file_guid',0);
		
	// Get file thumbnail size
		$size = get_input('size','small');
		if ($size != 'small') {
			$size = 'large';
		}
		
		file_display_thumbnail($file_guid,$size);
		
?>