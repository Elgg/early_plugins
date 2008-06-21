<?php

     /**
	 * Elgg status plugin view page
	 *
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
?>

<p>
	<?php

		$status = $vars['entity']->status;
		if (!empty($status)) { 
			echo $vars['entity']->status;
		} else {
			echo elgg_echo("status:firstmessage");
		}
	
	?>
</p>