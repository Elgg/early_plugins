<?php

	/**
	 * Elgg blog edit/add page
	 * 
	 * @package ElggBlog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['object'] Optionally, the blog post to edit
	 */

	// Set title, form destination
		if (isset($vars['entity'])) {
			$title = sprintf(elgg_echo("blog:editpost"),$object->title);
			$action = "blog/edit";
			$title = $vars['entity']->title;
			$body = $vars['entity']->description;
			$tags = $vars['entity']->tags;
			$comments_on = $vars['entity']->comments_on;
			$access_id = $vars['entity']->access_id;
		} else  {
			$title = elgg_echo("blog:addpost");
			$action = "blog/add";
			$tags = "";
			$title = "";
			$comments_on = "";
			$description = "";
			$access_id = 0;
		}

	// Just in case we have some cached details
		if (isset($vars['blogtitle'])) {
			$title = $vars['blogtitle'];
			$body = $vars['blogbody'];
			$tags = $vars['blogtags'];
		}

	// set the required variables

                $title_label = elgg_echo('title');
                $title_textbox = elgg_view('input/text', array('internalname' => 'blogtitle', 'value' => $title));
                $text_label = elgg_echo('blog:text');
                $text_textarea = elgg_view('input/longtext', array('internalname' => 'blogbody', 'value' => $body));
                $tag_label = elgg_echo('tags');
                $tag_input = elgg_view('input/tags', array('internalname' => 'blogtags', 'value' => $tags));
                $access_label = elgg_echo('access');

		  //$comments_select = elgg_view('input/checkboxes', array('internalname' => 'comments_on', 'value' => ''));
		  if($comments_on)
		  	$comments_on_switch = "checked";
		  else
			$comment_on_switch = "";

                $access_input = elgg_view('input/access', array('internalname' => 'access_id', 'value' => $access_id));
                $submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('publish')));
		  $conversation = elgg_echo('Conversation');
		  $publish = elgg_echo('Publish');
		  $cat = elgg_echo('Categories');

?>

<?php

	$form_body = <<<EOT

	<div id="two_column_left_sidebar_210">

    		<div id="blog_edit_sidebar">
			<div id="content_area_user_title">
				<div class="preview_button"><a href="">Preview</a></div>
			<h2>$publish</h2></div>
			<div class="publish_controls">
				<p><a href="">Save draft</a>
				
				</p>
			</div>
			<div class="publish_options">
				<p><b>Publish:</b> now <a href="">edit</a></p>
				<p class="auto_save">Draft Saved 5 mins ago</p>
			</div>
			<div class="blog_access">
				<p>Privacy: $access_input
			</p></div>
			<div class="publish_blog">
				$submit_input
			</div>
		</div>

		<div id="blog_edit_sidebar">
			<div id="content_area_user_title"><h2>$conversation</h2></div>
			<div class="allow_comments">
				<p><input type="checkbox" name="comments_select"  $comments_on_switch /> allow comments</p>
			</div>
		</div>

		<div id="blog_edit_sidebar">
			<div id="content_area_user_title"><h2>$cat</h2></div>
			<div class="categories">
				<ul>
				<li><input type="checkbox" name="comments" checked /> elgg development</li>
				<li><input type="checkbox" name="comments" checked /> news</li>
				<li><input type="checkbox" name="comments" checked /> education</li>
				<li><input type="checkbox" name="comments" checked /> commercial</li>
				</ul>
			</div>
		</div>

	</div><!-- /two_column_left_sidebar_210 -->

	<!-- main content -->
	<div id="two_column_left_sidebar_maincontent">
EOT;

?>

<?php
               
                if (isset($vars['entity'])) {
                  $entity_hidden = elgg_view('input/hidden', array('internalname' => 'blogpost', 'value' => $vars['entity']->getGUID()));
                } else {
                  $entity_hidden = '';
                }

                $form_body .= <<<EOT
		<p>
			<label>$title_label</label><br />
                        $title_textbox
		</p>
		<p>
			<label>$text_label</label><br />
                        $text_textarea
		</p>
		<p>
			<label>$tag_label</label><br />
                        $tag_input
		</p>
		<!-- <p>
			<label>$access_label</label><br />
                        $access_input
		</p> -->
		<p>
			$entity_hidden
			<!-- $submit_input -->
		</p>
	</div><div class="clearfloat"></div><!-- /two_column_left_sidebar_maincontent -->
EOT;

      echo elgg_view('input/form', array('action' => "{$vars['url']}action/$action", 'body' => $form_body));
?>
