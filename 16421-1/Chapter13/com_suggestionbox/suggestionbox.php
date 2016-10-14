<?php
/**
* @version $Id: suggestion.php 5203 2009-04-15 02:45:14Z DanR $
* @copyright Copyright (C) 2009 Dan Rahmel. All rights reserved.
* This component accepts suggestions and stores them in a database.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if(JRequest::getVar( 'suggestion' )) {
	
	$db =& JFactory::getDBO();
	
	// Automatically try to create the table. If it already exists, this creation
	// Will be ignored.
	$createTable = "CREATE TABLE IF NOT EXISTS `#__suggestions`" .
		"(`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT, ".
		"`suggestion` text NOT NULL, `email` VARCHAR(45)," .
		"`location` VARCHAR(45), `created` TIMESTAMP NOT NULL, " .
		"`userip` VARCHAR(16), PRIMARY KEY(`id`))";
	$db->setQuery( $createTable, 0);
	// Execute table creation
	$db->query();
	
	// Grab and format all of the variable entries from the form.
	$fldSuggest = "'" . $db->getEscaped(JRequest::getVar('suggestion')) . "'";
	$fldEmail = "'" . $db->getEscaped(JRequest::getVar( 'email')) . "'";
	$fldLocation = "'" . $db->getEscaped(JRequest::getVar( 'location' )) . "'";
	// Store the IP of the user submitting the suggestion
	$userIp = "'" . $_SERVER['REMOTE_ADDR'] . "'";
	
	// Insert all variables into the jos_suggestions table
	$insertFields = "INSERT INTO #__suggestions " .
		"(suggestion, email, location, userip) " .  
		"VALUES (" . $fldSuggest . "," . $fldEmail . "," . $fldLocation .
		"," . $userIp . ");";
	$db->setQuery( $insertFields, 0);
	$db->query();
?>

<h1 class="contentheading">Thanks for the suggestion!</h1>
	<?php } else {
?>

<h1 class="contentheading">Suggestion form</h1>

<form id="form1" name="form1" method="post" action="index.php?option=com_suggestionbox">
  <p>Enter suggestion here:<br /> 
    <textarea name="suggestion" cols="40" rows="4" id="suggestion"></textarea>
  </p>
  <p>Email (optional) :
    <input name="email" type="text" id="email" />
</p>
  <p>
    <label>Location (optional) : </label>
    <input name="location" type="text" id="location" />
  </p>
  <p>
    <input type="submit" name="Submit" value="Send Suggestion" />
  </p>
</form>

<?php	} ?>
