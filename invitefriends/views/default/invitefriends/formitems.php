<?php

	/**
	 * Elgg invite page
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @link http://elgg.org/
	 */

?>

<p>
	<?php echo elgg_echo('invitefriends:introduction'); ?>
</p>
<textarea class="input-textarea" name="emails" ></textarea>
<p>
	<?php echo elgg_echo('invitefriends:message'); ?>
</p>
<textarea class="input-textarea" name="emailmessage" ><?php

	echo sprintf(elgg_echo('invitefriends:message:default'),$CONFIG->site->name);

?></textarea>
<?php

	echo elgg_view('input/submit', array('value' => elgg_echo('save')));

?>