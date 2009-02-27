<?php

	if ($vars['size'] == 'large') {
		$ext = '_lrg';
	} else {
		$ext = '';
	}
	echo "{$CONFIG->wwwroot}mod/theme_new_elgg_default/graphics/file_icons/general{$ext}.gif";

?>