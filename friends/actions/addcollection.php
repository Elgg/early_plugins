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
	 
	 $collection_name = get_input('collection_name');
	 $friends = get_input('friends_collection');
	 
    //first check to make sure that a collection name has been set and create the new colection
    if($collection_name){
        
        //create the collection
        $create_collection = create_access_collection($collection_name, $_SESSION['user']->getGUID());
        
        //if the collection was created and the user passed some friends from the form, add them
        if($create_collection && (!empty($friends))){
            
            //add friends to the collection
            foreach($friends as $friend){
                add_user_to_access_collection($friend, $create_collection);
	        }
	        
        }
        
        // Success message
		system_message(elgg_echo("friends:collectionadded"));
		// Forward to the collections page
		forward("mod/friends/collections.php");
        
    } else {
        
        register_error(elgg_echo("friends:nocollectionname"));
        // Forward to the add collection page
		forward("mod/friends/edit.php");
		
    }
	 
?>