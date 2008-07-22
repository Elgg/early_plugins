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

	$content = $vars['content'];	
	$title = $vars['title'];
?>
<?php if ($title) { ?>
<div id="sidebar_group_title"><h2><?php echo $title; ?></h2></div>
<?php } ?>
<div id="sidebar_group">
	<?php echo $content; ?>
</div>
