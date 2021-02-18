<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Адреса салонов МОТОР ЛЕНД респект");
$APPLICATION->SetTitle("Адреса салонов МОТОР ЛЕНД");
include($_SERVER['DOCUMENT_ROOT'] . '/inc/cities.php');
global $arrFilter;
$arrFilter = array('ACTIVE' => 'Y', 'PROPERTY_hide_address_VALUE' => false);
if(CITY_NAME == 'Санкт-Петербург'){
	$SORT_BY1 = 'PROPERTY_CITY_VALUE';
	$SORT_ORDER1 = 'DESC';
}
if(CITY_NAME == 'Белгород'){
	$SORT_BY1 = 'PROPERTY_CITY_VALUE';
	$SORT_ORDER1 = 'ASC';
}
if(CITY_NAME == 'Воронеж'){
	$SORT_BY1 = 'SORT';
	$SORT_ORDER1 = 'ASC';
}
?>

<h1>Контакты</h1>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"filials", 
	array(
		"COMPONENT_TEMPLATE" => "filials",
		"IBLOCK_TYPE" => "filials",
		"IBLOCK_ID" => "4",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => $SORT_BY1,
		"SORT_ORDER1" => $SORT_ORDER1,
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "address",
			1 => "phone",
			2 => "email",
			3 => "CITY",
			4 => "coord",
			5 => "hide_address",
			6 => "",
		),
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
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
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?$APPLICATION->AddHeadScript('//api-maps.yandex.ru/2.1/?lang=ru_RU');// Олег: перенес сюда из футера подключение карты ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>