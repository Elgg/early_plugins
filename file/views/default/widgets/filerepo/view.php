<?php

	$owner = $vars['entity']->owner_guid;
	$number = (int) $vars['entity']->num_display;
	if (!$number) {
		$number = 1;
	}

	set_context('search'); //display the results in search format
	$files = list_entities("object","file",$owner,$number,false);
	
	if ($files) {
    	
    	echo $files;
				
	} else {
		
		echo elgg_echo("file:none");
		
	}

?>