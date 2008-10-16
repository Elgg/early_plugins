<?php

$russian = array(

                 /**
                  * Menu items and titles
                  */

                 'messageboard:board' => 'Доска сообщений',//"Message board",
                 'messageboard:messageboard' => 'доска сообщений', // "message board",
                 'messageboard:viewall' => 'Просмотреть все', // "View all",
                 'messageboard:postit' => 'Написать',//"Post it",
                 'messageboard:history' => 'история', // "history",
                 'messageboard:none' => 'На этой доске сообщений пока пусто',
                 //"There is nothing on this message board yet",
                 'messageboard:num_display' => 'Число сообщений для отображения',
                 //"Number of messages to display",
                 'messageboard:desc' => 'Это доска сообщений, которую Вы можете разместить в своем профиле, и другие пользователи могут комментировать.',
                 //"This is a message board that you can put on your profile where other users can comment.",
			
                 /**
                  * Message board widget river
                  **/
	        
                 'messageboard:river:annotate' => '%s оставил новый комментарий на сообщение на своей доске',
                 //TODO: "%s has had a new comment posted on their message board.",
                 'messageboard:river:create' => '%s добавил себе доску сообщений.',
                 //"%s added the message board widget.",
                 'messageboard:river:update' => '$s обновил свою доску сообщений.',
                 //"%s updated their message board widget.",
			
                 /**
                  * Status messages
                  */
	
                 'messageboard:posted' => 'Вы успешно написали на доске сообщений.',
                 //"You successfully posted on the message board.",
                 'messageboard:deleted' => 'Вы успешно удалили сообщение.',
                 //"You successfully deleted the message.",
	
                 /**
                  * Email messages
                  */
	
                 'messageboard:email:subject' => 'У Вас новый комментарий на доске сообщений!',
                 //'You have a new message board comment!',
                 'messageboard:email:body' => "У Вас новый комментарий на доске сообщений от $s. It reads:',

			
%s


Для просмотра комменатрия на доске сообщений, нажмите здесь:

	%s

Для просмотра профиля %s, нажмите здесь:

	%s

Вы не можете ответить на это сообщенией.",
	
                 /*'messageboard:email:body' => "You have a new message board comment from %s. It reads:
                  %s
                  To view your message board comments, click here:
                  %s
                  To view %s's profile, click here:
                  %s
                  You cannot reply to this email.",/**/
	
                 /**
                  * Error messages
                  */
	
                 'messageboard:blank' => "Простите, но Вам надо хоть что-нибудь написать в теле сообщения чтобы мы смогли отправить его.",
                 //"Sorry; you need to actually put something in the message area before we can save it.",
                 'messageboard:notfound' => "Простите, но мы не можем найти указанное сообщение.",
                 //"Sorry; we could not find the specified item.",
                 'messageboard:notdeleted' => "Простите, но мы не можем удалить это сообщение.",
                 //"Sorry; we could not delete this message.",
	     
                 'messageboard:failure' => "Возникла непредвиденная ошибка при добавлении Вашего сообщения. Пожалуйста, попробуйте еще раз.",
                 //"An unexpected error occurred when adding your message. Please try again.",

                 );

add_translation("ru",$russian);

?>