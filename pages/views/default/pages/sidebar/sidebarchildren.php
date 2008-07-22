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
	
	$children = $vars['children'];
?>
<div>
<?php

	foreach ($children as $child)
	{
?>
		<p><a href="<?php echo $child->getURL(); ?>"><?php echo $child->title; ?></a></p>	
<?		
	}
	
?>
</div>