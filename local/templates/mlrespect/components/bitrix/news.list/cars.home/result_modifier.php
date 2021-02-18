<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
// Олег: изменяем размер картинок
foreach($arResult['ITEMS'] as $itemKey => $arElement){
    foreach($arElement['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img)
    {
    	if($idx > 4) break;
        if(!empty($img['SRC']))
        {
			$renderImage = CFile::ResizeImageGet($img, array("width" => IMG_CART_PREW_WIDTH, "height" => IMG_CART_PREW_HEIGHT), BX_RESIZE_IMAGE_EXACT, false);
            $arResult['ITEMS'][$itemKey]['DISPLAY_PROPERTIES']['img']['FILE_VALUE'][$idx]['SRC'] = $renderImage['src'];       
        }
	}
}	
?>