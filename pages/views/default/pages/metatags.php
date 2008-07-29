<?php

		$treeguid = get_input('treeguid');
		if (empty($treeguid)) {
			$treeguid = get_input('page_guid');
		}

?>

		<script type="text/javascript" src="<?php echo $vars['url']; ?>mod/pages/javascript/elggFileTree.js" ></script>
		<script type="text/javascript">
			
			$(document).ready( function() {
				
				
				$('#pagesTree').fileTree({ 
				root: '<?php echo $treeguid; ?>', 
				script: '<?php echo $vars['url']; ?>mod/pages/pagesTree.php', 
				folderEvent: 'click', 
				expandSpeed: 750, 
				collapseSpeed: 750, 
				expandEasing: 'easeInOutExpo', 
				collapseEasing: 'easeInOutExpo',
				multiFolder: false, 
				fullTree: 1,
				loadMessage: 'Loading...' }, 
				function(file) { 
					window.location(file);
				});
				
				
			});
		</script>
