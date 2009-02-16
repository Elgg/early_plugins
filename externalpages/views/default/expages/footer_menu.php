<?php

	/**
	 * Elgg External pages footer menu
	 * 
	 * @package ElggExpages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */
	 
	
?>

<div class="footer_toolbar_links">
<ul>
	<li><a href="<?php echo $vars['url']; ?>pg/expages/read/about/"><?php echo elgg_echo('expages:about'); ?></a></li>
	<li><a href="<?php echo $vars['url']; ?>pg/expages/read/terms/"><?php echo elgg_echo('expages:terms'); ?></a></li>
	<li><a href="<?php echo $vars['url']; ?>pg/expages/read/privacy/"><?php echo elgg_echo('expages:privacy'); ?></a></li>
	<li><a href="<?php echo $vars['url']; ?>pg/expages/read/contact/"><?php echo elgg_echo('expages:contact'); ?></a></li>
</ul>
</div>