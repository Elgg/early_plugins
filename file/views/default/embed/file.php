<?php

	 /**
     * Embed media from users file repo in longtext area for use in blogs, pages etc
     *
	 * @package ElggFile
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$file = $vars['entity'];
	
	if ($file->simpletype == 'image') {
		$size = 'large';
	} else {
		$size = 'small';
	}
	$icon = elgg_view("file/icon", array("mimetype" => $file->mimetype, 'thumbnail' => $file->thumbnail, 'file_guid' => $file->guid, 'size' => $size));

?>

<a href="<?php echo $file->getURL(); ?>" title="<?php echo htmlentities($file->title); ?>"><?php echo $icon; ?></a>