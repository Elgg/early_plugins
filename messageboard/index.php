<?php

    /**
	 * Elgg Message board index page
	 * 
	 * @package ElggMessageBoard
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
	 
	 // Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// Get the user who is the owner of the message board
	    $entity = get_entity(page_owner());
	    
    // Get any annotations for their message board
		$contents = $entity->getAnnotations('messageboard', 50, 0, 'desc');
	
    // Get the content to display	
		$area1 = elgg_view("messageboard/forms/add");
		$area1 .= elgg_view("messageboard/messageboard", array('annotation' => $contents));
	    
		
    //select the correct canvas area
	    $body = elgg_view_layout("one_column", $area1);
		
	// Display page
		page_draw(sprintf(elgg_echo('shouts:user')),$body);
	 
?>