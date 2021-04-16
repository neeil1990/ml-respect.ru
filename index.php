<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "Купить недорого авто с пробегом в автосалоне МОТОР ЛЕНД в Воронеже");
$APPLICATION->SetPageProperty("description", "В автосалоне МОТОР ЛЕНД в Воронеже можно купить автомобиль с пробегом в кредит");
$BODY_CSS = 'main_wrap';
$APPLICATION->SetTitle("Главная");
include($_SERVER['DOCUMENT_ROOT'] . '/inc/cities.php');
$GLOBALS['arrFilterSpecial'] = array('PROPERTY_SPECIAL_VALUE' => 'Да', 'PROPERTY_CITY' => CITY_NAME);
$GLOBALS['arrFilterNEW'] = array('PROPERTY_SPECIAL_VALUE' => false, 'PROPERTY_CITY' => CITY_NAME);
?><div class="car_buy">
	<div class="container">
		<div class="car_buy_left">
			<div class="car_buy_title">
				 Купить автомобиль с пробегом
			</div>
			<div class="car_buy_desc">
				 Недорого приобрести проверенный<br>
				 подержанный&nbsp;автомобиль без рисков
			</div>
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
            <a href="/car/" class="car_buy_btn">Посмотреть автомобили с пробегом</a>
		</div>
		<div class="car_buy_right">
            <a href="/ocenka-avto/" class="car_buy_red car_ico1">Оценка авто</a>
            <a href="/obmen-avtomobilya/" class="car_buy_red car_ico2">Обмен / TRADE-IN</a>
            <a href="/komissionnaya-prodazha/" class="car_buy_red car_ico3">Комиссионная продажа</a>
		</div>
	</div>
</div>
<div class="credit">
	<div class="container">
		<div class="credit_left">
			<div class="credit_title">
				 Кредитование
			</div>
			<div class="credit_desc">
				 Выберите самый выгодный кредит<br>
				 на&nbsp;покупку авто онлайн
			</div>
            <a href="/avto-v-kredit/" class="red_btn">О кредитовании</a>
		</div>
		<div class="credit_right">
			<div class="credit_title">
				 Страхование
			</div>
			<div class="credit_desc">
				 Выгодно застрахуйте свой автомобиль.<br>
				 Мы подберем лучшее предложение
			</div>
            <a href="/insurance/" class="red_btn">О страховании</a>
		</div>
	</div>
</div>
<div class="auto_in_stock">
	<div class="container">
		<div class="auto_in_stock_box clearfix">
			<div class="auto_in_stock_title">
				 Автомобили с пробегом в наличии
			</div>
			<div class="car_list">

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
				 <?/*$APPLICATION->IncludeFile(
                        SITE_DIR . 'inc/brands_home.php',
                        array(),
                        array(
                            'MODE' => 'php'
                        )
                    )*/?>
			</div>
			 <?$APPLICATION->IncludeComponent(
            	"bitrix:catalog.filter",
            	"",
            	Array(
            		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            		"CACHE_TIME" => $arParams["CACHE_TIME"],
            		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
            		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
            		"FILTER_NAME" => $arParams["FILTER_NAME"],
            		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
            		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
            		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"]
            	),
            $component
            );?>
		</div>
	</div>
</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"cars.home.special",
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
		"COMPONENT_TEMPLATE" => "cars.home.special",
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
		"FILTER_NAME" => "arrFilterSpecial",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "cars",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
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
			16 => "special",
			17 => "oldprice",
			18 => "img",
			19 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "PROPERTY_date",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>

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
<div class="main_content">
	<div class="container">
		<div class="main_content_left">
            #WF_SEO_TEXT_1#
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
			<?/*<div class="social_box">
				<div class="social_box_left">
					 Следите за нашими<br>
					 спецпредложениями в&nbsp;соцсетях:
				</div>
			<div class="social_box_right">
                <a href="https://www.instagram.com/motorland_respect/" class="inst social"></a>
                <a href="https://vk.com/club112420582" class="vk social"></a>
                <a href="https://www.facebook.com/motorlandrespekt/" class="fb social"></a>
			</div>
			</div>*/?>
		</div>
	</div>
</div>
 <br><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
