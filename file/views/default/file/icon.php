<?php
	/**
	 * Elgg file icons.
	 * Displays an icon, depending on its mime type, for a file. 
	 * Optionally you can specify a size.
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	
	$mime = $vars['mimetype'];
	$file_guid = $vars['file_guid'];
	$url = $vars['url'];
	
	$width = $vars['width'];
	$height = $vars['height'];
	
	if (!$width) $width = 100;
	if (!$height) $height = 100;
	
	// Handle 
	switch ($mime)
	{
		case 'image/jpg' 	:
		case 'image/jpeg' 	:
		case 'image/png' 	:
		case 'image/gif' 	:
		case 'image/bmp' 	: 
			//$file = get_entity($file_guid);
			$file = new FilePluginFile($file_guid);
			if ($file->thumbnail)
				echo "<img src=\"{$vars['url']}action/file/download?file_guid={$file->thumbnail}\" border=\"0\" />";
			else
				echo "<img src=\"{$CONFIG->wwwroot}mod/file/graphics/icons/default.png\" border=\"0\" />";
			
		break;
		default :
			$filename = str_replace("/","_",$mime) . ".png";
			if (fopen("{$CONFIG->wwwroot}mod/file/graphics/icons/$filename","r"))
				echo "<img src=\"{$CONFIG->wwwroot}mod/file/graphics/icons/$filename\" border=\"0\" />";
			else
				echo "<img src=\"{$CONFIG->wwwroot}mod/file/graphics/icons/default.png\" border=\"0\" />";
				 
		break;
	}

?>