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

<div id="yandexmap" class="yamap"></div>

<div class="news-list filials-list">
<?foreach($arResult["ITEMS"] as $arItem):?>

	<div class="filial" style="margin-bottom: 50px;">
        <div class="card_car_map">
            <div class="card_car_map_title"><?=$arItem["NAME"]?></div>
            <?$city = '';
            if(isset($arItem["DISPLAY_PROPERTIES"]['CITY']["DISPLAY_VALUE"])){
                $city = $arItem["DISPLAY_PROPERTIES"]['CITY']["DISPLAY_VALUE"] . ', ';
            }?>
            <span><?=$city;?><br> 
            <?=$arItem["DISPLAY_PROPERTIES"]['address']["DISPLAY_VALUE"]?><br />
            тел <?=$arItem["DISPLAY_PROPERTIES"]['phone']["DISPLAY_VALUE"]?></span>
            <?if(isset($arItem["DISPLAY_PROPERTIES"]['coord']["DISPLAY_VALUE"])):
            $coord = $arItem["DISPLAY_PROPERTIES"]['coord']["DISPLAY_VALUE"];
            $coord = explode(',', $coord);
            ?>
            <div class="yandexmaphelper" 
                data-name="<?=$arItem["NAME"]?>"
                data-phone="<?=$arItem["DISPLAY_PROPERTIES"]['phone']["DISPLAY_VALUE"]?>"
                data-coordx="<?=$coord[0];?>" 
                data-coordy="<?=$coord[1];?>" 
                data-city="<?=CITY_NAME?>"
                <? if(CITY_NAME == 'Воронеж'): ?>
                data-coordcenterx="51.663726" 
                data-coordcentery="39.299665" 
                <? endif; ?> 
                <? if(CITY_NAME == 'Белгород'): ?>
                data-coordcenterx="50.611462" 
                data-coordcentery="36.611199" 
                <? endif; ?> 
                <? if(CITY_NAME == 'Санкт-Петербург'): ?>
                data-coordcenterx="59.954493" 
                data-coordcentery="30.459140" 
                <? endif; ?> 
                data-addr="<?=$city?><?=$arItem["DISPLAY_PROPERTIES"]['address']["DISPLAY_VALUE"]?>" style="display: none;"></div>
            <?endif;?>
        </div>
	</div>

<?endforeach;?>
</div>
