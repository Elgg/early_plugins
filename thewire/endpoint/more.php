<?php

    /**
	 * Elgg show more messages
	 *
	 * @package ElggThewire
	 * @license Private
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009 - 2009
	 * @link http://elgg.com/
	 */

    // Load Elgg engine will not include plugins
     require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
    
    //grab the offset value
    $offset = get_input('offset');
    //get the next lot of messages
    $get_wireposts = get_entities_from_annotations("object", "thewire", "wire_reply", "", 0, 0, 20, $offset, "desc", false);
    //set a new offset by adding the limit 
    $offset = $offset + 20;
    //display
    echo elgg_view('thewire/display', array("entities" => $get_wireposts, 'offset' => $offset, 'ajax'=>true));
    
?>
