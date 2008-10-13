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
	
			'messages' => "消息",
			'messages:user' => "收件箱",
			'messages:sentMessages' => "发送消息",
			'messages:posttitle' => "%s 的消息： %s",
			'messages:inbox' => "收件箱",
			'messages:send' => "发送消息",
			'messages:sent' => "已发消息",
			'messages:message' => "消息",
			'messages:title' => "标题",
			'messages:to' => "到",
			'messages:fly' => "发送",
			'messages:replying' => "回复",
			'messages:inbox' => "收件箱",
			'messages:sendmessage' => "发送消息",
			'messages:compose' => "发送消息",
			'messages:sentmessages' => "已发消息",
			'messages:recent' => "最近消息",
			
			'item:object:messages' => '消息',
	
		/**
		 * Status messages
		 */
	
			'messages:posted' => "您的消息已经成功的发出。",
			'messages:deleted' => "您的消息已经成功的删除。",
	
		/**
		 * Email messages
		 */
	
			'messages:email:subject' => '您有一条新消息！',
			'messages:email:body' => "您有一条新消息来自 %s. 内容:

			
%s


查看消息，点击:

	%s

发送给 %s 一条消息，点击:

	%s

请不要回复本邮件",
	
		/**
		 * Error messages
		 */
	
			'messages:blank' => "抱歉，请再发布前输入内容。",
			'messages:notfound' => "抱歉，我们没有找到指定内容。",
			'messages:notdeleted' => "抱歉，我们无法删除本消息。",
			'messages:nopermission' => "您没有权限删除该消息。",
			'messages:nomessages' => "没有消息可以显示。",
			'messages:user:nonexist' => "我们没有在数据库中找到收件者的信息。",
	
	);
					
	add_translation("zh",$chinese);

?>