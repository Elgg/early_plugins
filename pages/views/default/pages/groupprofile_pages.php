<?php
 
    // pages on the group index page

    //check to make sure this group forum has been activated
    if($vars['entity']->pages_enable == 'yes'){

?>

<div id="group_pages_widget">
<h2><?php echo elgg_echo("pages:groupprofile"); ?></h2>
<?php

    $objects = list_entities("object", "page_top", page_owner(), 5, false);
	echo $objects;
	
?>
</div>

<?php
    }
?>