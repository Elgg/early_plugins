<?php

	/**
	 * Elgg status river view
	 * 
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * @uses $vars['entity'] Optionally, the status message to view
	 */

	$performed_by = $vars['performed_by'];
	
	//set the required url to the user who carried out the action
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	
	//get the correct action message to display
	$string = sprintf(elgg_echo("status:river:created"),$url) . " ";
	
	//add the url and message to the output
	$string .= "<a href=\"" . $vars['entity']->getURL() . "\">" . elgg_echo("status:river:create") . "</a>";

?>

<?php echo $string; ?>