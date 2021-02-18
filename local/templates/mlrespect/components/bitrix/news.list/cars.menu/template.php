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
$arParams = array("replace_space"=>"-","replace_other"=>"-");
?>
<?if(!empty($arResult['ITEMS'])):?>
    <div class="submenu submenu__wrapper">
        <ul class="submenu__custom">
            <?foreach($arResult['ITEMS'] as $arElement):?>
                <li><a href="/car/<?=urlencode(Cutil::translit($arElement['CODE'],"ru",$arParams))?>/"><?=$arElement['NAME']?><i style="background-image: url('<?=$arElement['DISPLAY_PROPERTIES']['LOGO']['FILE_VALUE']['SRC']?>');"></i></a>
                </li>
            <?endforeach;?>
        </ul>


        <?
        // Олег:добавил спецпердложения и фильтрацию по пользовательским свойствам с датами акции
        $today  = date('Y-m-d 00:00:00');
        $GLOBALS['arrSpecialMenuFilter'] = array("PROPERTY"=>array("special"=>"1", "city"=>CITY_NAME,"<=special_date_start"=>$today,">=special_date_end"=>$today ));
        //$GLOBALS['arrSpecialMenuFilter'] = array("PROPERTY"=>array("special"=>"1", "city"=>"Воронеж","<=special_date_start"=>$today,">=special_date_end"=>$today ));

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "cars.menu.special",
            array(
                "COMPONENT_TEMPLATE" => "cars.menu.special",
                "IBLOCK_TYPE" => "cars",
                "IBLOCK_ID" => "1",
                "NEWS_COUNT" => "6",
                "SORT_BY1" => "ID",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "arrSpecialMenuFilter",
                "FIELD_CODE" => array(
                    0 => "ID",
                    1 => "CODE",
                    2 => "NAME",
                    3 => "",
                ),
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
                    16 => "special",
                    17 => "oldprice",
                    18 => "city",
                    19 => "seller",
                    20 => "phone",
                    21 => "address",
                    22 => "state",
                    23 => "img",
                    24 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "/car/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "STRICT_SECTION_CHECK" => "N",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => "",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ),
            false
        );?>
    </div>
<?endif;?>