<?php
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
	
	if (isset($vars['fulltree']) && $vars['fulltree'] == 1) {
		echo "<li class=\"directory collapsed\"><a id=\"pagetree".$entity->getGUID()."\" href=\"". $entity->getURL() ."\" rel=\"" . /* $vars['config']->url . 'mod/pages/pagesTree.php?dir=' . */ $entity->getGUID() . "\">" . htmlentities($entity->title) . "</a></li>";
	}
	
	$children = "";
	
	if (isset($vars['children']) && is_array($vars['children']) && (!isset($vars['fulltree']) || $vars['fulltree'] == 0)) {
		
		foreach($vars['children'] as $child) {
			 $children .= "<li class=\"directory collapsed\"><a id=\"pagetree".$child->getGUID()."\" href=\"". $child->getURL() ."\" rel=\"" . /* $vars['config']->url . 'mod/pages/pagesTree.php?dir=' . */ $child->getGUID() . "\">" . htmlentities($child->title) . "</a></li>";
		}
		
	}
	
	if (!isset($vars['fulltree']) || $vars['fulltree'] == 0) {
	
		$children .= "<li><a href=\"{$entity->getURL()}\">". elgg_echo('pages:view') ."</a></li>";
		
		if ($entity->canEdit()) {
			$children .= "<li><a  href=\"{$vars['config']->url}pg/pages/new/?parent_guid={$entity->getGUID()}\">".elgg_echo('pages:newchild') ."</a></li>";
		}
		
		echo elgg_view('pages/sidebar/wrapper',array('body' => $children));

	}
?>