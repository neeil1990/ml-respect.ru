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
<? $visual="";
if(empty($arResult['ITEMS'])){
    $visual='style="display:none"';
}
?>
    <div class="submenu__cars" <?=$visual?>>
        <h3 class="submenu__cars-title">Спецпредложения</h3>
        <div class="submenu__cars-wrapper">
            <?foreach($arResult['ITEMS'] as $arElement):?>
                <a href="<?=$arElement["DETAIL_PAGE_URL"];?>" class="submenu__cars-item">
                    <div class="submenu__cars-img">
                        <?foreach($arElement['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img): if($idx > 4) break;?>
                            <?if(!empty($img['SRC'])):?>
                                <img src="<?=$img['SRC']?>" loading="lazy" width="118" height="79" alt="<?=$arElement['NAME'];?>" />
                                <?break;?>
                            <?endif;?>
                        <?endforeach?>
                    </div>
                    <span class="submenu__cars-name"><?=$arElement['NAME'];?></span>
                    <span class="submenu__cars-price">от <?=number_format($arElement['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ');?> руб.</span>
                </a>
            <?endforeach;?>

        </div>
    </div>



