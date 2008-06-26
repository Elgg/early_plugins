<?php
	/**
	 * Elgg file plugin language pack
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'file' => "Files",
			'file:yours' => "%s's files",
			'file:friends' => "%s's friend's files",
			'file:all' => "All files",
	
			'file:upload' => "Upload a file",
			
			'file:file' => "File",
			'file:title' => "Title",
			'file:desc' => "Description",
			'file:tags' => "Tags",
	
			'file:types' => "Uploaded file types",
	
			'file:type:video' => "Videos",
			'file:type:document' => "Documents",
			'file:type:audio' => "Audio",
			'file:type:image' => "Pictures",
			'file:type:general' => "General",
	
			'file:widget' => "File widget",
			'file:widget:description' => "Showcase your latest files",
	
			'file:download' => "Download this",
	
			'file:delete:confirm' => "Are you sure you want to delete this file?",
			
			'file:tagcloud' => "Tag cloud",

		/**
		 * Status messages
		 */
	
			'file:saved' => "Your file was successfully saved.",
			'file:deleted' => "Your file was successfully deleted.",
	
		/**
		 * Error messages
		 */
	
			'file:none' => "We couldn't find any files at the moment.",
			'file:uploadfailed' => "Sorry; we could not save your file.",
			'file:downloadfailed' => "Sorry; this file is not available at this time.",
			'file:deletefailed' => "Your file could not be deleted at this time.",
	
	);
					
	add_translation("en",$english);
?>