<?php

	$categories = $vars['config']->site->categories;
	
	
	if ($categories) {
?>

	<h2><?php echo elgg_echo('categories'); ?></h2>
	<div class="categories">
		<?php

			$catstring = '';
			if (!empty($categories)) {
				foreach($categories as $category) {
					$catstring .= '<li><a href="'.$vars['baseurl'].urlencode($category).'">'. $category .'</a></li>';
				}
			}
			if (!empty($catstring)) echo "<ul>{$catstring}</ul>";
		
		?>
	</div>
<?php } ?>