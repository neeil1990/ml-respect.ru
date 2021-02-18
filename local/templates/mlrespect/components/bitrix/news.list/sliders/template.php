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

<?if(CITY_NAME == 'Воронеж'):?> 
<div class="slider_wrap">
    <div class="container">
        <div class="main_slider">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <div class="main_slider_item" style="background-image: url(<?=$arItem['DETAIL_PICTURE']['SRC'];?>)"></div>
            <?endforeach;?>
        </div>

        <div class="main_slider_text">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <div class="main_slider_text_item">
                <div class="main_slider_text_title"><?=$arItem['NAME'];?></div>
                <div class="main_slider_text_desc"><?=$arItem['DETAIL_TEXT'];?></div>
            </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<?else:?>

<?endif;?>




