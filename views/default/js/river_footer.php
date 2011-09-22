<script>
$(document).ready(function() {
	$("#item-river-<?php echo $vars['id'] ?> a[href='#action']").click(function() {
		var guid	= $(this).attr('data-guid');
		var action	= $(this).attr('data-action');
		var dest	= $(this).attr('data-dest');
		var view	= $(this).attr('data-view');
		var id		= dest.match(/(.*)-(\d+)/)[2];
		elgg.action(action,{
			'data':{
				'guid':guid
			},
			'success':function() {
				elgg.view(view,{
					data:{
						'id': id
					},
					'target': $(dest)
				});
			}
		});
		return false;
	});
});
</script>