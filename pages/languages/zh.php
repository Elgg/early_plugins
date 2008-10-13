<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	/**
	 *  Chinese Language Package
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @translator Cosmo Mao
	 * @copyright cOSmoCommerce.com 2008
	 * @link http://www.elggsns.cn/
	 * @version 0.1
	 */
	$chinese = array(
	
		/**
		 * Menu items and titles
		 */
			
			'pages' => "页面",
			'pages:yours' => "您的页面",
			'pages:user' => "首页",
			'pages:group' => "%s 的页面",
			'pages:all' => "整站页面",
			'pages:new' => "新页面",
			'pages:groupprofile' => "群组页面",
			'pages:edit' => "编辑本页",
			'pages:delete' => "删除本页",
			'pages:history' => "页面历史",
			'pages:view' => "访问页面",
			'pages:welcome' => "编辑欢迎信息",
			'pages:welcomeerror' => "您的欢迎信息发布时遇到了错误",
			'pages:welcomeposted' => "您的欢迎信息已经发布了",
			'pages:navigation' => "导航",
	
			'item:object:page_top' => '顶级页面',
			'item:object:page' => '页面',
			'item:object:pages_welcome' => '页面欢迎信息',
	
	
		/**
		 * Form fields
		 */
	
			'pages:title' => '页面标题',
			'pages:description' => '您的页面描述',
			'pages:tags' => '标签',	
			'pages:access_id' => '访问',
			'pages:write_access_id' => '写权限',
		
		/**
		 * Status and error messages
		 */
			'pages:noaccess' => '无法访问本页',
			'pages:cantedit' => '您无法编辑本页',
			'pages:saved' => '页面保存了',
			'pages:notsaved' => '页面无法保存',
			'pages:notitle' => '您必须指定一个标题给本页面。',
			'pages:delete:success' => '您的页面已经成功的删除了。',
			'pages:delete:failure' => '该页无法删除。',
	
		/**
		 * Page
		 */
			'pages:strapline' => '最近于 %s 由 %s 更新',
	
		/**
		 * History
		 */
			'pages:revision' => '修正于 %s 由 %s 建立',
	
		/**
		 * Submenu items
		 */
			'pages:label:view' => "查看页面",
			'pages:label:edit' => "编辑页面",
			'pages:label:history' => "页面历史",
	
		/**
		 * Sidebar items
		 */
			'pages:sidebar:this' => "本页",
			'pages:sidebar:children' => "子页面",
			'pages:sidebar:parent' => "父页面",
	
			'pages:newchild' => "建立子页面",
			'pages:backtoparent' => "返回到 '%s'",
	);
					
	add_translation("zh",$chinese);
?>