<?php

$body = '';

$quota = get_plugin_setting('quota', 'file');

$body .= elgg_echo('file:quota:settings:title');
$body .= '<br />';
$body .= elgg_view('input/text',array('internalname'=>'params[quota]','value'=>$quota));

// comment out the folders setting for now

/*$options = array(elgg_echo('file:settings:yes')=>'yes',
	elgg_echo('file:settings:no')=>'no',
);

$enable_folders = get_plugin_setting('enable_folders', 'file');
if (!$enable_folders) {
	$enable_folders = 'no';
}

$body .= elgg_echo('file:settings:enable_folders:title');
$body .= '<br />';
$body .= elgg_view('input/radio',array('internalname'=>'params[enable_folders]','value'=>$enable_folders,'options'=>$options));
*/

echo $body;

?>