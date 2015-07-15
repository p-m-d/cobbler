<?php
return [
	'normalize.css' => [
		'match' => '/(?<match>\/\*!\snormalize\.css.*)\/\*! Source/s'
	],
	'print.css' => [
		'match' => '/(?<match>\/\*! Source.*?\}\s})/s',
	],
	'glyphicons.css' => [
		'match' => '/(?<match>@font-face \{.*font-family: \'Glyphicons.*e260.*?\})/s'
	],
	'scaffolding.css' => [
		'match' => '/Glyphicons.*e260.*?\}(?<match>.*\[role="button"\].*?\})/s'
	],
	'type.css' => [
		'match' => '/(?<match>h1,.h2,.*address.*?\})/s'
	],
	'code.css' => [
		'match' => '/address.*?\}.*(?<match>code,.kbd,.*\.pre-scrollable.*?\})/s'
	],
	'grid.css' => [
		'match' => '/pre-scrollable.*?\}.*?(?<match>\.container.*?\}).table/s'
	],
	'tables.css'=> [
		'match' => '/col-lg-offset-0.*?(?<match>table.*?)fieldset/s'
	],
	'forms.css' => [
		'match' => '/table-responsive.*?(?<match>fieldset.*?\}).\.btn/s'
	],
	'buttons.css' => [
		'match' => '/form-horizontal.*?(?<match>\.btn.*?).fade/s'
	],
	'component-animations.css' => [
		'match' => '/(?<match>\.fade.*?).caret/s'
	],
	'dropdowns.css' => [
		'match' => '/collapsing.*?(?<match>\.caret.*?).btn-group/s'
	],
	'button-groups.css' => [
		'match' => '/(?<match>\.btn-group,.*?\[data-toggle="buttons"\].*?).input-group/s'
	],
	'input-groups.css' => [
		'match' => '/\[data-toggle="buttons"\].*?(?<match>\.input-group\s\{.*?)\.nav/s'
	],
	'navs.css' => [
		'match' => '/\.btn-group.*?(?<match>\.nav.*?.nav-tabs\s.dropdown-menu.*?)\.navbar/s'
	],
	'navbar.css' => [
		'match' => '/nav-tabs\s.dropdown-menu.*?(?<match>\.navbar.*?)\.breadcrumb/s'
	],
	'breadcrumbs.css' => [
		'match' => '/(?<match>\.breadcrumb.*?)\.pagination/s'
	],
	'pagination.css' => [
		'match' => '/(?<match>\.pagination.*?)\.pager/s'
	],
	'pager.css' => [
		'match' => '/(?<match>\.pager.*?)\.label/s'
	],
	'labels.css' => [
		'match' => '/pager.*?(?<match>\.label.*?)\.badge/s'
	],
	'badges.css' => [
		'match' => '/label-danger.*?(?<match>\.badge.*?)\.jumbotron/s'
	],
	'jumbotron.css' => [
		'match' => '/(?<match>\.jumbotron.*?)\.thumbnail/s'
	],
	'thumbnails.css' => [
		'match' => '/jumbotron.*?(?<match>\.thumbnail.*?)\.alert/s'
	],
	'alerts.css' => [
		'match' => '/(?<match>\.alert.*?.alert-danger.*?\})/s'
	],
	'progress-bars.css' => [
		'match' => '/(?<match>@-webkit-keyframes progress-bar-stripes.*?)\.media/s'
	],
	'media.css' => [
		'match' => '/(?<match>\.media.*?)\.list-group/s'
	],
	'list-group.css' => [
		'match' => '/(?<match>\.list-group\s\{.*?)\.panel/s'
	],
	'panels.css' => [
		'match' => '/(?<match>\.panel.*?)\.embed-responsive/s'
	],
	'responsive-embed.css' => [
		'match' => '/(?<match>\.embed-responsive.*?)\.well/s'
	],
	'wells.css' => [
		'match' => '/(?<match>\.well.*?)\.close/s'
	],
	'close.css' => [
		'match' => '/well-sm.*?(?<match>\.close.*?)\.modal-open/s'
	],
	'modals.css' => [
		'match' => '/(?<match>\.modal-open.*?)\.tooltip/s'
	],
	'tooltip.css' => [
		'match' => '/(?<match>\.tooltip.*?)\.popover/s'
	],
	'popovers.css' => [
		'match' => '/(?<match>\.popover.*?)\.carousel/s'
	],
	'carousel.css' => [
		'match' => '/(?<match>\.carousel\s\{.*?)\.clearfix:before/s'
	],
	'utilities.css' => [
		'match' => '/(?<match>\.clearfix:before.*?)@-ms-viewport/s'
	],
	'responsive-utilities.css' => [
		'match' => '/(?<match>@-ms-viewport.*?)\/\*\#/s'
	],
	'theme.css' => [
		'match' => '/(?<match>.*)\/\*\#/s'
	]
];