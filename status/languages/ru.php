<?php

	$russian = array(
	
		/**
		 * Menu items and titles
		 */
	
			'status' => "Статус",
			'status:user' => "Статус пользователя %s",
			'status:current'=> "Текущий статус",
			'status:desc'=> "Этот виджет показывает ваш последний статус.",
			'status:posttitle' => "Статус пользователя %s: %s",
			'status:everyone' => "Все статусы сайта",
			'status:strapline' => "%s",
			'status:addstatus' => "Установить статус",
		    'status:messages' => "Сообщение",
			'status:text' => "Статус:",
			'status:set' => "установил(-а) ",
			'status:clear' => "очистил(-а) статус",
			'status:delete' => "удалил(-a) статус",
			'status:nostatus' => "Статус не установлен.",
			'status:viewhistory' => "предыдущие",
	
			'item:object:status' => 'Сообщения о статусе',
	
	
        /**
	     * Status river
	     **/
	        
	        //generic terms to use
	        'status:river:created' => "%s обновил",
	        
	        //these get inserted into the river links to take the user to the entity
	        'status:river:create' => "свой статус.",
	        
	        
	
		/**
		 * Status messages
		 */
	
			'status:posted' => "Ваш новый статус успешно установлен.",
			'status:deleted' => "Ваш новый статус успешно удалён.",
	
		/**
		 * Error messages
		 */
	
			'status:blank' => "Извините; вам необходимо указать статус прежде, чем его сохранять.",
			'status:notfound' => "Извините, мы не можем найти указанное сообщение о статусе.",
			'status:notdeleted' => "Извините, мы не можем удалить указанное сообщение о статусе.",
			'status:notsaved' => "Произошла ошибка при сохранении, попробуйте ещё раз или свяжитесь с администрацией.",
			'status:problem' => "Произошла ошибка, похоже что вы не можете отредактировать этот статус.",
	
	);
					
	add_translation("ru",$russian);

?>