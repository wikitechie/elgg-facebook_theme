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
		options.success = function(data) {
			if (options.replace == "true")
				$(options.target).replaceWith($(data));
			else
				$(options.target)[options.manipulationMethod](data);
		};
	}
	elgg.get(url, options);
};
$(document).ready(function() {
	$("a[href='#view']").click(function() {
		var guid			= $(this).attr('data-guid');
		var view			= $(this).attr('data-view');
		var annotation_name	= $(this).attr('data-annotation_name');
		var dest			= $(this).attr('data-dest');
		var replace			= $(this).attr('data-replace');
		var hide_selector	= $(this).attr('data-hide');
		$(dest).html("<div class='elgg-ajax-loader'></div>");
		elgg.view(view,{
			'data':{
				'guid':guid,
				'annotation_name':annotation_name
			},
			'replace'	: replace,
			'success'	: function(data) {
				if (hide_selector != undefined)
					$(hide_selector).hide();
				$(dest).replaceWith($(data));
			}
		});
		return false;
	});
	
});