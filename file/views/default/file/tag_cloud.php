<?php
	/**
	 * Elgg file cloud
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	global $CONFIG;

?>
<div id="tagcloud">
<div class="tagcloud_title"><?php echo elgg_echo('file:tagcloud'); ?></div>
<?php
	// Get tags
	$tags = find_metadata("tag", "", "object", "file:file", 999, 0);

	// Go through the list
	$taglist = array();

	foreach ($tags as $tag)
		$taglist[] = $tag->value;

	$cloud = generate_tag_cloud($taglist);
	
	foreach ($cloud as $k => $v)
		echo "<span class=\"tag_$v\"><a href=\"" . $CONFIG->wwwroot . "pg/file/". $_SESSION['user']->username . "/world/?tag=$k\">$k</a></span> ";
	
?>
</div>