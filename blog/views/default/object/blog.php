<?php

	/**
	 * Elgg blog individual post view
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@curverider.co.uk>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['entity'] Optionally, the blog post to view
	 */

		if (isset($vars['entity'])) {
			
?>

	<div class="blog-post">
		<h3><a href="<?php echo $vars['entity']->getURL(); ?>"><?php echo $vars['entity']->title; ?></a></h3>
		<div style="float:left;width:60px;">
		    <?php
		        echo elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'tiny'));
			?>
	    </div>
		<p class="strapline">
			<?php
                
				echo sprintf(elgg_echo("blog:strapline"),
								date("F j, Y",$vars['entity']->time_created)
				);
			
			?>
			by <a href="<?php echo $vars['url']; ?>pg/blog/<?php echo $vars['entity']->getOwnerEntity()->username; ?>"><?php echo $vars['entity']->getOwnerEntity()->name; ?></a><br />
			<a href="">Add to friends</a> - <a href="">report post</a>
		</p>
		
		<!-- display the user icon -->
		<p style="float: left">
			<?php
				//echo elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'medium'));
			?><br />
		</p>
		
		<!-- display the actual blog post -->
		<p>
			<?php
		
						echo nl2br($vars['entity']->description);
			
			?>
		</p>
		
		<!-- display tags -->
		<p>
			<?php

				echo elgg_view('output/tags', array('tags' => $vars['entity']->tags));
			
			?>
		</p>
		
		<!-- display the comments link -->
		<p>
		    <?php
		        //get the number of comments
		        $num_comments = $vars['entity']->countAnnotations('comment');
		    ?>
		    <a href="<?php echo $vars['entity']->getURL(); ?>">Comments (<?php echo $num_comments; ?>)</a>
		</p>
		
		<!-- display edit options if it is the blog post owner -->
		<p>
		<?php

			if ($vars['entity']->canEdit()) {
				
			?>
				<a href="<?php echo $vars['url']; ?>mod/blog/edit.php?blogpost=<?php echo $vars['entity']->getGUID(); ?>"><?php echo elgg_echo("edit"); ?></a>
				<?php
				
					echo elgg_view("output/confirmlink", array(
																'href' => $vars['url'] . "action/blog/delete?blogpost=" . $vars['entity']->getGUID(),
																'text' => elgg_echo('delete'),
																'confirm' => elgg_echo('deleteconfirm'),
															));

					// Allow the menu to be extended
					echo elgg_view("editmenu",array('entity' => $vars['entity']));
				
				?>
			<?php
			}
		
		?>
		</p>
	</div>

<?php

		// If we've been asked to display the full view
			if (isset($vars['full']) && $vars['full'] == true) {
				echo elgg_view('object/blog-comments',array('entity' => $vars['entity'], 'comments' => $vars['entity']->getAnnotations('comment')));
			}

		}

?>