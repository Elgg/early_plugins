<?php

	/**
	 * Elgg collection add page
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */
	 
	 //must be logged in
	 gatekeeper();
	 
	 $collection_id = get_input('collection_id');
	 $collection_name = get_input('collection_name');
	 
	 //$friends = get_input('friends_collection');
	 
	 //chech the colelction exists and the current user owners it
	 if($full_collection = get_access_collection($collection_id)){
	 
        //first check to make sure that a collection name has been set and create the new colection
        if($collection_name){
        
            //create the collection
            $create_collection = create_access_collection($collection_name, $_SESSION['user']->getGUID());
        
        
            // Success message
    		system_message(elgg_echo("friends:collectionadded"));
    		// Forward to the collections page
    		forward("mod/friends/collections.php");
        
        } else {
        
            register_error(elgg_echo("friends:nocollectionname"));
		
        }
        
    } else {
        
        register_error(elgg_echo("friends:nocollectionname"));
        
    }
        
    // Forward to the add collection page
    forward("mod/friends/edit.php");      
	 
?>