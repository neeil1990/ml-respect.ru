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

<?$cnaonical = explode('?', $arResult["DETAIL_PAGE_URL"]);
$APPLICATION->AddHeadString('<link href="https://'.$_SERVER["SERVER_NAME"].$cnaonical[0].'" rel="canonical" />',true); // Олег: установка канонического url?>
<div itemscope itemtype="http://schema.org/Product" class="card_car" style="margin-top: 30px;"
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['panorama']['VALUE'])):?>
        <?if(!empty($arResult['DISPLAY_PROPERTIES']['vin']['VALUE'])):?>data-vin="<?=$arResult['DISPLAY_PROPERTIES']['vin']['VALUE']?>"<?endif;?>
    <?endif;?>
>
    <?$brandp = explode(" ", $arResult['NAME']);
    $brand = $brandp[0];
    if ($brand == 'Land') {
        $brand = 'Land Cruser';
    }
    ?>
    <span itemprop="brand" style="display:none;"><?=$brand?></span>
    <div class="container clearfix">
        <div class="card_car_left">
            <div class="thumbs">
                <?$ind=0;foreach($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img): $ind = $idx;?>
                <a href="<?=$img['SRC']?>" class="thumbs_item" style="background-image: url(<?=$img['SRC_PREW']?>);"></a><?//Олег: заменил $img['SRC'] на $img['SRC_PREW'] в котором уменьшеная картинка?>
                <?endforeach?>
                <img style="display:none;" itemprop="image" src="<?=$img['SRC']?>" loading="lazy" width="586" height="390" />
                <?if($ind > 8):?><a class="more_photos" href="javascript:void(0);">Ещё <?=($ind-9);?> фото</a><?endif;?>
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
            <?if($arResult['DATE_CREATE']):?>
                <div class="card_car_date">
                    <!--Добавлен <? echo FormatDateFromDB($arResult["DATE_CREATE"], 'SHORT'); ?>-->
                    &nbsp;
                </div>
            <?endif;?>
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
                            <?=number_format($arResult['DISPLAY_PROPERTIES']['oldprice']['VALUE'], 0, ',', ' ');?>
                        </div>
                    <?endif;?>
                    <div class="card_car_new_price">
                        <?=number_format($arResult['DISPLAY_PROPERTIES']['price']['VALUE'], 0, ',', ' ');?> ₽
                    </div>

                    <? $time = time(); ?>
                    <?if($time < 1577836799):?>
                        <?if($arResult['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Воронеж'):?>
                            <div class="car_item_persent">Рассрочка 0%*</div>
                        <?endif;?>
                    <?endif;?>
                </div>
                <div class="card_car_price_car_right">
                    <a href="javascript:void(0);"
                       onclick="show_popupTest('<?=str_replace(["'"], '', $arResult['NAME']);?> <?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?>', <?=$arResult['DISPLAY_PROPERTIES']['filial']['VALUE'];?>)"
                       class="red_btn">
                        <?//=(CITY_NAME == 'Воронеж' || CITY_NAME == 'Санкт-Петербург')? "Купить онлайн":"Рассчитать trade-in"?> <?// Олег: БЫЛО заменил название кнопки в зависимости от города?>
                        Рассчитать trade-in<?// Олег: СТАЛО одно название кнопки на все города?>
                    </a>
                    <a href="javascript:void(0);"
                       onclick="show_popup('<?=str_replace(["'"], '', $arResult['NAME']);?> <?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?>', <?=$arResult['DISPLAY_PROPERTIES']['filial']['VALUE'];?>);"
                       class="white_btn">Рассчитать кредит</a>
                </div>
            </div>
            <!-- <p class="car_card-red-text">скидка распространяется при покупке автомобиля в кредит</p> -->
            <div class="card_car_map">
                <div class="card_car_map_title">Где можно осмотреть авто</div>
                <span><?=$arResult['FILIAL'][0]['NAME'];?>,<br/>
                        тел <a href="tel:<?=$arResult['FILIAL'][0]['PROPERTY_PHONE_VALUE'];?>" style="color: #ea1e26">
                        <?=$arResult['FILIAL'][0]['PROPERTY_PHONE_VALUE'];?></a><br/>
                        <?=$arResult['FILIAL'][0]['PROPERTY_ADDRESS_VALUE'];?></span>
                <?
                if(isset($arResult['FILIAL'][0]['PROPERTY_COORD_VALUE'])):
                    $coord = $arResult['FILIAL'][0]['PROPERTY_COORD_VALUE'];
                    $coord = explode(',', $coord);
                    $city = '';
                    if(isset($arResult['FILIAL'][0]['PROPERTY_CITY_VALUE'])){
                        $city = $arResult['FILIAL'][0]['PROPERTY_CITY_VALUE'] . ', ';
                    }
                    ?>

                    <? $sub = array_shift((explode(".",$_SERVER['HTTP_HOST']))); ?>

                    <div onclick="return false;" style="cursor:unset" class="map<? if( $sub == 'spb' ) { ?> map-spb<? } ?><? if( $sub == 'belgorod' ){ ?> map-bel<? } ?>"></div>

                <?endif;?>
            </div>
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
