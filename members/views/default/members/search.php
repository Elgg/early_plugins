<?php

	/**
	 * Simple member search
	 **/
	 
?>

<div class="sidebarBox">

<h3><?php echo elgg_echo('members:searchtag'); ?></h3>
<form id="memberssearchform" action="<?php echo $vars['url']; ?>mod/members/index.php?" method="get">
	<input type="text" name="search_tag" value="Members tags" onclick="if (this.value=='Members tags') { this.value='' }" class="search_input" />
	<input type="submit" value="<?php echo elgg_echo('go'); ?>" />
</form>

<h3><?php echo elgg_echo('members:searchname'); ?></h3>
<form id="memberssearchform" action="<?php echo $vars['url']; ?>mod/members/index.php?" method="get">
	<input type="text" name="search_name" value="Members name" onclick="if (this.value=='Members name') { this.value='' }" class="search_input" />
	<input type="submit" value="<?php echo elgg_echo('go'); ?>" />
</form>

</div>