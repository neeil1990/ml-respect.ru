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
?>
<div class="news-line">
<?echo count($arResult["ITEMS"]);?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?echo $arItem["NAME"]?> (<?echo $arItem["PROPERTY_ADDRESS_VALUE"]?>)<br>
	<?endforeach;?>
</div>
