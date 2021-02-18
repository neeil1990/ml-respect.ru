<?php

$arSelect = Array("NAME", "PROPERTY_address", "PROPERTY_phone", "PROPERTY_coord", "PROPERTY_CITY");
$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y","ID"=>$arResult['DISPLAY_PROPERTIES']['filial']['VALUE']);

$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>PHP_INT_MAX), $arSelect);

$filial_items = array();
while($ob = $res->GetNextElement())
{
  $arFields = $ob->GetFields();
  $filial_items[] = $arFields;
}

$arResult["FILIAL"] = $filial_items;

// Олег: изменяем размер картинок
foreach($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img)
{
    if(!empty($img['SRC']))
    {
		$renderImage = CFile::ResizeImageGet($img, array("width" => IMG_CART_DETAIL_BIG_WIDTH, "height" => IMG_CART_DETAIL_BIG_HEIGHT), BX_RESIZE_IMAGE_EXACT, false);
        $arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'][$idx]['SRC'] = $renderImage['src']; 

		$renderImagePrew = CFile::ResizeImageGet($img, array("width" => IMG_CART_DETAIL_PREW_WIDTH, "height" => IMG_CART_DETAIL_PREW_HEIGHT), BX_RESIZE_IMAGE_EXACT, false);
        $arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'][$idx]['SRC_PREW'] = $renderImagePrew['src'];       
    }
}