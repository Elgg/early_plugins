<?php

	/**
	 * Elgg External pages about edit
	 * 
	 * @package ElggExpages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['object'] Optionally, the blog post to edit
	 */
	 
	 // Set title, form destination
		if (isset($vars['entity'])) {
			$title = sprintf(elgg_echo("expages:editpost"),$object->title);
			$body = $vars['entity']->description;
			$tags = $vars['entity']->tags;
		} else  {
			$title = elgg_echo("expages:addpost");
			$action = "expages/add";
			$tags = "";
			$description = "";
		}

?>
<form action="<?php echo $vars['url']; ?>action/expages/add" method="post" name="pageForm">
		<p>
			<?php
			    echo elgg_view('input/longtext', array('internalname' => 'expagesabout', 'value' => $body));
             ?>
      	</p>
		<p>
			<?php
				echo elgg_echo('tags') . "<br/>";
				echo elgg_view('input/tags', array('internalname' => 'expagestags', 'value' => $tags));
                
			?>
		</p>
			<input type="hidden" name="method" value="site" />
			<br />
			<input type="submit" value="<?php echo elgg_echo('save'); ?>" />
</form>
