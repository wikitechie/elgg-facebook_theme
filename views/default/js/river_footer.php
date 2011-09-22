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
	$("form.elgg-form-comments-add").ajaxForm({
		beforeSubmit: function(arr,formObj,options) {
			$(formObj).before($("<div class='elgg-ajax-loader' ></div>"));
		},
		success: function(responseText, statusText, xhr, formObj) {
			var guid = $(formObj).find("input[name='entity_guid']").val();
			elgg.view('annotation/getannotations',{
				data:{
					'guid':guid,
					'limit': 1,
					'annotation_name': 'generic_comment'
				},
				'formObj':formObj,
				success:function(data) {
					$(this.formObj).prev().remove();
					if ($(formObj).prev().length == 0) {
						$(formObj).before($(data));
					}
					else {
						data = $(data).children().first();
						$(formObj).prev().append(data);
					}
					$(formObj).find("input[type='text']").val("");
						
				}
			});
		},
		error: function() {
			$(this).removeClass("elg-ajax-loader");
			//TODO Make error logic
		}
	});
});
</script>