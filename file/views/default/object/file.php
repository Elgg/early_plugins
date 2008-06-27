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
	$owner = $vars['entity']->getOwnerEntity();
	$friendlytime = friendly_time($vars['entity']->time_created);
	
	$mime = $file->mimetype;
	
	if (get_context() == "search") { 	// Start search listing version 
		$info = "<p>". elgg_echo('file') .": <a href=\"{$file->getURL()}\">{$title}</a> (<a href=\"{$vars['url']}action/file/download?file_guid={$file_guid}\">". elgg_echo("file:download") . "</a>)</p>";
		$info .= "<p><a href=\"{$vars['url']}pg/file/{$owner->username}\">{$owner->name}</a> {$friendlytime}";
		$numcomments = elgg_count_comments($file);
		if ($numcomments)
			$info .= ", ".sprintf(elgg_echo("comments:count"),elgg_count_comments($file));
		$info .= "</p>";
		
		// $icon = elgg_view("profile/icon",array('entity' => $owner, 'size' => 'small'));
		$icon = elgg_view("file/icon", array("mimetype" => $mime, 'thumbnail' => $file->thumbnail, 'file_guid' => $file_guid));
		
		echo elgg_view_listing($icon, $info);
		
	} else {							// Start main version
	
?>
	<div class="filerepo_file">
		<div class="filerepo_icon">
					<a href="<?php echo $vars['url']; ?>action/file/download?file_guid=<?php echo $file_guid; ?>"><?php 
						
						echo elgg_view("file/icon", array("mimetype" => $mime, 'thumbnail' => $file->thumbnail, 'file_guid' => $file_guid)); 
						
					?></a>					
		</div>
		<div class="filerepo_maincontent">
		<div class="filerepo_title"><h3><a href="<?php echo $file->getURL(); ?>"><?php echo $title; ?></a></h3></div>
		<div class="filerepo_owner">
			<p> 
				<?php

					echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
				
				?>
				<b><a href="<?php echo $vars['url']; ?>pg/file/<?php echo $owner->username; ?>"><?php echo $owner->name; ?></a></b><br /> 
				<?php echo $friendlytime; ?>
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

<?php

	if ($vars['full']) {
		
		echo elgg_view_comments($file);
		
	}

?>

<?php

	}

?>