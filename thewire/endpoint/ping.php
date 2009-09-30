<?php

    /**
	 * Check for new messages.
	 * Outputs # of new messages since $_GET['last_checked'] time
	 *
	 * @package ElggThewire
	 * @license Private
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009 - 2009
	 * @link http://elgg.com/
	 */

    // Load Elgg engine will not include plugins
     require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
     
    // check for last checked time
    if (!$last_reload = get_input('last_reload', 0)) {
    	echo '';
    	exit;
    }
    #$wireposts = get_entities_from_annotations("object", "thewire", "wire_reply", "", 0, 0, 20, $offset, "desc", true, $last_reload);
    $wireposts = count_annotations('', 'object', 'thewire', 'wire_reply', '', '', '', $last_reload);

    if ($wireposts > 0) {
    	$s = ($wireposts == 1) ? '' : 's';
    	echo "<a href=\"\" onClick=\"window.location.reload();\" class=\"update_wire\">$wireposts new post$s!</a>";

    } else {
    	echo '';
    	exit;
    }
