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
<?if(!empty($arResult['ITEMS'])):?>
<div class="new_offer">
	<div class="container">
		<div class="title">
            Другие автомобили с пробегом
		</div>
		<div class="cars">
        <?foreach($arResult['ITEMS'] as $arElement):?>
            <a href="<?=$arElement["DETAIL_PAGE_URL"];?>" class="car_item">
                <div class="car_item_img car_item_img_slider">
                    <?if(!empty($arElement['DISPLAY_PROPERTIES']['oldprice']['VALUE'])):?>
                    <div class="sale_val">
                        <span>Выгода</span>
                        <?$dis = $arElement['DISPLAY_PROPERTIES']['oldprice']['VALUE'] - $arElement['DISPLAY_PROPERTIES']['price']['VALUE'];?>
                        <span><?=number_format($dis, 0, '.', ' ');?> ₽</span>
                    </div>
                    <?endif;?>

                    <?foreach($arElement['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img): if($idx > 4) break;?>
                    <?if(!empty($img['SRC'])):?>
                    <img src="<?=$img['SRC']?>" loading="lazy" width="358" height="200" alt="<?=$arElement['NAME'];?>" />
                    <?endif;?>
                    <?endforeach?>
                </div>
                <div class="car_item_text">
                    <div class="car_item_name">Автомобиль <?=$arElement['NAME'];?> с пробегом</div>
                    <span class="btn_fav"></span>
                    <div class="car_item_price">
                        <div class="car_item_price_val<?if(!empty($arElement['DISPLAY_PROPERTIES']['oldprice']['VALUE'])):?>_sale<?endif;?>">
                            <?if(!empty($arElement['DISPLAY_PROPERTIES']['oldprice']['VALUE'])):?>
                            <div class="car_item_price_val_old">
                                <?=number_format($arElement['DISPLAY_PROPERTIES']['oldprice']['VALUE'], 0, '.', ' ');?>
                            </div>
                            <div class="car_item_price_val_new">
                                <?=number_format($arElement['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ');?> ₽
                            </div>
                            <?else:?>
                            <?=number_format($arElement['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ');?> ₽
                            <?endif;?>
                        </div>
                            <? $time = time(); ?>
                            <?if($time < 1577836799):?>
    							<?if($arElement['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Воронеж'):?>
    								<div class="car_item_persent">Рассрочка 0%*</div>
    							<?endif;?>
                            <?endif;?>
                    </div>
                </div>
            </a>
        <?endforeach;?>
        <a href="/car/" class="white_btn">Посмотреть все автомобили с пробегом</a>
		</div>
	</div>
</div>
<?endif;?>
