<?php

########################################################################
# Extension Manager/Repository config file for ext: "ttnewscsc"
#
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'tt_news CSS Styled Content',
	'description' => 'Formats images and text of tt_news records using standard css_styled_content. It allows also to divide fields of tt_news into more tabs.',
	'category' => 'fe',
	'author' => 'Krystian Szymukowicz',
	'author_email' => 'http://www.prolabium.com',
	'shy' => '',
	'dependencies' => 'tt_news,css_styled_content',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'tt_news' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
);

?>