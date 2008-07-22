<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$english = array(
	
		/**
		 * Menu items and titles
		 */
			
			'pages' => "Pages",
			'pages:yours' => "Your pages",
			'pages:user' => "%s's pages",
			'pages:all' => "All pages",
			'pages:new' => "New page",
			'pages:edit' => "Edit a page",
			'pages:history' => "Page history",
	
	
		/**
		 * Form fields
		 */
	
			'pages:title' => 'Pages Title',
			'pages:description' => 'Your page entry',
			'pages:tags' => 'Tags',	
			'pages:access_id' => 'Access',
			'pages:write_access_id' => 'Write access',
		
		/**
		 * Error messages
		 */
			'pages:noaccess' => 'No access to page',
			'pages:cantedit' => 'You can not edit this page',
			'pages:saved' => 'Pages saved',
			'pages:notsaved' => 'Page could not be saved',
			'pages:notitle' => 'You must specify a title for your page.',
	
		/**
		 * Page
		 */
			'pages:strapline' => 'Last updated %s by %s',
	
		/**
		 * History
		 */
			'pages:revision' => 'Revision created %s by %s',
	
		/**
		 * Submenu items
		 */
			'pages:label:view' => "View page",
			'pages:label:edit' => "Edit page",
			'pages:label:history' => "Page history",
	
		/**
		 * Sidebar items
		 */
			'pages:sidebar:this' => "This page",
			'pages:sidebar:children' => "Subpages",
			'pages:sidebar:parent' => "Parent",
	
			'pages:newchild' => "Create child of this page",
			'pages:backtoparent' => "Back to '%s'",
	);
					
	add_translation("en",$english);
?>