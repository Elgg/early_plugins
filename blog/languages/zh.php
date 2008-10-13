<?php

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
	
			'blog' => "博客",
			'blogs' => "博客",
			'blog:user' => "%s 的博客",
			'blog:user:friends' => "%s 好友的博客",
			'blog:your' => "您的博客",
			'blog:posttitle' => "%s 的博客 %s",
			'blog:friends' => "好友的博客",
			'blog:yourfriends' => "您好友更新的博客",
			'blog:everyone' => "整站博客",
	
			'blog:read' => "阅读",
	
			'blog:addpost' => "发表日志",
			'blog:editpost' => "编辑日志",
	
			'blog:text' => "内容",
	
			'blog:strapline' => "%s",
			
			'item:object:blog' => '博客日志',
	
			
         /**
	     * Blog river
	     **/
	        
	        //generic terms to use
	        'blog:river:created' => "%s 建立了",
	        'blog:river:updated' => "%s 更新了",
	        'blog:river:posted' => "%s 发布了",
	        
	        //these get inserted into the river links to take the user to the entity
	        'blog:river:create' => "一个新日志.",
	        'blog:river:update' => "一个日志.",
	        'blog:river:annotate:create' => "一条对日志的评论.",
			
	
		/**
		 * Status messages
		 */
	
			'blog:posted' => "您的日志已经成功的发布了。",
			'blog:deleted' => "您的日志已经成功的删除了。",
	
		/**
		 * Error messages
		 */
	
			'blog:save:failure' => "您的日志无法删除，请再试一次。",
			'blog:blank' => "对不起，发不前您需要同时输入标题和内容。",
			'blog:notfound' => "对不起，我们没有找到指定的日志。",
			'blog:notdeleted' => "抱歉，我们无法删除这个日志。",
	
	);
					
	add_translation("zh",$chinese);

?>