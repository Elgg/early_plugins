<?php

    $russian = array(
    
        /**
         * Menu items and titles
         */
    
            'blog' => "Блог",
            'blogs' => "Блоги",
            'blog:user' => 'Блог %s', //"%s's blog",
            'blog:user:friends' => "Блоги друзей %s", //"%s's friends' blog",
            'blog:your' => "Ваш блог",
            'blog:posttitle' => "Блог %s: %s", //"%s's blog: %s",
            'blog:friends' => "Блоги друзей", // Friend's blogs
            'blog:yourfriends' => "Последние блоги Ваших друзей", //"Your friends' latest blogs",
            'blog:everyone' => "Все блоги", // All site blogs
    
            'blog:read' => "Читать", //"Read blog",
    
            'blog:addpost' => "Написать сообщение", //"Write a blog post",
            'blog:editpost' => "Редактировать сообщение", //"Edit blog post",
    
            'blog:text' => "Текст сообщения", //"Blog text",
    
            'blog:strapline' => "%s",
            
            'item:object:blog' => "Сообщения", //'Blog posts',
    
            
         /**
         * Blog river
         **/
            
            //generic terms to use
            'blog:river:created' => "%s писал", //"%s wrote",
            'blog:river:updated' => "%s обновил",
            'blog:river:posted' => "%s добавил",
            
            //these get inserted into the river links to take the user to the entity
            'blog:river:create' => "новую запись в блоге.",
            'blog:river:update' => "запись в блоге.",
            'blog:river:annotate:create' => "Прокомментировать", //"a comment on a blog post.",
            
    
        /**
         * Status messages
         */
    
            'blog:posted' => "Ваше сообщение успешно добавлено.", //"Your blog post was successfully posted.",
            'blog:deleted' => "Ваше сообщение успешно удалено.", //"Your blog post was successfully deleted.",
    
        /**
         * Error messages
         */
    
            'blog:save:failure' => "Ваше сообщение не может быть сохранено. Пожалуйста попробуйте еще раз.", //"Your blog post could not be saved. Please try again.",
            'blog:blank' => "Вы должны заполнить заголовок и текст сообщения.", //"Sorry; you need to fill in both the title and body before you can make a post.",
            'blog:notfound' => "Извините. невозможно найти указнное сообщение.", //"Sorry; we could not find the specified blog post.",
            'blog:notdeleted' => "Извините, невозможно удалить это сообщение.", //"Sorry; we could not delete this blog post.",
    
    );
                    
    add_translation("ru",$russian);

?>
