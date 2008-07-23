<?php

    /**
	 * Elgg friend collections
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */
	 
	echo "<div class=\"expandall\"><p>expand all</p></div>";
	echo "<ul id=\"friends_collections_accordian\">";
	
	if ($vars['collections']) {
    	
    	foreach($vars['collections'] as $coll){
        	
        	echo "<li><h2>";
        	
        	//as collections are private, check that the logged in user is the owner
        	if($coll->owner_guid == $_SESSION['user']->getGUID())
        	    echo "<div class=\"friends_collections_controls\"> (<a href=\"" . $vars['url'] . "mod/friends/edit.php?collection={$coll->id}\">" . elgg_echo('edit') . "</a>) (<a href=\"" . $vars['url'] . "action/friends/deletecollection?collection={$coll->id}\">" . elgg_echo('delete') . "</a>)";
        	    
			echo "</div>";
			echo $coll->name;
			echo "</h2>";
        	    
        	echo "<div class=\"friends_picker\">";
        	
        	// Ben - this is where the friends picker view needs to go
        	if($members = get_members_of_access_collection($coll->id)){
        	    foreach($members as $mem){
            	    
            	   echo elgg_view("profile/icon",array('entity' => $mem, 'size' => 'tiny'));
            	   echo $mem->name;
  
        	    }
    	    }
    	    
    	    // close friends_picker div and the accordian list item
    	    echo "</div></li>";

        } //end of foreach loop
        
        echo "</ul>";

    } else {
        
        echo elgg_echo("friends:nocollections");
        
    }
    
?>

<script>
$(document).ready(function(){

$('#friends_collections_accordian h2').click(function () {
	$(this.parentNode).children("[class=friends_picker]").slideToggle("fast");
	return false;
});
    
// global more info expand all/close all
$('div.expandall p').click(function () {
	if (this.innerHTML == 'close all') {
		$('div.friends_picker').slideUp("fast");
		$('div.expandall p').html('expand all');
}
else {
		$('div.friends_picker:hidden').slideDown("fast");
		$('div.expandall p').html('close all');
	}
});

});  
</script>



