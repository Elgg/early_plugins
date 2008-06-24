<?php
	/**
	 * Elgg file browser download action.
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	// Get the guid
	$file_guid = get_input("file_guid");
	
	// Get the file
	$file = get_entity($file_guid);
	
	if ($file)
	{
		$mime = $file->getMimeType();
		if (!$mime) $mime = "application/octet-stream";
		
		$filename = $file->thumbnail;
		
		//header("Content-type: $mime");
		if (strpos($mime, "image/")!==false)
			header("Content-Disposition: inline; filename=\"$filename\"");
		else
			header("Content-Disposition: attachment; filename=\"$filename\"");

			
		$readfile = new ElggFile();
		$readfile->owner = $_SESSION['user']->getGUID();
		$readfile->setFilename($filename);
			
		/*
		if ($file->open("read"));
		{
			while (!$file->eof())
			{
				echo $file->read(10240, $file->tell());	
			}
		}
		*/

		echo file_get_contents($readfile->getFilenameOnFilestore());
		exit;
	}
	else
		system_message(elgg_echo("file:downloadfailed"));
?>