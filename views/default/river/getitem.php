<?php
	$item = elgg_get_river(array('ids'=>$vars['id']));
	$item = $item[0];
	echo elgg_view_river_item($item);
?>
	