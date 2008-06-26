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

					$owner = $vars['entity']->getOwnerEntity();
				
				?>
				<?php

					echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
				
				?>
				<b><a href="<?php echo $vars['url']; ?>pg/sharing/<?php echo $owner->username; ?>"><?php echo $owner->name; ?></a></b><br /> 
				<?php echo friendly_time($vars['entity']->time_created); ?>
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