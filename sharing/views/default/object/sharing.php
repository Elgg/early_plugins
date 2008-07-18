<?php

	/**
	 * Elgg share view
	 * 
	 * @package ElggShare
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	$owner = $vars['entity']->getOwnerEntity();
	$friendlytime = friendly_time($vars['entity']->time_created);

	if (get_context() == "search") {

		if (get_input('search_viewtype') == "gallery") {

			$parsed_url = parse_url($vars['entity']->address);
			$faviconurl = $parsed_url['scheme'] . "://" . $parsed_url['host'] . "/favicon.ico";
		
			$info = "<p class=\"shares_gallery_title\">". elgg_echo("sharing:shared") .": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->title}</a></p>";
			$info .= "<p class=\"shares_gallery_user\">By: <a href=\"{$vars['url']}pg/sharing/{$owner->username}\">{$owner->name}</a> <span class=\"shared_timestamp\">{$friendlytime}</span></p>";
			$numcomments = elgg_count_comments($vars['entity']);
			if ($numcomments)
				$info .= "<p class=\"shares_gallery_comments\"><a href=\"{$vars['entity']->getURL()}\">".sprintf(elgg_echo("comments")). " (" . $numcomments . ")</a></p>";
			
			//display 
			echo "<div class=\"share_gallery_view\">";
			echo "<div class=\"share_gallery_info\">" . $info . "</div>";
			echo "</div>";


		} else {

			$parsed_url = parse_url($vars['entity']->address);
			$faviconurl = $parsed_url['scheme'] . "://" . $parsed_url['host'] . "/favicon.ico";
			if (@file_exists($faviconurl)) {
				$icon = "<img src=\"{$faviconurl}\" />";
			} else {
				$icon = elgg_view(
					"profile/icon", array(
										'entity' => $owner,
										'size' => 'small',
									  )
				);
			}
		
			$info = "<p class=\"shares_gallery_title\">". elgg_echo("sharing:shared") .": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->title}</a></p>";
			$info .= "<p class=\"shares_gallery_user\"><a href=\"{$vars['url']}pg/sharing/{$owner->username}\">{$owner->name}</a> <span class=\"shared_timestamp\">{$friendlytime}</span>";
			$numcomments = elgg_count_comments($vars['entity']);
			if ($numcomments)
				$info .= ", <a href=\"{$vars['entity']->getURL()}\">".sprintf(elgg_echo("comments")). " (" . $numcomments . ")</a>";
		    $info .= "</p>";
			echo elgg_view_listing($icon, $info);

		}
		
	} else {

?>
	<?php echo elgg_view_title(elgg_echo('sharing:shareditem'), false); ?>
	<div class="sharing_item">
	
		<div class="sharing_item_title">
			<h3>
				<a href="<?php echo $vars['entity']->getURL(); ?>"><?php echo $vars['entity']->title; ?></a>
			</h3>
		</div>
		<div class="sharing_item_owner">
			<p> 
				<b><a href="<?php echo $vars['url']; ?>pg/sharing/<?php echo $owner->username; ?>"><?php echo $owner->name; ?></a></b> 
				<?php echo $friendlytime; ?>
			</p>
		</div>
		<div class="sharing_item_description">
			<p>
				<?php echo autop($vars['entity']->description); ?>
			</p>
		</div>
		<div class="sharing_item_tags">
			<p>
				<?php echo elgg_view('output/tags',array('value' => $vars['entity']->tags)); ?>
			</p>
		</div>
		<div class="sharing_item_address">
			<p>
				<?php 

					//echo elgg_view('output/url',array('value' => $vars['entity']->address));
				
				?>
				<a href="<?php echo $vars['entity']->address; ?>">Visit Resource</a>
			</p>
		</div>		
		<?php

			if ($vars['entity']->canEdit()) {
		
		?>
		<div class="sharing_item_controls">
			<p>
				<a href="<?php echo $vars['url']; ?>mod/sharing/add.php?share=<?php echo $vars['entity']->getGUID(); ?>"><?php echo elgg_echo('edit'); ?></a> &nbsp; 
				<?php 
						echo elgg_view('output/confirmlink',array(
						
							'href' => $vars['url'] . "action/sharing/delete?share_guid=" . $vars['entity']->getGUID(),
							'text' => elgg_echo("delete"),
							'confirm' => elgg_echo("sharing:delete:confirm"),
						
						));  
					?>
			</p>
		</div>
		<?php

			}
		
		?>
	
	</div>
	
<?php

	if ($vars['full'])
		echo elgg_view_comments($vars['entity']);

?>
	
<?php

	}

?>