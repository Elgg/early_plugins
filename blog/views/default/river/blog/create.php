<?php

	$performed_by = $vars['performed_by'];
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("blog:river:created"),$url) . " ";
	$string .= "<a href=\"" . $vars['entity']->getURL() . "\">" . elgg_echo("blog:river:create") . "</a>";

?>

<?php echo $string; ?>