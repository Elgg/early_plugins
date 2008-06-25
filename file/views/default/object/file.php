<?php
	/**
	 * Elgg file browser.
	 * File renderer.
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	
	$file = $vars['entity'];
	
	$file_guid = $file->getGUID();
	$tags = $file->tags;
	$title = $file->title;
	$desc = $file->description;
	
	$mime = $file->mimetype;
	
?>
	<div class="filerepo_file">
		<div class="filerepo_icon">
					<a href="<?php echo $vars['url']; ?>action/file/download?file_guid=<?php echo $file_guid; ?>"><?php 
						
						echo elgg_view("file/icon", array("mimetype" => $mime, 'thumbnail' => $file->thumbnail, 'file_guid' => $file_guid)); 
						
					?></a>					
		</div>
		<div class="filerepo_maincontent">
		<div class="filerepo_title"><h3><?php echo $title; ?></h3></div>
		<div class="filerepo_owner">
			<p> 
				<?php

					$owner = $vars['entity']->getOwnerEntity();
				
				?>
				<?php

					echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
				
				?>
				<b><a href="<?php echo $vars['url']; ?>pg/file/<?php echo $owner->username; ?>"><?php echo $owner->name; ?></a></b><br /> 
				<?php echo friendly_time($vars['entity']->time_created); ?>
			</p>
		</div>
		<div class="filerepo_description"><p><?php echo nl2br($desc); ?></p></div>
		<?php
			if (elgg_view_exists('file/specialcontent/' . $mime)) {
				echo "<div class=\"filerepo_specialcontent\">".elgg_view('file/specialcontent/' . $mime, $vars)."</div>";
			}
		
		?>
		<div class="filerepo_download"><p><a href="<?php echo $vars['url']; ?>action/file/download?file_guid=<?php echo $file_guid; ?>"><?php echo elgg_echo("file:download"); ?></a></p></div>
		<div class="filerepo_tags"><p><?php

					echo elgg_view('output/tags',array('value' => $tags));
				
				?></p></div>
<?php

	if ($file->canEdit()) {
?>

	<div class="filerepo_controls">
				<p>
					<a href="<?php echo $vars['url']; ?>mod/file/edit.php?file_guid=<?php echo $file->getGUID(); ?>"><?php echo elgg_echo('edit'); ?></a>
					<?php 
						echo elgg_view('output/confirmlink',array(
						
							'href' => $vars['url'] . "action/file/delete?file=" . $file->getGUID(),
							'text' => elgg_echo("delete"),
							'confirm' => elgg_echo("file:delete:confirm"),
						
						));  
					?>
				</p>
	</div>

<?php		
	}

?>
	</div>
</div>

