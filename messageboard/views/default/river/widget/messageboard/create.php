<?php

	$statement = $vars['statement'];
	$entity = $statement->getObject();

    if ($entity->handler == "messageboard") {

		$performed_by = $statement->getSubject();
	
	    $url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	    $string = sprintf(elgg_echo("messageboard:river:create"),$url) . " ";
	    
    }
	
    echo $string; 

?>