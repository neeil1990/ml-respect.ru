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
			 Каталог новинок
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
                    <div class="car_item_name"><?=$arElement['NAME'];?></div>
                    <div class="car_item_desc">
                        <?if($arElement['DISPLAY_PROPERTIES']['year']['VALUE']):?>
                            <?=$arElement['DISPLAY_PROPERTIES']['year']['VALUE'];?>,
                        <?endif;?>
                        <?if($arElement['DISPLAY_PROPERTIES']['transmission']['VALUE']):?>
                            <?=$arElement['DISPLAY_PROPERTIES']['transmission']['VALUE'];?>,
                        <?endif;?>
                        <?if($arElement['DISPLAY_PROPERTIES']['power']['VALUE']):?>
                            <?=$arElement['DISPLAY_PROPERTIES']['power']['VALUE'];?> л.с.,
                        <?endif;?>
                        <?if($arElement['DISPLAY_PROPERTIES']['run']['VALUE']):?>
                            <?=number_format($arElement['DISPLAY_PROPERTIES']['run']['VALUE'], 0, '.', ' ');?> км
                        <?endif;?>
                    </div>
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
                        <!--<div class="car_item_price_text">Можно<br/> в кредит</div>-->
                            <? $time = time(); ?>
                            <?if($time < 1577836799):?>
    							<?if($arElement['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Воронеж'):?>
    								<div class="car_item_persent">Рассрочка 0%*</div>
    							<?endif;?>
                            <?endif;?>
                        <?// Олег: Скрыл(закоментил) плашку ВЫГОДА со всех поддоменов для всех машин?>
                        <?/*if(CITY_NAME != 'Санкт-Петербург'): // Олег: добавил условие исключающее плашку из поддомена spb?>
                            <?if($arElement['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Белгород'):?>
                                <div class="car_item_price_action" style="display: none;">
                                    <span>Выгода</span>
                                    <?
                                    $dprice = $arElement['DISPLAY_PROPERTIES']['price']['VALUE'];
                                    $percent20 = $arElement['DISPLAY_PROPERTIES']['price']['VALUE'] * 0.2;
                                    $discount = floor((($dprice-$percent20)*0.13872) / 1000) * 1000;
                                    ?>
                                    <b>- <?=number_format($discount, 0, ',', ' ');?> ₽</b>
                                </div>
                            <?endif;?>
                            <?if($arElement['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Санкт-Петербург'):?>
                                <div class="car_item_price_action">
                                    <span>Выгода</span>
                                    <?
                                    $dprice = $arElement['DISPLAY_PROPERTIES']['price']['VALUE'];
                                    $percent20 = $arElement['DISPLAY_PROPERTIES']['price']['VALUE'] * 0.2;
                                    $discount = floor((($dprice-$percent20)*0.13872) / 1000) * 1000;
                                    ?>
                                    <b>- <?=number_format($discount, 0, ',', ' ');?> ₽</b>
                                </div>
                            <?endif;?>
                        <?endif;*/ // Олег: добавил условие исключающее плашку из поддомена spb конец условия?>
                    </div>
                    <div class="car_item_date clearfix">
                        <?if($arElement['DISPLAY_PROPERTIES']['city']['VALUE']):?>
                        <div class="car_item_date_left"><?=$arElement['DISPLAY_PROPERTIES']['city']['VALUE'];?></div>
                        <?endif;?>
                        <?if($arElement['DATE_CREATE']):?>
                        <div class="car_item_date_right">
                            <p>Добавлен <span><? echo FormatDateFromDB($arElement["DATE_CREATE"], 'SHORT'); ?></span></p>
                        </div>
                        <?endif;?>
                    </div>
                </div>
            </a>
            <?endforeach;?>
 <a href="/car/" class="white_btn">Посмотреть все свежие поступления</a>
		</div>
	</div>
</div>
<?endif;?>