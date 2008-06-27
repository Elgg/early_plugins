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
		
		$info = "<p>". elgg_echo("sharing:shared") .": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->title}</a> (<a href=\"{$vars['entity']->address}\">". elgg_echo("sharing:visit") ."</a>)</p>";
		$info .= "<p><a href=\"{$vars['url']}pg/sharing/{$owner->username}\">{$owner->name}</a> {$friendlytime}";
		$numcomments = elgg_count_comments($vars['entity']);
		if ($numcomments)
			$info .= ", ".sprintf(elgg_echo("comments:count"),$numcomments);
		$info .= "</p>";
		
		echo elgg_view_listing($icon, $info);
		
	} else {

?>

	<div class="sharing_item">
	
		<div class="sharing_item_title">
			<p>
				<a href="<?php echo $vars['entity']->getURL(); ?>"><?php echo $vars['entity']->title; ?></a>
			</p>
		</div>
		<div class="sharing_item_owner">
			<p> 
				<?php

					echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
				
				?>
				<b><a href="<?php echo $vars['url']; ?>pg/sharing/<?php echo $owner->username; ?>"><?php echo $owner->name; ?></a></b><br /> 
				<?php echo $friendlytime; ?>
			</p>
		</div>
		<div class="sharing_item_address">
			<p>
				<?php 

					echo elgg_view('output/url',array('value' => $vars['entity']->address));
				
				?>
			</p>
		</div>		
		<div class="sharing_item_description">
			<p>
				<?php echo nl2br($vars['entity']->description); ?>
			</p>
		</div>
		<div class="sharing_item_tags">
			<p>
				<?php echo elgg_view('output/tags',array('value' => $vars['entity']->tags)); ?>
			</p>
		</div>
		<?php

			if ($vars['entity']->canEdit()) {
		
		?>
		<div class="sharing_item_controls">
			<p>
				<a href="<?php echo $vars['url']; ?>mod/sharing/add.php?share=<?php echo $vars['entity']->getGUID(); ?>"><?php echo elgg_echo('edit'); ?></a>
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