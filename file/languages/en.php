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
			'file:yours' => "Your files",
			'file:yours:friends' => "Your friends' files",
			'file:user' => "%s's files",
			'file:friends' => "%s's friends' files",
			'file:all' => "All files",
			'file:more' => "more files",
			'file:list' => "list view",
			'file:gallery' => "gallery view",
			'file:gallery_list' => "Gallery or list view",
			'file:num_files' => "Number of files to display",
	
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
	
			'file:display:number' => "Number of files to display",
	
			'file:river:created' => "%s uploaded",
			'file:river:item' => "a file",
			'file:river:annotate' => "%s commented on",

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