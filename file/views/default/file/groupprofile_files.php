<script type="text/javascript">
$(document).ready(function () {

$('a.show_file_desc').click(function () {
	$(this.parentNode).children("[class=filerepo_listview_desc]").slideToggle("fast");
	return false;
});

}); /* end document ready function */
</script>

<div id="filerepo_widget_layout"> 
<h2><?php echo elgg_echo("file:group"); ?></h2>

<?php

	//the number of files to display
	$number = (int) $vars['entity']->num_display;
	if (!$number)
		$number = 10;
	
	//get the user's files
	$files = get_user_objects($vars['entity']->guid, "file", $number, 0);
	
	//if there are some files, go get them
	if ($files) {
    	       	    
            //display in list mode
            foreach($files as $f){
            	
                $mime = $f->mimetype;
                echo "<div class=\"filerepo_widget_singleitem\">";
            	echo "<div class=\"filerepo_listview_icon\"><a href=\"{$f->getURL()}\">" . elgg_view("file/icon", array("mimetype" => $mime, 'thumbnail' => $f->thumbnail, 'file_guid' => $f->guid)) . "</a></div>";
            	echo "<div class=\"filerepo_widget_content\">";
            	echo "<div class=\"filerepo_listview_title\"><p class=\"filerepo_title\">" . $f->title . "</p></div>";
            	echo "<div class=\"filerepo_listview_date\"><p class=\"filerepo_timestamp\"><small>" . friendly_time($f->time_created) . "</small></p></div>";
		        echo "<a href=\"javascript:void(0);\" class=\"show_file_desc\">more</a><br /><div class=\"filerepo_listview_desc\">" . $f->description . "</div></div></div>";
            				
        	}
        	
        	
        //get a link to the users files
        $users_file_url = $vars['url'] . "pg/file/" . page_owner_entity()->username;
        	
        echo "<p><a href=\"{$users_file_url}\">" . elgg_echo('file:more') . "</a></p>";
       
	} else {
		
		echo elgg_echo("file:none");
		
	}

?>

</div>