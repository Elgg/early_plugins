<?php
	/**
	 * Elgg Pages: Add group menu
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
?>
<p><a href="<?php echo $vars['url']; ?>pg/pages/owned/<?php echo page_owner_entity()->username; ?>"><?php echo elgg_echo("pages"); ?></p>