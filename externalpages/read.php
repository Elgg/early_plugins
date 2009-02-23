<?php

	/**
	 * Elgg read external page
	 * 
	 * @package ElggExpages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		define('externalpage',true);
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// set some variables
		$type = get_input('expages');
											
	// Set the title appropriately
		$area1 = elgg_view_title(elgg_echo($type));
		
		//get contents
		$contents = get_entities("object", $type, 0, "", 1);
		
		if($contents){
			foreach($contents as $c){
				$area1 .= "<div class=\"contentWrapper\">" . $c->description . "</div>";
			}
		}else
			$area1 .= "<div class=\"contentWrapper\">" . elgg_echo("expages:notset") . "</div>";

	// Display through the correct canvas area
		$body = elgg_view_layout("one_column", $area1);
		
	// Display page
		page_draw($title,$body);
		
?>