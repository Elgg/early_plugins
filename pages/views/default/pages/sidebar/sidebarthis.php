<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	$entity = $vars['entity'];
	
	
?>
<div>
	<p>
		<a href="<?php echo $CONFIG->url . "pg/pages/new/?parent_guid=" . $entity->guid; ?>"><?php echo elgg_echo('pages:newchild') ?></a>
	</p>
</div>