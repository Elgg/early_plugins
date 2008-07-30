[<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	global $CONFIG;
	$entity = $vars['entity'];
	$parent = $vars['entity']->parent_guid;
	
	if (!$parent) {
		echo "{\n";
		echo "\t\"text\": \"<a href=\\\"{$vars['entity']->getURL()}\\\">{$vars['entity']->title}</a>\",\n";
	}
		$children = "";
		if (isset($vars['children']) && is_array($vars['children']) && (!isset($vars['fulltree']) || $vars['fulltree'] == 0)) {
			if (!$parent) echo "\t" . '"children": [' . "\n";		
			foreach($vars['children'] as $child) {
				if (!empty($children)) $children .= ", \n";
				$children .= "\n\t\t{\n";
				$children .= "\t\t\t\"text\": \"<a href=\\\"{$child->getURL()}\\\">{$child->title}</a>\",\n";
				
				$haschild = get_entities_from_metadata('parent_guid',$child->guid,'','',0,10,0,'',0,true);
				if ($haschild) {
					$children .= "\t\t\t\"id\": \"{$child->getGUID()}\",\n\t\t\t\"hasChildren\": true\n";
				}				
				$children .= "\t\t}"; 
			}
			echo $children;
			if (!$parent) echo "\t\t" . ']' . "\n";
		
		}
		
	if (!$parent) echo "}";

?>]