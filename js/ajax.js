/**
 * Fetch a view via AJAX
 *
 * @example Usage:
 * Use it to fetch a view using /ajax/view
 * can also be used to refresh a view
 * elgg.view('likes/display', {data: {guid: GUID}, target: targetDOM})
 * @param {string} name Viewname
 * @param {Object} options Parameters to the view along with jQuery options {@see jQuery#ajax}
 * @return {void}
 */

elgg.view = function(name, options) {
	elgg.assertTypeOf('string', name);
	//Check to see if its already a normalized url
	if (new RegExp("^(https?://)", "i").test(name)) {
		name = name.split(elgg.config.wwwroot)[1];
	}
	var url = elgg.normalize_url('ajax/view/'+name);
	if (elgg.isNullOrUndefined(options.success)) {
		options.manipulationMethod = options.manipulationMethod || 'html';
		var custom_success = options.success || elgg.nullFunction;
		options.success = function(data) {
			$(options.target)[options.manipulationMethod](data);
			custom_success(data);
		};
	}
	elgg.get(url, options);
};
$(document).ready(function() {
	$("a[href='#action']").click(function() {
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
					$(this.formObj).prev().append($(data).children().first());
				}
			});
		},
		error: function() {
			$(this).removeClass("elg-ajax-loader");
			
		}
	});
});