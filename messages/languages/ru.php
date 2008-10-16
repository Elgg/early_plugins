<?php

$russian = array(

                 /**
                  * Menu items and titles
                  */
	
                 'messages' => "Сообщения", // "Messages",
                 'messages:back' => "назад к сообщениям",
                 'messages:user' => "Ваш почтовый ящик",
                 'messages:sentMessages' => "Отправленные сообщения", // "Sent messages"
                 'messages:posttitle' => "Сообщения пользователя %s': %s",
                 'messages:inbox' => 'Входящие сообщения', // "Inbox",
                 'messages:send' => "Написать сообщение", // "Send a messages"
                 'messages:sent' => "Отправленные сообщения", // "Sent messages",
                 'messages:message' => "Сообщение" , // "Message",
                 'messages:title' => "Заголовок", // "Title",
                 'messages:to' => 'Кому', // "To",
                 'messages:from' => "От",
                 'messages:fly' => 'Отправить', // "Let it fly",
                 'messages:replying' => 'Сообщение в ответ на', // "Message replying to",
                 'messages:inbox' => 'Входящие сообщения', // "Inbox", // почтовый ящик
                 'messages:sendmessage' => "Написать сообщение", // "Send a message",
                 'messages:compose' => "Написать сообщение", // "Send a message",
                 'messages:sentmessages' => "Отправленные сообщения", // "Sent messages",
                 'messages:recent' => 'Недавние сообщения', // "Recent messages",
                 'messages:original' => "Исходное сообщение",
                 'messages:yours' => "Ваше сообщение",
                 'messages:answer' => "Ответ",
                 
			
                 'item:object:messages' => "Сообщения", // 'Messages',
	
                 /**
                  * Status messages
                  */
	
                 'messages:posted' => 'Ваше сообщение успешно отправлено.', // "Your message was successfully sent.",
                 'messages:deleted' => 'Ваше сообщение успешно удалено.', // "Your message was successfully deleted.",
	
                 /**
                  * Email messages
                  */
	
                 'messages:email:subject' => 'У вас новое сообщение!', // 'You have a new message!',
                 'messages:email:body' => "У вас новое сообщение от %s. It reads:

			
%s


Чтобы просмотреть сообщение, нажмите здесь:

	%s

Для отправки сообщния %s, нажмите здесь:

	%s

Вы не можете ответить на это сообщение.",

                 /* 'messages:email:body' => "You have a new message from %s. It reads:
                  %s
                  To view your messages, click here:
                  %s
                  To send %s a message, click here:
                  %s
                  You cannot reply to this email.",/**/

                 /**
                  * Error messages
                  */

                 'messages:blank' => "Простите, но Вам надо хоть что-нибудь написать в теле сообщения чтобы мы смогли отправить его.",
                 // "Sorry; you need to actually put something in the message body before we can save it.",
                 'messages:notfound' => "Простите, но мы не можем найти указанное сообщение.",
                 // "Sorry; we could not find the specified message.",
                 'messages:notdeleted' => "Простите, но мы не можем удалить это сообщение.",
                 //"Sorry; we could not delete this message.",
                 'messages:nopermission' => "У Вас недостаточно привилегий чтобы удалить это сообщение.",
                 // "You do not have permission to delete that message.",
                 'messages:nomessages' => "Здесь сообщений нет.",
                 // "There are no messages to display.",
                 'messages:user:nonexist' => "Мы не можем найти адресата в базе пользователей.",
                 // "We could not find the recipient in the user database.",

                 );

add_translation("ru",$russian);

?>