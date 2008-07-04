<?php

    //the page owner
	$owner = $vars['entity']->owner_guid;
	
	//the number of files to display
	$number = (int) $vars['entity']->num_display;
	if (!$number) {
		$number = 1;
	}

	//get the user's files
	$files = get_user_objects($vars['entity']->owner_guid, "file", $number, 0);
	
	//if there are some files, go get them
	if ($files) {
    	
    	echo "<div id=\"filerepo_widget_layout\">";
    	
    	foreach($files as $f){
        	
        	$mime = $f->mimetype;
        	echo "<a href=\"{$f->getURL()}\">" . elgg_view("file/icon", array("mimetype" => $mime, 'thumbnail' => $f->thumbnail, 'file_guid' => $f->guid)) . "</a>";
        				
    	}
    	
    	//get a link to the users files
    	$users_file_url = $vars['url'] . "mod/pg/file/" . get_user($f->owner_guid)->username;
    	
    	echo "<p><a href=\"{$users_file_url}\">more files</a></p>";
    	echo "</div>";
				
	} else {
		
		echo elgg_echo("file:none");
		
	}

?>