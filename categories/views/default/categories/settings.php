<?php

	echo elgg_view_title(elgg_echo('categories:settings'));

?>

	<div class="categories_explanation">
		<p>
			<?php echo elgg_echo('categories:explanation'); ?>
		</p>
	</div>

<?php

	echo elgg_view(
						'input/form',
						array(
							'action' => $vars['url'] . 'action/categories/save',
							'method' => 'post',
							'body' => elgg_view('categories/settingsform',$vars)
						)
					);

?>