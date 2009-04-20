<?php
	/**
	 * Elgg file browser uploader
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	
	if (isset($vars['entity'])) {
		$action = "file/save";
	} else  {
		$action = "file/upload";
	}
	$submit_message = '<b>'.elgg_echo('file:uploading_files_title').'</b><br /><br />';
	$submit_message .= elgg_echo('file:uploading_files_description').'<br /><br />';
	$submit_message .= '<img src="'.$vars['url'].'mod/file/graphics/wait.gif">';
	
	$vars['plugin'] = "file";
?>
<?php

	if ($action == "file/upload") {
		echo elgg_view("js/upload_js",array('submit_message' => $submit_message));
?>

		<div id="form_message" class="contentWrapper">
		<p><?php echo elgg_echo('file:upload_description'); ?></p>
		</div>
<?php

	} else {

?>
	<div id="form_message" class="contentWrapper" style="display:none"></div>
<?php
	}
?>
	<div id="form_container" class="contentWrapper">
	<form name="file_form" id="file_form" action="<?php echo $vars['url']; ?>action/<?php echo $action; ?>" enctype="multipart/form-data" method="post">
		<?php echo elgg_view('upload/upload_form_content',$vars); ?>
		<p>
			<input type="submit" value="<?php echo elgg_echo("save"); ?>" />
		</p>
	</form>
	</div>