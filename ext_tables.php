<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::addStaticFile($_EXTKEY, 'static/', 'tt_news css styles content');

$confArr = unserialize($_EXTCONF);

t3lib_div::loadTCA('tt_news');

if(isset($confArr['additionalImagesOptions']) && $confArr['additionalImagesOptions'] == 1){
$temp = array(
			'imageorient' => Array (
			'label' => 'LLL:EXT:cms/locallang_ttc.php:imageorient',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.0', 0, 'selicons/above_center.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.1', 1, 'selicons/above_right.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.2', 2, 'selicons/above_left.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.3', 8, 'selicons/below_center.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.4', 9, 'selicons/below_right.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.5', 10, 'selicons/below_left.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.6', 17, 'selicons/intext_right.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.7', 18, 'selicons/intext_left.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.8', '--div--'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif'),
					Array('LLL:EXT:cms/locallang_ttc.php:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif')
				),
				'selicon_cols' => 6,
				'default' => '17',
				'iconsInOptionTags' => 1,
			)
	),
	'imagewidth' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:cms/locallang_ttc.php:imagewidth',
			'config' => Array (
				'type' => 'input',
				'size' => '4',
				'max' => '4',
				'eval' => 'int',
				'checkbox' => '0',
				'range' => Array (
					'upper' => '999',
					'lower' => '25'
				),
				'default' => 0
			)
		),
		'imagecols' => Array (
			'label' => 'LLL:EXT:cms/locallang_ttc.php:imagecols',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('1', 0),
					Array('2', 2),
					Array('3', 3),
					Array('4', 4),
					Array('5', 5),
					Array('6', 6),
					Array('7', 7),
					Array('8', 8)
				),
				'default' => 0
			)
		),
  );
  $TCA['tt_news']['palettes']['7'] = Array('showitem' => 'imagewidth,imagecols');
  t3lib_extMgm::addTCAcolumns('tt_news',$temp);
  t3lib_extMgm::addToAllTCAtypes('tt_news','imageorient;;7;;','','after:imagecaption');
}


if(isset($confArr['moreTabs']) && $confArr['moreTabs'] == 1){
	$TCA['tt_news']['types']['0']['showitem'] = preg_replace('/--div--;Relations/', '' ,$TCA['tt_news']['types']['0']['showitem']);
	t3lib_extMgm::addToAllTCAtypes('tt_news','--div--;LLL:EXT:ttnewscsc/locallang_db.xml:tab-content,','','before:bodytext');
	t3lib_extMgm::addToAllTCAtypes('tt_news','--div--;LLL:EXT:ttnewscsc/locallang_db.xml:tab-category,','','after:bodytext');
	t3lib_extMgm::addToAllTCAtypes('tt_news','--div--;LLL:EXT:ttnewscsc/locallang_db.xml:tab-images,','','after:category');
	t3lib_extMgm::addToAllTCAtypes('tt_news','--div--;LLL:EXT:ttnewscsc/locallang_db.xml:tab-special,','','before:links');
  }

if(isset($confArr['shortAsTabWithRTE']) && $confArr['shortAsTabWithRTE'] == 1) {
	$TCA['tt_news']['types']['0']['showitem'] = t3lib_div::rmFromList(' short',$TCA['tt_news']['types']['0']['showitem']);
	t3lib_extMgm::addToAllTCAtypes('tt_news','--div--;LLL:EXT:ttnewscsc/locallang_db.xml:tab-short,short;;4;richtext:rte_transform[flag=rte_enabled|mode=ts];4-4-4,','','after:bodytext');
	}

?>
