<?php
/**
* @version $Id: mod_hellofrom.php 5203 2009-04-15 02:45:14Z Danr $
* @copyright Copyright (C) 2009 Dan Rahmel. All rights reserved.
* A module to display a hello from the location of the server.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Get the location parameter that was set in the Module Manager
$myLocation = $params->get('location', 0);
// Set a formatted date string
$myDateTime =  date("l, F dS, Y");

// Output the greeting
echo "<small>" . JText::_('Hello from ') . '<b>' . $myLocation . "</b>.";
echo JText::_(" Right now, it is ") . $myDateTime . JText::_(" here.") . "</small><br />";

?>

