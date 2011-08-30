<?php
/**
 * Elgg display long text
 * Displays a large amount of text, with new lines converted to line breaks
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['value'] The text to display
 * @uses $vars['parse_urls'] Whether to turn urls into links. Default is true.
 * @uses $vars['class']
 */
elgg_load_library("ArPHP:ArIdentifier");
$class = 'elgg-output';
$additional_class = elgg_extract('class', $vars, '');
if ($additional_class) {
	$vars['class'] = "$class $additional_class";
} else {
	$vars['class'] = $class;
}

$parse_urls = elgg_extract('parse_urls', $vars, true);
unset($vars['parse_urls']);

$text = $vars['value'];
unset($vars['value']);

$text = filter_tags($text);

if ($parse_urls) {
	$text = parse_urls($text);
}

// solving rtl problems
$dir = ArIdentifier::getTextDirection($text);
$style = ";direction:$dir;";
$vars['style'] .= $style;

$attributes = elgg_format_attributes($vars);
$text = autop($text);
echo "<div $attributes>$text</div>";