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
global $SEO_TEXT;
global $SECTION_SEO_TEXT;
?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="catalog_cars">
    <div class="container">
        <div class="cars">
            <?foreach($arResult['ITEMS'] as $arElement):?>
            <a href="<?=$arElement["DETAIL_PAGE_URL"];?>" class="car_item">
                <div class="car_item_img car_item_img_slider <?=($arElement['DISPLAY_PROPERTIES']['CITY_LIST']['VALUE'] == 'Белгород') ? 'bimage' : 'bimage'?>">
                    <?foreach($arElement['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img): if($idx > 4) break;?>
                    <img src="<?=$img['SRC']?>" alt="<?=$arElement['NAME'];?>" loading="lazy" width="358" height="200" />
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
                        <div class="car_item_price_val">
                            <?=number_format($arElement['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ');?> ₽
                        </div>
                        <!--<div class="car_item_price_text">Можно<br/> в кредит</div>-->
                            <? $time = time(); ?>
                            <?if($time < 1577836799):?>
    							<?if($arElement['DISPLAY_PROPERTIES']['CITY_LIST']['VALUE'] == 'Воронеж'):?>
    								<div class="car_item_persent">Рассрочка 0%*</div>
    							<?endif;?>
                            <?endif;?>
                        <?// Олег: Скрыл(закоментил) плашку ВЫГОДА со всех поддоменов для всех машин?>
                        <?/*if(CITY_NAME != 'Санкт-Петербург'): // Олег: добавил условие исключающее плашку из поддомена spb?>
                            <?if($arElement['DISPLAY_PROPERTIES']['CITY_LIST']['VALUE'] == 'Белгород'):?>
                                <div class="car_item_price_action" style="display:none">
                                    <span>Выгода</span>
                                    <?
                                    $dprice = $arElement['DISPLAY_PROPERTIES']['price']['VALUE'];
                                    $percent20 = $arElement['DISPLAY_PROPERTIES']['price']['VALUE'] * 0.2;
                                    $discount = floor((($dprice-$percent20)*0.13872) / 1000) * 1000;
                                    ?>
                                    <b>- <?=number_format($discount, 0, ',', ' ');?> ₽</b>

                                </div>
                            <?endif;?>
                            <?if($arElement['DISPLAY_PROPERTIES']['CITY_LIST']['VALUE'] == 'Санкт-Петербург'):?>
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
                        <?endif; */ // Олег: добавил условие исключающее плашку из поддомена spb конец условия?>
                    </div>
                    <div class="car_item_date clearfix">
                        <?if($arElement['DISPLAY_PROPERTIES']['CITY_LIST']['VALUE']):?>
                        <div class="car_item_date_left"><?=$arElement['DISPLAY_PROPERTIES']['CITY_LIST']['VALUE']?></div>
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
        </div>
    </div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

<div class="main_content">
	<div class="container">
		<div class="main_content_left">
            #WF_SEO_TEXT_1# <? //Олег : вывожу описание раздела ?>
		</div>
		<div class="main_content_right">
			<div class="advantages">
				<div class="advantages_item ico1">
					 Полная исправность<br>
					 всех&nbsp;машин
				</div>
				<div class="advantages_item ico2">
					 Гарантия на все наши<br>
					 автомобили
				</div>
				<div class="advantages_item ico3">
					 Быстрый выкуп авто<br>
					 за&nbsp;30&nbsp;минут
				</div>
				<div class="advantages_item ico4">
					 Бесплатная юридическая<br>
					 поддержка
				</div>
			</div>
			<div class="right_box_services komis">
				<div class="right_box_services_title">
					 Комиссионная продажа
				</div>
				<div class="right_box_services_desc">
					 Доверьте продажу автомобиля профессионалам и&nbsp;обезопасьте себя&nbsp;от&nbsp;возможных неприятностей
				</div>
                <a href="/komissionnaya-prodazha/" class="white_btn">О комиссионной продаже</a>
			</div>
			<div class="right_box_services tradein">
				<div class="right_box_services_title">
					 Trade In
				</div>
				<div class="right_box_services_desc">
					 Вы можете продать нам свой автомобиль, и&nbsp;доплатив разницу, стать обладателем новой&nbsp;б/у&nbsp;машины
				</div>
                <a href="/obmen-avtomobilya/" class="white_btn">Условия Trade In</a>
			</div>
		</div>
	</div>
</div>
<?else:?>
<div class='model_error'>
    <div class="container clearfix">
        <div class='model_error__wrapper'>
            <span class="model_error_title">
                В настоящий момент авто данной марки в каталоге отсутствуют
            </span>
            <span class="model_error_text">
                Но вы можете посмотреть другие авто
            </span>
        </div>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "cars.home",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "cars.home",
        "DETAIL_URL" => "/car/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "ID",
            1 => "CODE",
            2 => "NAME",
            3 => "DATE_CREATE",
            4 => "",
        ),
        "FILTER_NAME" => "arrFilterNEW",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "cars",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "6",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "vin",
            1 => "brand",
            2 => "model",
            3 => "year",
            4 => "price",
            5 => "run",
            6 => "power",
            7 => "color",
            8 => "body",
            9 => "engine",
            10 => "gear",
            11 => "displacement",
            12 => "transmission",
            13 => "steering",
            14 => "equipment",
            15 => "date",
            16 => "city",
            17 => "img",
            18 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "DATE_CREATE",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ),
    false
);?>
<?endif;?>
