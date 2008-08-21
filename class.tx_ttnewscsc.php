<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2008 Krystian Szymukowicz
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 *
 * @author	Krystian Szymukowicz
 */
class tx_ttnewscsc {

	function extraItemMarkerProcessor($markerArray, $row, $lConf, &$pObj) {

		if($pObj->config['code'] == 'SINGLE'){
			$this->cObj = t3lib_div::makeInstance('tslib_cObj');

			$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ttnewscsc']);

			if(t3lib_extMgm::isLoaded('dam_ttnews')){
				$damImgList = tx_dam_db::getReferencedFiles('tt_news', $row['uid'], 'tx_damnews_dam_images');
				$imgList = implode(',',$damImgList['files']);
				//clear imgPath if DAM is on
				$pObj->conf['csc-imagetxt.']['20.']['imgPath'] = '';
			} else {
				$imgList = $row['image'];
			}

			$insertValuesArray['images'] = $imgList;
			$insertValuesArray['imagecaption'] = $row['imagecaption'];
			$insertValuesArray['alTtext'] = $row['imagealttext'];
			$insertValuesArray['titleText'] = $row['imagetitletext'];
			$insertValuesArray['imageorient'] = $row['imageorient'];
			$insertValuesArray['imagewidth'] = $row['imagewidth'];
			$insertValuesArray['imagecols'] = $row['imagecols'];
			$insertValuesArray['bodytext'] = $row['bodytext'];

			if(isset($confArr['additionalImagesOptions']) && $confArr['additionalImagesOptions'] == 1){
				$insertValuesArray['additionalImagesOptions'] = 1;
			}else{
				$insertValuesArray['additionalImagesOptions'] = 0;
			}

			$this->cObj->data = $insertValuesArray;

			$content = $this->cObj->cObjGetSingle($pObj->conf['csc-imagetxt'],$pObj->conf['csc-imagetxt.']);

			$markerArray['###NEWS_CONTENT###'] = $content;
			$markerArray['###NEWS_IMAGE###'] = '';

			
		}
		return $markerArray;
	}
}

?>
