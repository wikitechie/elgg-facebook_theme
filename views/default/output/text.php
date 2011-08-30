<?php
/**
* Elgg text output
* Displays some text that was input using a standard text field
*
* @package Elgg
* @subpackage Core
*
* @uses $vars['text'] The text to display
*
*/
elgg_load_library("ArPHP:ArIdentifier");
$str = htmlspecialchars($vars['value'], ENT_QUOTES, 'UTF-8', false);
$obj = new ArIdentifier();
$pos   = $obj->identify($str);

if ( (!empty($pos)) && ($pos[0] == 0)){
	$style .= 'direction:rtl;';
}

echo "<span style='{$style}'>$str</span>";