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

	$russian = array(
	
		/**
		 * Menu items and titles
		 */
			
			'pages' => "Страницы", //"Pages",
			'pages:yours' => "Ваши страницы", //"Your pages",
			'pages:user' => "Начало", //"Pages home",
			'pages:group' => "Страницы %s", //"%s's pages",
			'pages:all' => "Все страницы сайта", //"All site pages",
			'pages:new' => "Добавить страницу", //"New page",
			'pages:groupprofile' => "Страницы групп", //"Group pages",
			'pages:edit' => "Редактировать страницу", //"Edit this page",
			'pages:delete' => "Удалить эту страницу", //"Delete this page",
			'pages:history' => "История страницы", //"Page history",
			'pages:view' => "Открыть страницу", //"View page",
			'pages:welcome' => "Изменить приветствие", //"Edit welcome message",
			'pages:welcomeerror' => "Невозможно сохранить Ваше приветствие", //"There was a problem saving your welcome message",
			'pages:welcomeposted' => "Ваше привествие сохранено", //"Your welcome message has been posted",
			'pages:navigation' => "Навигация", //"Page navigation",
	
			'item:object:page_top' => "Страницы первого уровня", //'Top-level pages',
			'item:object:page' => "Страницы", //'Pages',
			'item:object:pages_welcome' => "Блоки привествия", //'Pages welcome blocks',
	
	
		/**
		 * Form fields
		 */
	
			'pages:title' => "Заголовок", //'Pages Title',
			'pages:description' => "Описание", //'Your page entry',
			'pages:tags' => "Тэги", //'Tags',	
			'pages:access_id' => "Доступ", //'Access',
			'pages:write_access_id' => "Доступ для записи", //'Write access',
		
		/**
		 * Status and error messages
		 */
			'pages:noaccess' => "Нет доступа к странице", //'No access to page',
			'pages:cantedit' => "Вы не можете изменять эту страницу", //'You can not edit this page',
			'pages:saved' => "Страница сохранена", //'Pages saved',
			'pages:notsaved' => "Страница не может быть сохранена", //'Page could not be saved',
			'pages:notitle' => "Вы должны указать заголовок статьи", //'You must specify a title for your page.',
			'pages:delete:success' => "Ваша страница удалена", //'Your page was successfully deleted.',
			'pages:delete:failure' => "Эта страница не может быть удалена", //'The page could not be deleted.',
	
		/**
		 * Page
		 */
			'pages:strapline' => "Последнее исправление %s %s", //'Last updated %s by %s',
	
		/**
		 * History
		 */
			'pages:revision' => "Создано %s %s", //'Revision created %s by %s',
			
		/**
		 * Widget
		 */
			'pages:num' => 'Количество страниц на одной странице',
	
		/**
		 * Submenu items
		 */
			'pages:label:view' => "Смотреть", //"View page",
			'pages:label:edit' => "Редактировать", //"Edit page",
			'pages:label:history' => "История", //"Page history",
	
		/**
		 * Sidebar items
		 */
			'pages:sidebar:this' => "Эта страница", //"This page",
			'pages:sidebar:children' => "Разделы", //"Sub-pages",
			'pages:sidebar:parent' => "Родитель", //"Parent",
	
			'pages:newchild' => "Создать раздел", //"Create a sub-page",
			'pages:backtoparent' => "Вернуться к '%s'", //"Back to '%s'",
	);
					
	add_translation("ru",$russian);
?>