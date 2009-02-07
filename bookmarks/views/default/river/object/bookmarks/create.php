<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("bookmarks:river:created"),$url) . " ";
	$string .= "<a href=\"" . $object->getURL() . "\">" . $object->title . "</a>"; //elgg_echo("bookmarks:river:item") . "</a>";
	//$string .= "<div class=\"river_content\">" . $object->title . "</div>";

?>

<?php 
	echo $string;
?>