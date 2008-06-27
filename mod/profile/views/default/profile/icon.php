<?php

	/**
	 * Elgg profile icon
	 * 
	 * @package ElggProfile
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ben Werdmuller <ben@curverider.co.uk>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['entity'] The user entity. If none specified, the current user is assumed.
	 * @uses $vars['size'] The size - small, medium or large. If none specified, medium is assumed. 
	 */

	// Get entity
		if (empty($vars['entity']))
			$vars['entity'] = $vars['user'];

		$name = htmlentities($vars['entity']->name);
		$username = $vars['entity']->username;
		
		if ($icontime = $vars['entity']->icontime) {
			$icontime = "{$icontime}";
		} else {
			$icontime = "default";
		}
			
	// Get size
		if (!in_array($vars['size'],array('small','medium','large','tiny','master')))
			$vars['size'] = "medium";
			
	// Get any align and js
		if (!empty($vars['align'])) {
			$align = " align=\"{$vars['align']}\" ";
		} else {
			$align = "";
		}
		
	// Get the hoverover menu
		$hoverover = elgg_view('profile/hoverover',$vars);
		$hoverover = htmlentities($hoverover);
		$hoverover = str_replace("\n","",$hoverover);
		$hoverover = str_replace("\r","",$hoverover);
		$hoverover = str_replace("\t","",$hoverover);
			
?>

<div class="usericon">
<div class="avatar_menu_button"><img src="graphics/avatar_menu_arrow.gif" width="15" height="15" class="arrow" /></div>

	<div class="sub_menu">
		<a href="#"><h3>User Name</h3></a>
		<a href="#" class="item_line">Remove friend</a>
		<a href="#">Friends</a>
		<a href="#">Friends of</a>

		<a href="#" class="item_line">Recent activity</a>
		<a href="#">Visit blog</a>
		<a href="#" class="item_line">Send private message</a>
		<a href="#" class="item_line">Ban</a>
		<a href="#">Edit</a>
		<a href="#">Report</a>

	</div>	
	<a href="<?php echo $vars['entity']->getURL(); ?>" class="icon" rel="<?php echo $hoverover; ?>"><img src="<?php echo $vars['url']; ?>pg/icon/<?php echo $username; ?>/<?php echo $vars['size']; ?>/<?php echo $icontime; ?>.jpg" border="0" <?php echo $align; ?> title="<?php echo $name; ?>" <?php echo $vars['js']; ?> /></a>
</div>