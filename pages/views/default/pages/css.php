<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
?>

UL.jqueryFileTree {
	font-family: Verdana, sans-serif;
	font-size: 11px;
	line-height: 18px;
	padding: 0px;
	margin: 0px;
}

UL.jqueryFileTree LI {
	list-style: none;
	padding: 0px;
	padding-left: 20px;
	margin: 0px;
	white-space: nowrap;
}

UL.jqueryFileTree A {
	color: #333;
	text-decoration: none;
	display: block;
	padding: 0px 2px;
}

UL.jqueryFileTree A:hover {
	background: #BDF;
}

/* Core Styles */
.jqueryFileTree LI.directory { background: url(<?php echo $vars['url']; ?>mod/pages/images/directory.png) left top no-repeat; }
.jqueryFileTree LI.expanded { background: url(<?php echo $vars['url']; ?>mod/pages/images/folder_open.png) left top no-repeat; }
.jqueryFileTree LI.file { background: url(<?php echo $vars['url']; ?>mod/pages/images/file.png) left top no-repeat; }
.jqueryFileTree LI.wait { background: url(<?php echo $vars['url']; ?>mod/pages/images/spinner.gif) left top no-repeat; }
/* File Extensions*/
.jqueryFileTree LI.ext_3gp { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_afp { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_afpa { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_asp { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_aspx { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_avi { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_bat { background: url(<?php echo $vars['url']; ?>mod/pages/images/application.png) left top no-repeat; }
.jqueryFileTree LI.ext_bmp { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_c { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_cfm { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_cgi { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_com { background: url(<?php echo $vars['url']; ?>mod/pages/images/application.png) left top no-repeat; }
.jqueryFileTree LI.ext_cpp { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_css { background: url(<?php echo $vars['url']; ?>mod/pages/images/css.png) left top no-repeat; }
.jqueryFileTree LI.ext_doc { background: url(<?php echo $vars['url']; ?>mod/pages/images/doc.png) left top no-repeat; }
.jqueryFileTree LI.ext_exe { background: url(<?php echo $vars['url']; ?>mod/pages/images/application.png) left top no-repeat; }
.jqueryFileTree LI.ext_gif { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_fla { background: url(<?php echo $vars['url']; ?>mod/pages/images/flash.png) left top no-repeat; }
.jqueryFileTree LI.ext_h { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_htm { background: url(<?php echo $vars['url']; ?>mod/pages/images/html.png) left top no-repeat; }
.jqueryFileTree LI.ext_html { background: url(<?php echo $vars['url']; ?>mod/pages/images/html.png) left top no-repeat; }
.jqueryFileTree LI.ext_jar { background: url(<?php echo $vars['url']; ?>mod/pages/images/java.png) left top no-repeat; }
.jqueryFileTree LI.ext_jpg { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_jpeg { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_js { background: url(<?php echo $vars['url']; ?>mod/pages/images/script.png) left top no-repeat; }
.jqueryFileTree LI.ext_lasso { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_log { background: url(<?php echo $vars['url']; ?>mod/pages/images/txt.png) left top no-repeat; }
.jqueryFileTree LI.ext_m4p { background: url(<?php echo $vars['url']; ?>mod/pages/images/music.png) left top no-repeat; }
.jqueryFileTree LI.ext_mov { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_mp3 { background: url(<?php echo $vars['url']; ?>mod/pages/images/music.png) left top no-repeat; }
.jqueryFileTree LI.ext_mp4 { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_mpg { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_mpeg { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_ogg { background: url(<?php echo $vars['url']; ?>mod/pages/images/music.png) left top no-repeat; }
.jqueryFileTree LI.ext_pcx { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_pdf { background: url(<?php echo $vars['url']; ?>mod/pages/images/pdf.png) left top no-repeat; }
.jqueryFileTree LI.ext_php { background: url(<?php echo $vars['url']; ?>mod/pages/images/php.png) left top no-repeat; }
.jqueryFileTree LI.ext_png { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_ppt { background: url(<?php echo $vars['url']; ?>mod/pages/images/ppt.png) left top no-repeat; }
.jqueryFileTree LI.ext_psd { background: url(<?php echo $vars['url']; ?>mod/pages/images/psd.png) left top no-repeat; }
.jqueryFileTree LI.ext_pl { background: url(<?php echo $vars['url']; ?>mod/pages/images/script.png) left top no-repeat; }
.jqueryFileTree LI.ext_py { background: url(<?php echo $vars['url']; ?>mod/pages/images/script.png) left top no-repeat; }
.jqueryFileTree LI.ext_rb { background: url(<?php echo $vars['url']; ?>mod/pages/images/ruby.png) left top no-repeat; }
.jqueryFileTree LI.ext_rbx { background: url(<?php echo $vars['url']; ?>mod/pages/images/ruby.png) left top no-repeat; }
.jqueryFileTree LI.ext_rhtml { background: url(<?php echo $vars['url']; ?>mod/pages/images/ruby.png) left top no-repeat; }
.jqueryFileTree LI.ext_rpm { background: url(<?php echo $vars['url']; ?>mod/pages/images/linux.png) left top no-repeat; }
.jqueryFileTree LI.ext_ruby { background: url(<?php echo $vars['url']; ?>mod/pages/images/ruby.png) left top no-repeat; }
.jqueryFileTree LI.ext_sql { background: url(<?php echo $vars['url']; ?>mod/pages/images/db.png) left top no-repeat; }
.jqueryFileTree LI.ext_swf { background: url(<?php echo $vars['url']; ?>mod/pages/images/flash.png) left top no-repeat; }
.jqueryFileTree LI.ext_tif { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_tiff { background: url(<?php echo $vars['url']; ?>mod/pages/images/picture.png) left top no-repeat; }
.jqueryFileTree LI.ext_txt { background: url(<?php echo $vars['url']; ?>mod/pages/images/txt.png) left top no-repeat; }
.jqueryFileTree LI.ext_vb { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_wav { background: url(<?php echo $vars['url']; ?>mod/pages/images/music.png) left top no-repeat; }
.jqueryFileTree LI.ext_wmv { background: url(<?php echo $vars['url']; ?>mod/pages/images/film.png) left top no-repeat; }
.jqueryFileTree LI.ext_xls { background: url(<?php echo $vars['url']; ?>mod/pages/images/xls.png) left top no-repeat; }
.jqueryFileTree LI.ext_xml { background: url(<?php echo $vars['url']; ?>mod/pages/images/code.png) left top no-repeat; }
.jqueryFileTree LI.ext_zip { background: url(<?php echo $vars['url']; ?>mod/pages/images/zip.png) left top no-repeat; }

.pagesTreeContainer {
		width: 143px;
		border:1px solid #cccccc;
		background: #FFF;
		overflow: scroll;
		margin: 15px;
		height: 200px;
	}