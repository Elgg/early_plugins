<?php

	/**
	 * Simple member search
	 **/
	 
?>

<div class="member_search">
<h3><?php echo elgg_echo('members:searchtag'); ?></h3>
<form id="searchform" action="<?php echo $vars['url']; ?>mod/members/index.php?" method="get">
	<input type="text" name="search_tag" value="Search" onclick="if (this.value=='Search') { this.value='' }" class="search_input" />
	<input type="submit" value="<?php echo elgg_echo('go'); ?>" class="search_submit_button" />
</form>
<h3><?php echo elgg_echo('members:searchname'); ?></h3>
<form id="searchform" action="<?php echo $vars['url']; ?>mod/members/index.php?" method="get">
	<input type="text" name="search_name" value="Search" onclick="if (this.value=='Search') { this.value='' }" class="search_input" />
	<input type="submit" value="<?php echo elgg_echo('go'); ?>" class="search_submit_button" />
</form>
</div>