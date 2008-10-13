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
	
			'messageboard:board' => "留言板",
			'messageboard:messageboard' => "留言板",
			'messageboard:viewall' => "查看所有",
			'messageboard:postit' => "发表",
			'messageboard:history' => "历史",
			'messageboard:none' => "目前没有留言",
			'messageboard:num_display' => "显示留言数量",
			'messageboard:desc' => "本留言板用来方便访客对您的资料进行评论和交流。",
			
         /**
	     * Message board widget river
	     **/
	        
	        'messageboard:river:annotate' => "%s 的留言板上有一条评论。",
	        'messageboard:river:create' => "%s 添加了留言板插件。",
	        'messageboard:river:update' => "%s 更新了留言板插件",
			
		/**
		 * Status messages
		 */
	
			'messageboard:posted' => "您的留言发表成功。",
			'messageboard:deleted' => "您的留言删除成功。",
	
		/**
		 * Email messages
		 */
	
			'messageboard:email:subject' => '您的留言板上有一条留言！',
			'messageboard:email:body' => "您的留言板上有一条来自 %s 的留言，内容:

			
%s


查看留言板上的留言,点击:

	%s

查看 %s 的个人资料，点击:

	%s

请不要回复本邮件。",
	
		/**
		 * Error messages
		 */
	
			'messageboard:blank' => "对不起，您需要输入内容才能发布。",
			'messageboard:notfound' => "对不起我们无法找到特定项目",
			'messageboard:notdeleted' => "对不起我们无法删除本消息",
	     
			'messageboard:failure' => "在添加消息时遇到异常错误，请再试一次。",
	
	);
					
	add_translation("zh",$chinese);

?>