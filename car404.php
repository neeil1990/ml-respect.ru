<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

	$paeExist = CIBlockElement::GetList(
		array(),
		array('IBLOCK_ID' => 6, 'NAME' => $_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage()),
		false,
		false,
		array('NAME', 'ID')
	);
	 $gotItem = $paeExist->Fetch();

	 if($gotItem['NAME'] == $_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage()){

// echo "<pre>";
// print_r($_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage());
// echo "</pre>";
		CHTTP::SetStatus("200");
		@define("ERROR_404","N");
	 }else{

		CHTTP::SetStatus("404 Not Found");
		@define("ERROR_404","Y");
	 }
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "Купить недорого авто с пробегом в автосалоне МОТОР ЛЕНД в Воронеже");
$APPLICATION->SetPageProperty("description", "В автосалоне МОТОР ЛЕНД в Воронеже можно купить автомобиль с пробегом в кредит");
$BODY_CSS = 'main_wrap';
$APPLICATION->SetTitle("Главная");
include($_SERVER['DOCUMENT_ROOT'] . '/inc/cities.php');
$GLOBALS['arrFilterSpecial'] = array('PROPERTY_SPECIAL_VALUE' => 'Да', 'PROPERTY_CITY' => CITY_NAME);
$GLOBALS['arrFilterNEW'] = array('PROPERTY_SPECIAL_VALUE' => false, 'PROPERTY_CITY' => CITY_NAME);

$auto = explode('/', $APPLICATION->GetCurPage());
$mark_auto = ucfirst($auto[2]);
?>

<div class='model_error'>
    <div class="container clearfix">
        <div class='model_error__wrapper'>
            <span class="model_error_title">
                <? if($mark_auto):?>
                    В настоящий момент <h2 style="color: #FFFFFF;font-weight: bold;margin: 0 auto;font-size: 35px;">автомобили <?=$mark_auto?> в каталоге отсутствуют</h2>
                <? else: ?>
                    В настоящий момент авто данной марки в каталоге отсутствуют
                <? endif; ?>
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

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
