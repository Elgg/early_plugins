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
	 
	
	if ($vars['collections']) {
    	
    	foreach($vars['collections'] as $coll){
        	
        	echo $coll->name;
        	
        	//as collections are private, check that the logged in user is the owner
        	if($coll->owner_guid == $_SESSION['user']->getGUID())
        	    echo " (<a href=\"\">" . elgg_echo('edit') . "</a>) (<a href=\"" . $vars['url'] . "action/friends/deletecollection?collection={$coll->id}\">" . elgg_echo('delete') . "</a>)<br />";
        	
        	if($members = get_members_of_access_collection($coll->id)){
        	    foreach($members as $mem){
            	    
            	   echo elgg_view("profile/icon",array('entity' => $mem, 'size' => 'tiny'));
            	   echo $mem->name;
  
        	    }
    	    }
    	    
    	    echo "<br />";

        } //end of foreach loop

    } else {
        
        echo elgg_echo("friends:nocollections");
        
    }
    
?>