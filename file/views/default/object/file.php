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
<div class="file">
	<table width="100%">
		<tr>
			<td valign="top" width="100">
				<div class="file_icon">
					<a href="<?php echo $vars['url']; ?>action/file/download?file_guid=<?php echo $file_guid; ?>"><?php 
					
						echo elgg_view("file/icon", array("mimetype" => $mime, 'thumbnail' => $file->thumbnail, 'file_guid' => $file_guid)); 
						
					?></a>					
				</div>
			</td>
			<td valign="top">
				<div class="title"><?php echo $title; ?></div>
				<div class="description"><?php echo $desc; ?></div>
				<div class="tags"><?php

					echo elgg_view('output/tags',array('value' => $tags));
				
				?></div>
<?php

	if ($file->canEdit()) {
?>

				<p>
					<a href="<?php echo $vars['url']; ?>action/file/delete?file=<?php echo $file->getGUID(); ?>"><?php echo elgg_echo('delete'); ?></a>
				</p>

<?php		
	}

?>
			</td>
		</tr>
	</table>
</div>

