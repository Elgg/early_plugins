<?php

	$types = $vars['types'];
	
	if (is_array($vars['types']) && sizeof($vars['types'])) {
		
?>
	
		<div class="filerepo_types">
			<p><b><?php echo elgg_echo('file:types'); ?>:</b>

<?php

		$all = new stdClass;
		$all->tag = "all";
		$vars['types'][] = $all;
		foreach($vars['types'] as $type) {

			$tag = $type->tag;
			if ($tag != "all") {
				$label = elgg_echo("file:type:" . $tag);
			} else {
				$label = elgg_echo('all');
			}
			
			$url = $vars['url'] . "mod/file/search.php?subtype=file";
			if ($tag != "all")
				$url .= "&md_type=simpletype&tag=" . urlencode($tag);
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
			
			if (get_input('tag') == $tag) {
				$class = "class=\"filerepo_types_current\"";
			} else {
				$class = "";
			}
				
			echo "<a {$class} href=\"{$url}\">{$label}</a> ";
			
		}
		
?>
			</p>
		</div>

<?php
		
	} else {
		
		echo "<p>" . elgg_echo("file:none") . "</p>";
		
	}

?>