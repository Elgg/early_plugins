<?php
	/**
	 * Elgg file browser uploader action
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	
	// Get variables
	$title = get_input("title");
	$desc = get_input("description");
	$tags = get_input("tags");
	
	// Extract file from, save to default filestore (for now)
	$prefix = "file/";
	$file = new FilePluginFile();
	$file->setFilename($prefix.$_FILES['upload']['name']);
	$file->setMimeType($_FILES['upload']['type']);
	
	$file->open("write");
	$file->write(get_uploaded_file('upload'));
	$file->close();
	
	$file->title = $title;
	$file->description = $desc;
	
	// Save tags
	$tags = explode(",", $tags);
	$file->tag = $tags;

	$result = $file->save();

	
	if ($result)
	{	
		// Generate thumbnail (if image)
		if (strpos($file->getMimeType(), "image/")!==false)
		{
			$thumb = new ElggFile();
			$thumb->setFilename($prefix."thumb".$_FILES['upload']['name']);
			$thumb->setMimeType($_FILES['upload']['type']);
			$thumb->open("write");
			
			$thumb->write(get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 100, 100));
			$thumb->close();
			
			$tnail = $thumb->save();
			
			if ($tnail)
				$file->thumbnail = $thumb->getGUID();
		}
	}
		
	if ($result)
		system_message(elgg_echo("file:saved"));
	else
		system_message(elgg_echo("file:uploadfailed"));
		
	forward($CONFIG->wwwroot . "pg/file/" . $_SESSION['user']->username);
?>