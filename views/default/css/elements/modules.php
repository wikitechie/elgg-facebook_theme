/* ***************************************
	Modules
*************************************** */
.elgg-module {
	margin-bottom: 20px;
}

/* Aside */
.elgg-module-aside .elgg-head {
	border-bottom: 1px solid #CCC;

	margin-bottom: 5px;
	padding-bottom: 5px;
}

/* Info */
.elgg-module-info > .elgg-head {
	background: #e4e4e4;
	padding: 5px;
	margin-bottom: 10px;

	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.elgg-module-info > .elgg-head * {
	color: #333;
}

/* Popup */
.elgg-module-popup {
	background-color: white;

	z-index: 9999;
	margin-bottom: 0;

	box-shadow: 0 0 0 10px rgba(82, 82, 82, 0.7);
	border-radius: 8px;
}

.elgg-module-popup > .elgg-head {
	background: #6D84B4;
	border: 1px solid #3B5998;
	border-bottom: none;
	color: white;
	font-size: 14px;
	font-weight: bold;
	margin: 0;
	padding: 5px 10px;
}

.elgg-module-popup > .elgg-body {
	background: white;
	border: 1px solid #555;
	border-top: 0;
	padding: 10px;
}

/* Dropdown */
.elgg-module-dropdown {
	background-color:white;
	border:5px solid #CCC;

	-webkit-border-radius: 5px 0 5px 5px;
	-moz-border-radius: 5px 0 5px 5px;
	border-radius: 5px 0 5px 5px;

	display:none;

	width: 210px;
	padding: 12px;
	margin-right: 0px;
	z-index:100;

	-webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.45);
	box-shadow: 0 3px 3px rgba(0, 0, 0, 0.45);

	position:absolute;
	right: 0px;
	top: 100%;
}

/* Featured */
.elgg-module-featured {
	border: 1px solid #4690D6;

	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
}
.elgg-module-featured > .elgg-head {
	padding: 5px;
	background-color: #4690D6;
}
.elgg-module-featured > .elgg-head * {
	color: white;
}
.elgg-module-featured > .elgg-body {
	padding: 10px;
}

/* ***************************************
	Widgets
*************************************** */
.elgg-widgets {
	float: right;
	min-height: 30px;
}
.elgg-widget-add-control {
	text-align: right;
	margin: 5px 5px 15px;
}
.elgg-widgets-add-panel {
	padding: 10px;
	margin: 0 5px 15px;
	background: #dedede;
	border: 2px solid #ccc;
}
<?php //@todo location-dependent style: make an extension of elgg-gallery ?>
.elgg-widgets-add-panel li {
	float: left;
	margin: 2px 10px;
	width: 200px;
	padding: 4px;
	background-color: #ccc;
	border: 2px solid #b0b0b0;
	font-weight: bold;
}
.elgg-widgets-add-panel li a {
	display: block;
}
.elgg-widgets-add-panel .elgg-state-available {
	color: #333;
	cursor: pointer;
}
.elgg-widgets-add-panel .elgg-state-available:hover {
	background-color: #bcbcbc;
}
.elgg-widgets-add-panel .elgg-state-unavailable {
	color: #888;
}

.elgg-module-widget {
	background-color: #dedede;
	padding: 2px;
	margin: 0 5px 15px;
	position: relative;
}
.elgg-module-widget:hover {
	background-color: #ccc;
}
.elgg-module-widget > .elgg-head {
	background-color: #dedede;
	height: 30px;
	line-height: 30px;
	overflow: hidden;
}
.elgg-module-widget > .elgg-head h3 {
	float: left;
	padding: 0 45px 0 20px;
	color: #333;
}
.elgg-module-widget.elgg-state-draggable > .elgg-head {
	cursor: move;
}
.elgg-module-widget > .elgg-head a {
	position: absolute;
	top: 5px;
	display: inline-block;
	width: 18px;
	height: 18px;
	padding: 2px 2px 0 0;
	border: 1px solid transparent;
}
a.elgg-widget-collapse-button {
	left: 5px;
	background:transparent url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 0px -385px;
}
a.elgg-widget-collapsed {
	background-position: 0px -365px;
}
a.elgg-widget-delete-button {
	right: 5px;
}
a.elgg-widget-edit-button {
	right: 25px;
}
a.elgg-widget-edit-button:hover, a.elgg-widget-delete-button:hover {
	border: 1px solid #ccc;
}
.elgg-module-widget > .elgg-body {
	background-color: white;
	width: 100%;
	overflow: hidden;
}
.elgg-widget-edit {
	display: none;
	width: 96%;
	padding: 2%;
	border-bottom: 2px solid #dedede;
}
.elgg-widget-content {
	padding: 10px;
}
.elgg-widget-placeholder {
	border: 2px dashed #dedede;
	margin-bottom: 15px;
}