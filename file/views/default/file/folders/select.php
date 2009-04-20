<?php
$folders_none = elgg_echo('file:folders:none');

if (isset($vars['entity'])) {
	$container = get_entity($vars['entity']->container_guid);
	$value = $vars['entity']->folder;
} else {
	$container = page_owner_entity();
	$value = $folders_none;
}

$folders = $container->elgg_file_folders;
if (!$folders) {
	$folders = array($folders_none);
} else {
	if (!is_array($folders)) {
		$folders = array($folders);
	}
	if (!in_array($folders_none,$folders)) {
		$folders[] = $folders_none;
	}
	natcasesort($folders);
}

$body .= '<p>'.elgg_echo('file:folders:description').'</p>';
	
$options = $folders;
$body .= '<p><label>'.elgg_echo('file:folders:select_label').'<br />';
$body .= elgg_view('input/pulldown',array('internalname'=>'folder_select','value'=>$value, 'options'=>$options));
$body .= '</label></p>';
$body .= '<p>'.elgg_echo('file:folders:or').'</p>';

$body .= '<p><label>'.elgg_echo('file:folders:text_label').'<br />';
$body .= elgg_view('input/text',array('internalname'=>'folder_text'));
$body .= '</label></p>';

echo $body;
?>