<?php

    /**
     * Embed media from users file repo in longtext area for use in blogs, pages etc
     *
	 * @package ElggFile
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
	 set_context('file');
	 $get_user_files = get_tags(0,10,'simpletype','object','file',$_SESSION['guid']);
	
?>
<style type="text/css">
    #actual_embed_media {
        height:100px;
        border:2px solid #efefef;
        background:#fff;
        display:none;
    }
    #actual_embed_media p {
        color:#000;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        
        $('#actual_embed_media').hide();
        
        $('a#image').click(function() {
            $('#actual_embed_media').show('slow');
                return false;
            });
            
       $('a.document').click(function() {
            $('#actual_embed_media').show('slow');
                return false;
            });
            
       $('a#close_embed').click(function() {
            $('#actual_embed_media').hide('slow');
                return false;
            });
            
		$('a.embed_tag_link').click(function() {
				$('#actual_embed_media_main').load('<?php echo $vars['url']; ?>mod/file/embed.php?username=<?php echo urlencode($vars['user']->username); ?>&simpletype=' + this.rel);
				$('#actual_embed_media').show('slow');
				return false;
			});

    });
</script>

<div class="file_embed_media" style="background:#efefef;padding:4px 2px 2px 2px;margin:10px 3px 0 0;">   
<p style="color:#000;"><b><?php echo elgg_echo("file:embed"); ?>:</b> <a rel="all" class="embed_tag_link" href=""><?php echo elgg_echo("file:embedall"); ?></a> 
<?php
    //display a link to the users file types
    foreach($get_user_files as $file){
        echo "<a class=\"embed_tag_link\" rel=\"{$file->tag}\" href=\"\">" . elgg_echo("file:type:" . $file->tag) . "</a> ";
    }
?>
</p>
<div id="actual_embed_media">
    <div id="actual_embed_media_main"></div>
    <a id="close_embed" href=""><?php echo elgg_echo('close'); ?></a>
</div>
</div>