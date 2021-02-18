<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="breadcrumbs_wrap" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><div class="container"><ul class="breadcrumbs">';
$itemSize = count($arResult);
// echo "<pre style='display:none'>";
// print_r($arResult);
// echo "</pre>";
for($index = 0; $index < $itemSize; $index++)
{
    // $title = ($index > 0? htmlspecialcharsex($arResult[$index]["TITLE"]) : 'Респект');
    $title = $arResult[$index]["LINK"] == "/car/"?'Каталог' : $arResult[$index]["TITLE"]  ;
    $title = str_replace("Купить б/у ", "", $title);;


	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .=  '<li id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		                    <a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item"><span itemprop="name">'.$title.'</span></a>
		                    <meta itemprop="position" content="'.($index + 1).'" />
		                </li>';
	}
	else
	{
        $strReturn .=  '<li id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		                    <a href="javascript:void(0);" title="'.$title.'" itemprop="item"><span itemprop="name">'.$title.'</span></a>
		                    <meta itemprop="position" content="'.($index + 1).'" />
		                </li>';
	}
}

$strReturn .= '</ul></div></div>';

return $strReturn;
