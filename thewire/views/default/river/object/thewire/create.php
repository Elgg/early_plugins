<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("thewire:river:created"),$url) . " ";
	$string .= "\"" . $object->description . "\" " . elgg_echo("thewire:river:create");

?>

<?php 
	echo $string; 
?>