<?php

	/**
	 * Elgg custom profile 
	 * You can edit the layout of this page with your own layout and style. Whatever you put in the file
	 * will replace the frontpage of your Elgg site.
	 * 
	 * @package Elgg
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */
	 
?>

<div id="custom_index">

    <!-- left column content -->
    <div id="index_left">
        <!-- welcome message -->
        <div id="index_welcome">
            <!-- EDIT THE FOLLOWING TWO LINES TO ADD YOUR CONTENT -->
            <h1>Heading one</h1>
            <p>Some html could go in here.</p>
	        <?php
	            //this displays some content when the user is logged out
			    if (!isloggedin()){
	        ?>
	        <!-- EDIT THE FOLLOWING LINE TO ADD YOUR CONTENT -->
		    <p>You could put some more content in here perhaps explaining to your users what the site is all about. <a href="<?php echo $vars['url']; ?>account/register.php"><strong>join</strong></a>.</p>
	        <?php
	            //display the login form
			    echo $vars['area4'];
			    echo "<div class=\"clearfloat\"></div>";
			    }else{
    			    //the following is content when the user has logged in - you should edit the content for your site
            ?>
            <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
            <!-- EDIT THE FOLLOWING TWO LINES TO ADD YOUR CONTENT -->
            <p>This could be a welcome message or some details about the site that you want those logged in to see.</p>
            <p>Feel free to join some groups, fill out your profile and connect to other <a href="<?php echo $vars['url']; ?>search/users.php">site members</a>.</p>
	        <?php 
		        }
	        ?>
        </div>
        <!-- display latest files -->
        <div id="index_box">
            <h2><?php echo elgg_echo("custom:files"); ?></h2>
            <?php 
                if (!empty($vars['area2'])) {
                    echo $vars['area2'];//this will display files
                }else{
                    echo "<p><?php echo elgg_echo('custom:nofiles'); ?></p>";
                }
            ?>
        </div>
        <!-- display latest groups -->
	    <div id="index_box">
            <h2><?php echo elgg_echo("custom:groups"); ?></h2>
        <?php 
                if (!empty($vars['area5'])) {
                    echo $vars['area5'];//this will display groups
                }else{
                    echo "<p><?php echo elgg_echo('custom:nogroups'); ?>.</p>";
                }
            ?>
    	</div>
    </div>
    
    <!-- right hand column -->
    <div id="index_right">
        <!-- more content -->
	    <div id="index_welcome">
	        <!-- EDIT THE FOLLOWING TWO LINES TO ADD YOUR CONTENT -->
            <h1>Heading two (change this)</h1>
            <p>Some content could go in here.</p>
        </div>
        <!-- latest members -->
        <div id="index_box">
            <h2><?php echo elgg_echo("custom:members"); ?></h2>
            <div class="contentWrapper">
            <?php 
                if(isset($vars['area3'])) {
                    //display member avatars
                    foreach($vars['area3'] as $members){
                        echo "<div class=\"index_members\">";
                        echo elgg_view("profile/icon",array('entity' => $members, 'size' => 'small'));
                        echo "</div>";
                    }
                }
            ?>
	        <div class="clearfloat"></div>
	        </div>
        </div>
        <!-- latest blogs -->
        <div id="index_box">
            <h2><?php echo elgg_echo("custom:blogs"); ?></h2>
            <?php 
                if (isset($vars['area1'])) 
                    echo $vars['area1']; //display blog posts
            ?>
        </div>
        <!-- display latest bookmarks -->
    	<div id="index_box">
            <h2><?php echo elgg_echo("custom:bookmarks"); ?></h2>
            <?php 
                if (isset($vars['area6'])) 
                    echo $vars['area6']; //display bookmarks
            ?>
        </div>
    </div>
    <div class="clearfloat"></div>
</div>