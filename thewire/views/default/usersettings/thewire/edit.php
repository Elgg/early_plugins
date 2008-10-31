<?php if (is_plugin_enabled('smsclient')) { ?><p>
	<?php echo elgg_echo('thewire:smsnumber'); ?>
	 
	<?php echo elgg_view('input/text', array('internalname' => 'params[smsnumber]', 'value' => $vars['entity']->smsnumber)); ?>
</p>
<p>	
	<?php echo sprintf(elgg_echo('thewire:channelsms'), get_plugin_setting('channelnumber', 'smsclient')) ?>
</p><?php } ?>