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
		<a href="<?php echo $entity->getURL(); ?>"><?php echo sprintf(elgg_echo('pages:backtoparent'), $entity->title) ?></a>
	</p>
</div>