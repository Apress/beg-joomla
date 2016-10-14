<?php
/**
* @version $Id: mod_missingmeta.php 2009-04-15 21:49:30Z Danr $
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$db =& JFactory::getDBO();

// Find all empty strings in metakey and metadesc and
// make sure the article is published (state=1).
$where = "(metakey = '' or metadesc = '') and state = 1 ";
$query = "SELECT id, title, metakey, metadesc"
	. " FROM #__content WHERE "
	. $where . " ORDER BY title ASC";

$db->setQuery( $query, 0);
?>
<table class="adminlist">
	<tr>
		<td class="title">
		<strong><?php echo JText::_( 'Article' ); ?></strong>
		</td>
		<td class="title">
		<strong><?php echo JText::_( 'Empty Description' ); ?></strong>
		</td>
		<td class="title">
		<strong><?php echo JText::_( 'Empty Keys' ); ?></strong>
		</td>
	</tr>
<?php

// Make sure some rows match query
if ($rows = $db->loadObjectList()) {
	foreach ($rows as $row) {	
		// Create url to allow user to click & jump to edit article
		$url = "index.php?option=com_content&task=edit&" .
			"&id=" . $row->id;
		
		// Check meta fields for record and set Yes/No value
		if ($row->metadesc =="") $metad = JText::_("Yes");
		else $metad = JText::_("No");
		
		if ($row->metakey =="") $metak = JText::_("Yes");
		else $metak = JText::_("No");
		
		echo "<tr>";
		
		// Place article title inside link
		echo "<td><a href='" . $url . "'>" .
		$row->title . "</a></td>";
		
		// Display status of empty meta column
		echo "<td>" . $metad . "</td>";
		echo "<td>" . $metak . "</td>";
		echo "</tr>";
	}
} else {
	// No articles with missing metadata found
	echo '<tr><td>None</td>';
	echo '<td>n/a</td>';
	echo '<td>n/a</td></tr>';
}
?>
</table>