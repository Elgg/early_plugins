<?php

    /**
	 * Elgg friends list
	 * 
	 * @package ElggFriends
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */
	 
	//use the user session within this if statement, this is to make sure no one can create collections
	//with users who are not their friends
	if ($friends = get_entities_from_relationship('friend',$_SESSION['user']->getGUID(),false,'user','', 0, "", 9999)) {
	
?>
	
<table border="0" cellspacing="0" cellpadding="0">

<?php
		
		$col = 0;
		foreach($friends as $friend) {
			
			if ($col == 0) echo "<tr>";
			
			$label = elgg_view("profile/icon",array('entity' => $friend, 'size' => 'tiny')); 
			$options[$label] = $friend->getGUID();
			
?>

			<td>
			
				<input type="checkbox" name="friends_collection[]" value="<?php echo $options[$label]; ?>" />
			
			</td>

			<td >
			
				<div style="width: 25px; margin-bottom: 15px;">
			<?php

				echo $label;
			
			?>
				</div>
			</td>
			<td style="width: 300px; padding: 5px;">
				<?php

					echo $friend->name;
				
				?>
			</td>
<?php
			
			
			$col++;
			
			if ($col == 3) {
				
				$col = 0;
				echo "</tr>";
				
			}
			
			
		}
		if ($col != 3) {
			echo "</tr>";
		}
		
		
?>

</table>

<?php
		
	}

?>