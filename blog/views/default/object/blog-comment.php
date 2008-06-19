<?php

	/**
	 * Elgg blog individual comment view
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@curverider.co.uk>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['entity'] The comment to view
	 */
	 
	 // get the user object to user 
	 $owner = get_user($vars['entity']->owner_guid);


?>

	<li>
		<div class="blog-comment">
		<?php 
		    //display the small user icon
		    echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny')); 
		?>
		
		<p class="blog-comment-byline">
			<?php
			
				if ($owner) {
					echo $owner->name;
				}
			
			?>, <?php echo date("F j, g:i a",$vars['entity']->time_created); ?>
		</p>
		
		
		<p class="blog-comment-text"><?php echo elgg_view("output/longtext",array("value" => $vars['entity']->value)); ?></p>

		<?php

			if ($vars['entity']->canEdit()) {
?>
		<p class="blog-comment-menu">
		<?php

			echo elgg_view("output/confirmlink",array(
														'href' => $vars['url'] . "action/blog/comments/delete?comment_id=" . $vars['entity']->id,
														'text' => elgg_echo('delete'),
														'confirm' => elgg_echo('deleteconfirm'),
													));
		
		?>
		</p>
<?php
			}
		
		?>
		</div>
	</li>