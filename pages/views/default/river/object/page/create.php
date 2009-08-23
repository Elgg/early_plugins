<?php

	$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();
	$object = get_entity($vars['item']->object_guid);
	$url = $object->getURL();

	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("pages:river:created"),$url) . " ";
	$string .= elgg_echo("pages:river:create") . " <a href=\"" . $object->getURL() . "\">" . $object->title . "</a>";
	$string .= "<div class=\"river_content_display\">";
	if(strlen($object->description) > 200) {
        	$string .= substr($object->description, 0, strpos($object->description, ' ', 200)) . "...";
    }else{
	    $string .= $object->description;
    }
	$string .= "</div>";

?>

<?php echo $string; ?>