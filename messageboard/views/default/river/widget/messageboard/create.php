<?php

    if ($vars['entity']->handler == "messageboard") {

	    $performed_by = $vars['performed_by'];
	
	    $url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	    $string = sprintf(elgg_echo("messageboard:river:create"),$url) . " ";
	    
    }
	
?>

<?php echo $string; ?>