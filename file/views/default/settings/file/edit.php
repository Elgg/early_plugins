<?php

$body = '';

$quota = get_plugin_setting('quota', 'file');

$body .= elgg_echo('file:quota:settings:title');
$body .= '<br />';
$body .= elgg_view('input/text',array('internalname'=>'params[quota]','value'=>$quota));

echo $body;

?>