<?php

	/**
	 * Elgg External pages menu
	 * 
	 * @package ElggExpages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */
	 
	 //set the url
	 $url = $vars['url'] . "pg/expages/index.php?type=";

?>

<div class="external_menu">
<ul>
	<li><a href="<?php echo $url; ?>front"><?php echo elgg_echo('expages:frontpage'); ?></a></li>
	<li><a href="<?php echo $url; ?>about"><?php echo elgg_echo('expages:about'); ?></a></li>
	<li><a href="<?php echo $url; ?>terms"><?php echo elgg_echo('expages:terms'); ?></a></li>
	<li><a href="<?php echo $url; ?>privacy"><?php echo elgg_echo('expages:privacy'); ?></a></li>
	<li><a href="<?php echo $url; ?>contact"><?php echo elgg_echo('expages:contact'); ?></a></li>
</ul>
</div>