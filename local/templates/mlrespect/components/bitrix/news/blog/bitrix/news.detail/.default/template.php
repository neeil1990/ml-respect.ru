<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$APPLICATION->SetPageProperty("description", substr(strip_tags($arResult["DETAIL_TEXT"]), 0, 150));


?>
<h1><?=$arResult["NAME"]?></h1>
<?
$pos = strpos($arResult["DETAIL_TEXT"], '<h2>');
$content_before = substr($arResult["DETAIL_TEXT"], 0, $pos);
$content_after = substr($arResult["DETAIL_TEXT"], $pos);
?>
<?=$content_before;?>
<img src="<?=$arResult["DETAIL_PICTURE"]['SRC']?>" alt="<?=$arResult["NAME"]?>" />
<div class="img_desc"><?=$arResult["NAME"]?></div>
<?=$content_after;?>