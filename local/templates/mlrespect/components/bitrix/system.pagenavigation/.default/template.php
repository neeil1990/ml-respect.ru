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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>
<ul class="page_list">
    <?php while ($arResult["nStartPage"] <= $arResult["nEndPage"]) { ?>
        <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) { ?>
            <li class="active"><a href="javascript:void(0);"><?php echo $arResult["nStartPage"] ?></a></li>
        <?php } elseif ((1 == $arResult["nStartPage"]) && (false == $arResult["bSavePage"])) { ?>
            <li><a href="<?php echo $arResult["sUrlPath"] ?><?php echo $strNavQueryStringFull ?>"><?php echo $arResult["nStartPage"] ?></a></li>
        <?php } else { ?>
            <li><a href="<?php echo $arResult["sUrlPath"] ?>?<?php echo $strNavQueryString ?>PAGEN_<?php echo $arResult["NavNum"] ?>=<?php echo $arResult["nStartPage"] ?>"><?php echo $arResult["nStartPage"] ?></a></li>
        <?php } ?>
        <?php $arResult["nStartPage"]++ ?>
    <?php } ?>
</ul>