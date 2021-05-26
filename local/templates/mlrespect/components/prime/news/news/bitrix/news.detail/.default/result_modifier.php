<?php
$arSelect = Array("NAME", "PROPERTY_address", "PROPERTY_phone", "PROPERTY_coord", "PROPERTY_CITY");
$arFilter = Array("IBLOCK_ID" => $arResult['DISPLAY_PROPERTIES']['filial']['LINK_IBLOCK_ID'], "ACTIVE" => "Y","ID" => $arResult['DISPLAY_PROPERTIES']['filial']['VALUE']);
$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, Array("nTopCount" => 1), $arSelect);
if($arFields = $res->Fetch())
    $arResult["FILIAL"] = $arFields;


// Олег: изменяем размер картинок
foreach($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx => $img)
{
    if(!empty($img['SRC']))
    {
		$renderImage = CFile::ResizeImageGet($img, array("width" => IMG_CART_DETAIL_BIG_WIDTH, "height" => IMG_CART_DETAIL_BIG_HEIGHT), BX_RESIZE_IMAGE_EXACT, false);
        $arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'][$idx]['SRC'] = $renderImage['src'];

		$renderImagePrew = CFile::ResizeImageGet($img, array("width" => IMG_CART_DETAIL_PREW_WIDTH, "height" => IMG_CART_DETAIL_PREW_HEIGHT), BX_RESIZE_IMAGE_EXACT, false);
        $arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'][$idx]['SRC_PREW'] = $renderImagePrew['src'];
    }
}

if($arResult['DISPLAY_PROPERTIES']['equipment']['VALUE'])
    $arResult['equipment'] = array_chunk($arResult['DISPLAY_PROPERTIES']['equipment']['VALUE'], ceil(count($arResult['DISPLAY_PROPERTIES']['equipment']['VALUE'])/4));

