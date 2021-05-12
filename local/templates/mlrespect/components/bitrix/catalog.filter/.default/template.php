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
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="https://<?=CITY_DOMAIN;?>/car/" method="get">

<?if($APPLICATION->GetCurPage(false) !== '/'):?>
<div class="search_car_box">
    <div class="container">
<?endif;?>

        <div class="search_car">
            <select name="arrFilter_pf[brand]" class="select_auto" id="catFilterBrand">
                <option selected="selected" value="">Марка</option>
                <?$APPLICATION->IncludeFile(SITE_DIR . 'inc/brands.php',  Array(), Array(
                    'MODE' => 'php'
                ));?>
            </select>
            <select name="arrFilter_pf[model]" class="select_model" id="catFilterModel">
                <option selected="selected" value="">Модель</option>
            </select>
            <select name="arrFilter_pf[transmission]" class="select_trans">
                <option selected="selected" value="">Коробка передач</option>
                <option value="Автомат">Автомат</option>
                <option value="Механика">Механика</option>
                <option value="Вариатор">Вариатор</option>
                <option value="Робот">Робот</option>
            </select>
            <a href="javascript:void(0);" class="btn_search_car all_param_btn">Все параметры</a>
            <select name="arrFilter_pf[year][LEFT]" class="select_year_from" id="catFilterYearLeft">
                <option selected="selected" value="">Год от</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
            </select>
            <select name="arrFilter_pf[year][RIGHT]" class="select_year_to" id="catFilterYearRight">
                <option selected="selected" value="">до</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
            </select>
            <input type="text" class="price_from only_d" name="arrFilter_pf[price][LEFT]" id="catFilterPriceLeft" placeholder="Цена от">
            <input type="text" class="price_to only_d" name="arrFilter_pf[price][RIGHT]" id="catFilterPriceRight" placeholder="до, ₽">
            <input type="hidden" name="set_filter" value="Y" />
            <button type="submit" class="btn_search_car">Найти</button>
        </div>
<?if($APPLICATION->GetCurPage(false) !== '/'):?>
    </div>
</div>
<?endif;?>
</form>
<?//Олег: список разделов (откат)?>
<? if($APPLICATION->GetCurPage(false) !== '/'):?>
    <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "car.brand.list", Array(
        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "A",	// Тип кеширования
        "COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
        "FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
        "IBLOCK_ID" => "1",	// Инфоблок
        "IBLOCK_TYPE" => "cars",	// Тип инфоблока
        // Олег: передаю код раздела в компонент
        "SECTION_CODE" => $arParams["SELECTED_SECTION_CODE"],	// Код раздела
        "SECTION_FIELDS" => array(	// Поля разделов
            0 => "NAME",
            1 => "DESCRIPTION",
        ),
        "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
        "SECTION_URL" => "/car/#SECTION_CODE_PATH#/",	// URL, ведущий на страницу с содержимым раздела

        "SECTION_USER_FIELDS" => array(	// Свойства разделов
            0 => "UF_SPB_TITLE",
            1 => "UF_SPB_DESCRIPTION",
            2 => "UF_BELGOROD_TITLE",
            3 => "UF_BELG_DESCRIPTION",
            4 => "UF_VORON_TITLE",
            5 => "UF_VORON_DESCRIPTION",
            6 => "UF_SEO_BEL_TITLE",
            7 => "UF_SEO_VOR_TITLE",
            8 => "UF_SEO_SPB_TITLE",
        ),
        "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
        "TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
        "VIEW_MODE" => "LINE",	// Вид списка подразделов
    ),
        false
    );?>
<?endif;?>

