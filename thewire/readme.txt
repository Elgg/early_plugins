/**
	 * Elgg the wire
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
*/

This is Curverider's commercial wire.

Notes;

In order to pull out wire messages based on latest reply, we had to use annotations. This works fine
in most case unless there are no replies (annotations). Therefore, when you create a parent
message, it creates a blank annotation which is never displayed but lets us use the function
get_entities_from_annotations to pull out the latest and cluster all messages.