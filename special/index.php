<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Выгодные предложения автомобилей с пробегом в автосалоне МОТОР ЛЕНД респект");
$APPLICATION->SetTitle("Спецпредложения");
?>
<div class="content">
	<div class="container" style="padding: 0;">
<div class="breadcrumbs_wrap">
            <div class="container">

					<ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs">
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<a itemprop="item" title="Главная"  href="/">
								<span itemprop="name">Главная</span>
								<meta itemprop="position" content="1">
							</a>
						</li>
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<a itemprop="item" title="Авто с пробегом" href="javascript:void(0);">
								<span itemprop="name">Спецпредложения</span>
								<meta itemprop="position" content="2">
							</a>
						</li>
					</ul>


            </div>
        </div>

        <?/*
        //Олег: заменил загоовок
       <h1>Спецпредложения</h1>*/?>

<h1>Горячие предложения</h1>
</div>
</div>
<?
// Олег: добавил  фильтрацию по пользовательским свойствам с датами акции
$today  = date('Y-m-d 00:00:00');
//$arrFilter=array("PROPERTY"=>array("special"=>"1", "city"=>"Воронеж","<=special_date_start"=>$today,">=special_date_end"=>$today ));//"<=special_date_end"=>$today,"<=special_date_start"=>$today)
$arrFilter=array("PROPERTY"=>array("special"=>"1", "city"=>CITY_NAME,"<=special_date_start"=>$today,">=special_date_end"=>$today ));//"<=special_date_end"=>$today,"<=special_date_start"=>$today)
//$arrFilter=array("PROPERTY"=>array("special"=>"1"));?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"cars.home.special", 
	array(
		"COMPONENT_TEMPLATE" => "cars.home.special",
		"IBLOCK_TYPE" => "cars",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ID",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilter",
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
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
		"DISPLAY_BOTTOM_PAGER" => "Y",
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>