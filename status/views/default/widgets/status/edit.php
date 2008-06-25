<?php

    /**
	 * Elgg status plugin edit page
	 *
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

?>
	<p>
		<?php echo elgg_echo("status:set"); ?>:<br />
		<textarea name="params[status]" class="textarea-status" value="<?php echo htmlentities($vars['entity']->status); ?>"></textarea>

	</p>