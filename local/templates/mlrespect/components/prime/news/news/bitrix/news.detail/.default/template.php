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
<div itemscope itemtype="http://schema.org/Product"
     class="card_car"
     style="margin-top: 30px;"
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['panorama']['VALUE'])):?>
        <?if(!empty($arResult['DISPLAY_PROPERTIES']['vin']['VALUE'])):?> data-vin="<?=$arResult['DISPLAY_PROPERTIES']['vin']['VALUE']?>" <?endif;?>
    <? endif; ?>
>
    <span itemprop="brand" style="display:none;"><?=$arResult['NAME']?></span>

    <div class="container clearfix">

        <div class="card_car_left">
            <div class="thumbs">
                <? foreach($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx => $img): ?>
                    <a href="<?=$img['SRC']?>" class="thumbs_item" style="background-image: url(<?=$img['SRC_PREW']?>);"></a>
                <?endforeach?>

                <img style="display:none;" itemprop="image" src="<?=$img['SRC']?>" loading="lazy" width="586" height="390" />

                <? if(count($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE']) > 10): ?>
                    <a class="more_photos" href="javascript:void(0);">
                        Ещё <?=(count($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE']) - 9);?> фото
                    </a>
                <?endif;?>
            </div>
        </div>

        <div class="card_car_right">

            <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs">
                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" title="Главная"  href="/">
                        <span itemprop="name">Главная</span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" title="Авто с пробегом"  href="/car/">
                        <span itemprop="name">Авто с пробегом</span>
                        <meta itemprop="position" content="2">
                    </a>
                </li>
                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                    <a itemprop="item" title="<?=$arResult['NAME'];?>" href="javascript:void(0);">
                        <span itemprop="name"><?=$arResult['NAME'];?></span>
                        <meta itemprop="position" content="3">
                    </a>
                </li>
            </ul>

            <h1 class="card_car_title" itemprop="name"><?=$arResult['NAME'];?></h1>

            <div class="char_box clearfix">
                <div class="char_left" itemprop="description">
                    <?if($arResult['DISPLAY_PROPERTIES']['year']['VALUE']):?>
                        <div class="char_name">Год выпуска</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['run']['VALUE']):?>
                        <div class="char_name">Пробег</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['displacement']['VALUE']
                        || $arResult['DISPLAY_PROPERTIES']['power']['VALUE']
                        || $arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                        <div class="char_name">Двигатель</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['transmission']['VALUE']):?>
                        <div class="char_name">Коробка</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['state']['VALUE']):?>
                        <div class="char_name">Состояние</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['color']['VALUE']):?>
                        <div class="char_name">Цвет</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['body']['VALUE']):?>
                        <div class="char_name">Тип кузова</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                        <div class="char_name">Тип двигателя</div>
                    <?endif;?>
                </div>
                <div class="char_right">
                    <?if($arResult['DISPLAY_PROPERTIES']['year']['VALUE']):?>
                        <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?></div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['run']['VALUE']):?>
                        <div class="char_value"><?=number_format($arResult['DISPLAY_PROPERTIES']['run']['VALUE'], 0, ',', ' ');?> км</div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['displacement']['VALUE']
                        || $arResult['DISPLAY_PROPERTIES']['power']['VALUE']
                        || $arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                        <div class="char_value">
                            <?if($arResult['DISPLAY_PROPERTIES']['displacement']['VALUE']):?>
                                <?=$arResult['DISPLAY_PROPERTIES']['displacement']['VALUE']?> см<sup>3</sup> /
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['power']['VALUE']):?>
                                <?=$arResult['DISPLAY_PROPERTIES']['power']['VALUE']?> л.с. /
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                                <?=$arResult['DISPLAY_PROPERTIES']['engine']['VALUE']?>
                            <?endif;?>
                        </div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['transmission']['VALUE']):?>
                        <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['transmission']['VALUE']?></div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['state']['VALUE']):?>
                        <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['state']['VALUE']?></div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['color']['VALUE']):?>
                        <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['color']['VALUE']?></div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['body']['VALUE']):?>
                        <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['body']['VALUE']?></div>
                    <?endif;?>
                    <?if($arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                        <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['engine']['VALUE']?></div>
                    <?endif;?>
                </div>
            </div>

            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" style="display:none;">
                <div><?=$arResult['DISPLAY_PROPERTIES']['price']['VALUE']?> ₽</div>
                <meta itemprop="price" content="<?=$arResult['DISPLAY_PROPERTIES']['price']['VALUE']?>.00">
                <link itemprop="availability" href="http://schema.org/InStock">
                <meta itemprop="priceCurrency" content="RUB">
            </div>

            <div class="card_car_price_car">
                <div class="card_car_price_car_left">
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['oldprice']['VALUE'])):?>
                        <div class="card_car_old_price">
                            <?=CurrencyFormat($arResult['DISPLAY_PROPERTIES']['oldprice']['VALUE'], 'RUB');?>
                        </div>
                    <?endif;?>
                    <div class="card_car_new_price">
                        <?=CurrencyFormat($arResult['DISPLAY_PROPERTIES']['price']['VALUE'], 'RUB');?>
                    </div>
                </div>

                <div class="card_car_price_car_right">
                    <a href="javascript:void(0);"
                       onclick="show_popupTest('<?=str_replace(["'"], '', $arResult['NAME']);?> <?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?>', <?=$arResult['DISPLAY_PROPERTIES']['filial']['VALUE'];?>)"
                       class="red_btn">Рассчитать trade-in</a>

                    <a href="javascript:void(0);"
                       onclick="show_popup('<?=str_replace(["'"], '', $arResult['NAME']);?> <?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?>', <?=$arResult['DISPLAY_PROPERTIES']['filial']['VALUE'];?>);"
                       class="white_btn">Рассчитать кредит</a>
                </div>
            </div>

            <? if($arResult['FILIAL']): ?>
            <div class="card_car_map">
                <div class="card_car_map_title">Где можно осмотреть авто</div>
                <span>
                    <?=$arResult['FILIAL']['NAME'];?>,<br/>
                    тел <a href="tel:<?=$arResult['FILIAL']['PROPERTY_PHONE_VALUE'];?>" style="color: #ea1e26">
                    <?=$arResult['FILIAL']['PROPERTY_PHONE_VALUE'];?></a><br/>
                    <?=$arResult['FILIAL']['PROPERTY_ADDRESS_VALUE'];?>
                </span>

                <? if(isset($arResult['FILIAL']['PROPERTY_COORD_VALUE'])): ?>
                    <div onclick="return false;" style="cursor:unset" class="map"></div>
                <?endif;?>
            </div>
            <? endif; ?>

        </div>

        <div class="advantages">
            <div class="advantages_item ico1">Полная исправность<br/> всех машин</div>
            <div class="advantages_item ico2">Гарантия на все наши<br/>  автомобили</div>
            <div class="advantages_item ico3">Быстрый выкуп авто<br/> за 30 минут</div>
            <div class="advantages_item ico4">Бесплатная юридическая<br/> поддержка</div>
        </div>

        <?if(!empty($arResult['equipment'])):?>
            <h2>Комплектация автомобиля</h2>
            <div class="compl_auto">
                <?
                $inc = count($arResult['equipment']);
                for($i = 0; $i < $inc; $i++):
                ?>
                <div class="compl_auto_box">
                    <div class="compl_auto_box_item">
                        <?foreach($arResult['equipment'][$i] as $value):?>
                            <span><?=$value?></span>
                        <?endforeach;?>
                    </div>
                </div>
                <? endfor; ?>
            </div>
        <?endif;?>

        <? if(!empty($arResult["DETAIL_TEXT"])): ?>
            <div class="detail_text">
                <h2>Условия покупки <?=$arResult['NAME'];?></h2>
                <?=$arResult["DETAIL_TEXT"];?>
            </div>
        <? endif; ?>

    </div>

</div>
