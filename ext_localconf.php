<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

if (TYPO3_MODE == 'FE')    {
	require_once(t3lib_extMgm::extPath($_EXTKEY).'class.tx_ttnewscsc.php');
	$TYPO3_CONF_VARS['EXTCONF']['tt_news']['extraItemMarkerHook'][]   = 'tx_ttnewscsc';
}

?>
