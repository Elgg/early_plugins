<?php

	$performed_by = $vars['performed_by'];
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("blog:river:posted"),$url) . " ";
	$string .= "<a href=\"" . $vars['entity']->getURL() . "\">" . elgg_echo("blog:river:annotate:create") . "</a>";

?>

<?php echo $string; ?>