<?php

	/**
	 * Elgg friend collections add/edit 
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['object'] Optionally, the collection edit
	 */

	// Set title, form destination
		if (isset($vars['entity'])) {
			$title = sprintf(elgg_echo("friends:edit"),$object->title);
			$action = "friends/edit";
			$title = $vars['entity']->title;
			$body = $vars['entity']->description;
			$tags = $vars['entity']->tags;
		} else  {
			$title = elgg_echo("friends:add");
			$action = "friends/addcollection";
			$tags = "";
			$title = "";
			$description = "";
	    }

?>

	<h2>
		<?php echo $title; ?>
	</h2>
	<form action="<?php echo $vars['url']; ?>action/<?php echo $action; ?>" method="post">
		<p>
			<label><?php echo elgg_echo("friends:collectionname"); ?><br />
			<?php

				echo elgg_view("input/text", array(
									"internalname" => "collection_name",
									"value" => $title,
													));
			
			?>
			</label>
		</p>
		<p>
			<label><?php echo elgg_echo("friends:addfriends"); ?><br />
			<?php

				echo elgg_view('friends/friendslist');
			
			?>
			</label>
		</p>
		<p>
			<?php

				if (isset($vars['entity'])) {
					?><input type="hidden" name="collection" value="<?php echo $vars['entity']->getGUID(); ?>" /><?php
				}
			
			?>
			<input type="submit" name="submit" value="<?php echo elgg_echo('save'); ?>" />
		</p>
	
	</form>