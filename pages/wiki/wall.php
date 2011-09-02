<?php

$wiki = elgg_get_page_owner_entity();

$title = $wiki->title;

$composer = '';
if (elgg_is_logged_in()) {
	$composer = elgg_view('page/elements/composer', array('entity' => $wiki));
}

$db_prefix = elgg_get_config('dbprefix');
$activity = elgg_list_river(array(
	'joins' => array("JOIN {$db_prefix}entities e ON e.guid = rv.object_guid"),
	'wheres' => array("e.container_guid = $wiki->guid OR rv.object_guid = $wiki->guid"),
));

/*$activity = elgg_list_river(array(
		'relationship'         => NULL,
		'relationship_guid'    => NULL,
		'inverse_relationship' => FALSE,
		'subtypes'             => 'wikiactivity',		
	));*/

if (!$activity) {
	$activity = elgg_view('output/longtext', array('value' => elgg_echo('wiki:activity:none')));
}

elgg_register_menu_item('title', array(
	'name' => 'socialbrowser',
	'href' => "#socialBrowser",				
	'text' => 'Social Broswer',
	'link_class' => 'elgg-button elgg-button-action',

));

$body = elgg_view_layout('two_sidebar', array(
	'content' => $composer . $activity,
	'title' => $title,
));

echo elgg_view_page($title, $body);
echo "<div class='jq-dialog' title='Social Browser - {$wiki->title}' src='{$wiki->url}'></div>";