<?php

	/**
	 * Elgg get sharing bookmarklet view
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

?>

	<p>
		<?php echo elgg_echo("sharing:bookmarklet:description"); ?>
	</p>
	<p class="sharing_bookmarklet">
		<a href="javascript:location.href='<?php echo $vars['url']; ?>mod/sharing/add.php?address='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)"> <img src="<?php echo $vars['url']; ?>_graphics/elgg_bookmarklet.gif" border="0" title="<?php echo elgg_echo("sharing:this"); ?>" />   </a>
	</p>
	<p>
		<?php echo elgg_echo("sharing:bookmarklet:description:conclusion"); ?>
	</p>