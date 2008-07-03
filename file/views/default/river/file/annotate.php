<?php

	$performed_by = $vars['performed_by'];
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("file:river:annotate"),$url) . " ";
	$string .= "<a href=\"" . $vars['entity']->getURL() . "\">" . elgg_echo("file:river:item") . "</a>";

?>

<?php echo $string; ?>