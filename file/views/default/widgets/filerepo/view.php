<?php

	$owner = $vars['entity']->owner_guid;
	$number = (int) $vars['entity']->numdisplay;
	if (!$number) {
		$number = 1;
	}
	
	if ($files = get_user_objects($owner,'file',$number)) {
		
		foreach($files as $file) {
			echo elgg_view_entity($file);
		}
		
	} else {
		
		echo elgg_echo("file:none");
		
	}

?>