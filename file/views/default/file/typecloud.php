<?php

	$types = $vars['types'];
	
	if (is_array($vars['types']) && sizeof($vars['types'])) {
		
?>
	
		<div class="filerepo_types">
			<p><b><?php echo elgg_echo('file:types'); ?>:</b>

<?php
		
		foreach($vars['types'] as $type) {

			$tag = $type->tag;
			$label = elgg_echo("file:type:" . $tag);
			
			$url = $vars['url'] . "mod/file/search.php?md_type=simpletype&subtype=file&tag=" . urlencode($tag);
			if ($vars['owner_guid'] != "") {
				if (is_array($vars['owner_guid'])) {
					$owner_guid = implode(",",$vars['owner_guid']);
				} else {
					$owner_guid = $vars['owner_guid'];
				}
				$url .= "&owner_guid={$owner_guid}";
			}
			if ($tag == "image")
				$url .= "&search_viewtype=gallery";
			
			echo "<a href=\"{$url}\">{$label}</a> ";
			
		}
		
?>
			</p>

		</div>

<?php
		
	} else {
		
		echo "<p>" . elgg_echo("file:none") . "</p>";
		
	}

?>