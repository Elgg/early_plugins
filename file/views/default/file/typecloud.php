<?php

	$types = $vars['types'];
	
	if (is_array($vars['types']) && sizeof($vars['types'])) {
		
?>
	
		<div class="filerepo_types">
			<h2><?php echo elgg_echo('file:types'); ?></h2>

<?php
		
		foreach($vars['types'] as $type) {

			$label = elgg_echo("file:type:" . $type->tag);
			
			$url = $vars['url'] . "search/?md_type=simpletype&subtype=file&tag=" . urlencode($type->tag);
			if ($vars['owner_guid'] != "") {
				if (is_array($vars['owner_guid'])) {
					$owner_guid = implode(",",$vars['owner_guid']);
				} else {
					$owner_guid = $vars['owner_guid'];
				}
				$url .= "&owner_guid={$owner_guid}";
			}
			
			echo "<p><a href=\"{$url}\">{$label}</a></p>";
			
		}
		
?>

		</div>

<?php
		
	} else {
		
		echo "<p>" . elgg_echo("file:none") . "</p>";
		
	}

?>