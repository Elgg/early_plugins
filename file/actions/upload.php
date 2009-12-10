<?php
	/**
	 * Elgg file browser uploader/edit action
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	
	gatekeeper();
	
	// Get variables
	$title = get_input("title");
	$desc = get_input("description");
	$access_id = (int) get_input("access_id");
	$container_guid = (int) get_input('container_guid', 0);
	if ($container_guid == 0) {
		$container_guid = get_loggedin_userid();
	}
	$guid = (int) get_input('file_guid');
	$tags = get_input("tags");
	$tags = explode(",", $tags);
	
	// check whether this is a new file or an edit
	$new_file = true;
	if ($guid > 0) {
		$new_file = false;
	}
	
	if ($new_file) {
		// must have a file if a new file upload
		if (empty($_FILES['upload']['name'])) {
			register_error(elgg_echo('file:nofile'));
			forward($_SERVER['HTTP_REFERER']);
		}
		
		$file = new FilePluginFile();
		$file->subtype = "file";
	
	} else {
		// load original file object
		$file = get_entity($guid);
		if (!$file) {
			register_error(elgg_echo('file:cannotload'));
			forward($_SERVER['HTTP_REFERER']);
		}
		
		// user must be able to edit file
		if (!$file->canEdit()) {
			register_error(elgg_echo('file:noaccess'));
			forward($_SERVER['HTTP_REFERER']);
		}
	}
	
	$file->title = $title;
	$file->description = $desc;
	$file->access_id = $access_id;
	$file->container_guid = $container_guid;
	$file->tags = $tags;
	
	// we have a file upload, so process it
	if (isset($_FILES['upload']['name'])) {
		
		// if previous file, delete it
		if ($new_file == false) {
			$filename = $file->getFilenameOnFilestore();
			if (file_exists($filename)) {
				unlink($filename);
			}
			
			// this does not delete thumbnails yet - should be pushed into functions
		}
		
		$prefix = "file/";
		$filestorename = strtolower(time().$_FILES['upload']['name']);
		$file->setFilename($prefix.$filestorename);
		$file->setMimeType($_FILES['upload']['type']);
		$file->originalfilename = $_FILES['upload']['name'];
		$file->simpletype = get_general_file_type($_FILES['upload']['type']);
	
		$file->open("write");
		$file->write(get_uploaded_file('upload'));
		$file->close();
		
		$guid = $file->save();
		
		// if image, we need to create thumbnails (this should be moved into a function)
		if ($guid && $file->simpletype == "image") {
			$thumbnail = get_resized_image_from_existing_file($file->getFilenameOnFilestore(),60,60, true);
			if ($thumbnail) {
				$thumb = new ElggFile();
				$thumb->setMimeType($_FILES['upload']['type']);
				
				$thumb->setFilename($prefix."thumb".$filestorename);
				$thumb->open("write");
				$thumb->write($thumbnail);
				$thumb->close();
				
				$file->thumbnail = $prefix."thumb".$filestorename;
				unset($thumbnail);
			}
			
			$thumbsmall = get_resized_image_from_existing_file($file->getFilenameOnFilestore(),153,153, true);
			if ($thumbsmall) {
				$thumb->setFilename($prefix."smallthumb".$filestorename);
				$thumb->open("write");
				$thumb->write($thumbsmall);
				$thumb->close();
				$file->smallthumb = $prefix."smallthumb".$filestorename;
				unset($thumbsmall);
			}
			
			$thumblarge = get_resized_image_from_existing_file($file->getFilenameOnFilestore(),600,600, false);
			if ($thumblarge) {
				$thumb->setFilename($prefix."largethumb".$filestorename);
				$thumb->open("write");
				$thumb->write($thumblarge);
				$thumb->close();
				$file->largethumb = $prefix."largethumb".$filestorename;
				unset($thumblarge);
			}
		}
	}
	
	// handle results differently for new files and file updates
	if ($new_file) {
		if ($guid) {
			system_message(elgg_echo("file:saved"));
			add_to_river('river/object/file/create', 'create', get_loggedin_userid(), $file->guid);
		} else {
			register_error(elgg_echo("file:uploadfailed"));
		}
error_log('container ' . $container_guid);	
		$container_user = get_entity($container_guid);
		forward($CONFIG->wwwroot . "pg/file/" . $container_user->username);
	
	} else {
		if ($guid) {
			system_message(elgg_echo("file:saved"));
		} else {
			register_error(elgg_echo("file:uploadfailed"));
		}
		
		forward($file->getURL());
	}	
