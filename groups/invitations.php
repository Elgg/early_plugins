<?php
/**
 * Manage group invitation requests.
 *
 * @package ElggGroups
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
gatekeeper();

$user = get_loggedin_user();

$title = elgg_echo('groups:invitations');

$area2 = elgg_view_title($title);

if ($user) {
	$invitations = get_entities_from_relationship('invited', $user->getGUID(), true, '', '', 0, '', 9999);
	$area2 .= elgg_view('groups/invitationrequests',array('invitations' => $invitations, 'entity' => $group));
} else {
	$area2 .= elgg_echo("groups:noaccess");
}

$body = elgg_view_layout('two_column_left_sidebar', '', $area2);

page_draw($title, $body);