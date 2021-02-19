<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" =>$arResult['SECTION']['PATH'][0]["CODE"]), false, $arSelect = array("UF_*"));
if($props_array = $rsResult->Fetch()){
$arResult["SECTION_PROPS"] = $props_array;
$title=$APPLICATION->GetTitle();
$title= str_replace('#UF_SEO_SPB_TITLE#',$props_array['UF_SEO_SPB_TITLE'],$title);
$APPLICATION->SetTitle($title);
global $USER;
if (!$USER->IsAuthorized()){
	foreach($arResult['ITEMS'] as $elementKey => $arElement){
		$arResult['ITEMS'][$elementKey]['DETAIL_PAGE_URL']= explode('?', $arElement['DETAIL_PAGE_URL'])[0];
	}
}

// $description =$APPLICATION->GetProperty("description");
// $keywords =$APPLICATION->GetProperty("keywords");

}
// Олег: изменяем размер картинки
foreach($arResult['ITEMS'] as $itemKey => $arElement){
    foreach($arElement['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img)
    {
    	if($idx > 4) break;
        if(!empty($img['SRC']))
        {
			$renderImage = CFile::ResizeImageGet($img, array("width" => 640, "height" => 480), BX_RESIZE_IMAGE_EXACT, true);
            $arResult['ITEMS'][$itemKey]['DISPLAY_PROPERTIES']['img']['FILE_VALUE'][$idx]['SRC'] = $renderImage['src'];
        }
	}
}
