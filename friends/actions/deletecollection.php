<?php

	/**
	 * Elgg friends: delete collection action
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	// Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) forward();
		
		// Get input data
		$collection_id = (int) get_input('collection');
		
		// Check to see that the access collection exist and grab its owner
		$get_collections = get_access_collection($collection_id);
		
		if($get_collections){
    		
    		if(array_pop($get_collections)->owner_guid == $_SESSION['user']->getGUID()){
		    
	            $delete_collection = delete_access_collection($collection_id);
	        
	            // Success message
		        system_message(elgg_echo("friends:collectiondeleted"));
		        
	        } else {
    	        
    	        // Failure message
		        system_message(elgg_echo("friends:collectiondeletefailed"));
		        
	        }
		
		} else {
    		
    		// Failure message
		    system_message(elgg_echo("friends:collectiondeletefailed"));
		    
	    }
	    
	     // Forward to the collections page
		 forward("mod/friends/collections.php");
		
?>