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

<?if(!empty($arResult["ITEMS"])):?>
<div class="slider_wrap">
    <div class="container">
        <div class="main_slider">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <div class="main_slider_item" style="background-image: url(<?=$arItem['DETAIL_PICTURE']['SRC'];?>)">
				    <div class="main_slider_item-mobile" style="display:none; background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC'];?>)"></div>
                </div>
            <?endforeach;?>
        </div>

        <div class="main_slider_text">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <div class="main_slider_text_item">
                    <?if($arItem["PROPERTIES"]["page_link"]["VALUE"]):?>
                        <a href="<?=$arItem["PROPERTIES"]["page_link"]["VALUE"]?>">
                    <?endif;?>
                        <div class="main_slider_text_title"><?=$arItem['NAME'];?></div>
                        <div class="main_slider_text_desc"><?=$arItem['DETAIL_TEXT'];?></div>
                    <?if($arItem["PROPERTIES"]["page_link"]["VALUE"]):?>
                        </a>
                    <?endif;?>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<?endif;?>




