<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

$page = $APPLICATION->GetCurPage();
$page = explode('/', $page);

include($_SERVER['DOCUMENT_ROOT'] . '/inc/cities.php');

?>

<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
<?$APPLICATION->ShowHead();?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?// Oлег: noindex, follow для всех страниц у которых есть пагинация ?>
<? if ($_GET['PAGEN_1'] || $_GET['SIZEN_1'] || $_GET['SHOWALL_1'] || $_GET['arrFilter'] || $_GET['sortBy'] || $_GET['brand'] || $_GET['p-to'] || $_GET['sort-by'] || $_GET['sort'] || strrpos($_SERVER['REQUEST_URI'],'?')!==false) { ?>
<?$APPLICATION->SetPageProperty("robots", "noindex, follow");?>
<?} else {?>
<?$APPLICATION->SetPageProperty("robots", "index, follow");?>
<?}?>


    <title><?$APPLICATION->ShowTitle();?>
	</title>
	<link rel="shortcut icon" type="image/x-icon" href="https://ml-respect.ru/favicon.ico" />
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/jquery-ui.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/normalize.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/slick.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/slick-theme.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/jquery.fancybox.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/font.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/fotorama.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/jQuery.Brazzers-Carousel.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/nice-select.min.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/style.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/custom.css');?>

	<?$pos2 = stripos($APPLICATION->GetCurPage(), '/car/');?>
	<?if ($pos2 === false) {?>
		<link rel="canonical" href="https://<?=$_SERVER["SERVER_NAME"];?><?if ($APPLICATION->GetCurPage() != '/') {?><?=$APPLICATION->GetCurPage();?><?}else{echo '/';}?>"/>

		<meta property="og:title" content="<?$APPLICATION->ShowTitle();?>"/>
	<?/*<meta property="og:description" content="<? $APPLICATION->ShowMeta("description") ?>"/>*/?>
		<meta property="og:image" content="/upload/bg_form_wrap1.jpg"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content= "https://<?=$_SERVER["SERVER_NAME"];?><?if ($APPLICATION->GetCurPage() != '/') {?><?=$APPLICATION->GetCurPage();?><?}?>" />

	<?}?>

<?// Олег: добавил Google Tag?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TGXX5RL');</script>
<!-- End Google Tag Manager -->


    <?if($page[1] == 'car'):?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-569ZK6V');</script>
    <!-- End Google Tag Manager -->
    <? endif; ?>
</head>
<body class="<?=$BODY_CSS;?>">

    <?// Олег: добавил  Tag Manager?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGXX5RL"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?if($page[1] == 'car'):?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-569ZK6V"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <? endif; ?>

    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
    </div>

	<div class="wrapper">
<?if(CITY_NAME == 'Санкт-Петербург'):?>
           <header class="header">
			<div class="container clearfix">
                <a href="/" class="logo">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/logo.svg" alt="<?$APPLICATION->ShowTitle();?>" />
                </a>
                <div class="logo_text logo_text_piter">Покупка и продажа автомобилей:<br/> с пробегом и новых</div>
				<div class="phone_piter" style="margin-top: 15px;">
        <!-- <a href="tel:+78124248351" onclick="fbq('track', 'Contact');">+7 812 424 83 51</a>-->
        <span>#WF_TIME_WORK#</span>
    </div>
    			<!-- <div class="address_piter">Санкт-Петербург,<br> Ириновский пр-кт, д. 10, лит. А</div> -->
				<div class="select_city clearfix">
                    <select name="select_city" id="citySelect" onchange="changeCity(this);">
                        <option value="http://<? echo CITY_ALIAS_VRN;?>" <?=(CITY_NAME == 'Воронеж') ? 'selected="selected"' : ''?>>Воронеж</option>
                        <option value="http://<? echo CITY_ALIAS_BLG;?>" <?=(CITY_NAME == 'Белгород') ? 'selected="selected"' : ''?>>Белгород</option>
                        <option value="http://<? echo CITY_ALIAS_SPB;?>" <?=(CITY_NAME == 'Санкт-Петербург') ? 'selected="selected"' : ''?>>Санкт-Петербург</option>
                    </select>
                    <a href="/contacts/" class="white_btn">Контакты салонов</a>
                </div>
                <div class="call_back">
					<a href="javascript:void(0);" class="red_btn" onClick="window.Calltouch.Callback.onClickCallButton(); yandexGoal('CALL'); return true;">Заказать звонок</a>
                </div>
			</div>
		</header>
<?//Олег: шпака во всех городах такая как в питере?>
<?elseif(CITY_NAME == 'Воронеж'):?>
           <header class="header">
            <div class="container clearfix">
                <a href="/" class="logo">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/logo.svg" alt="<?$APPLICATION->ShowTitle();?>" />
                </a>
                <div class="logo_text logo_text_piter">Покупка и продажа автомобилей:<br/> с пробегом и новых</div>
                <div class="phone_piter" style="margin-top: 15px;">
       <!-- <a href="tel:+74732122565" onclick="fbq('track', 'Contact');">+7 473 212-25-65</a>-->
        <span>#WF_TIME_WORK#</span>
    </div>

				<div class="select_city clearfix">
                    <select name="select_city" id="citySelect" onchange="changeCity(this);">
                        <option value="http://<? echo CITY_ALIAS_VRN;?>" <?=(CITY_NAME == 'Воронеж') ? 'selected="selected"' : ''?>>Воронеж</option>
                        <option value="http://<? echo CITY_ALIAS_BLG;?>" <?=(CITY_NAME == 'Белгород') ? 'selected="selected"' : ''?>>Белгород</option>
                        <option value="http://<? echo CITY_ALIAS_SPB;?>" <?=(CITY_NAME == 'Санкт-Петербург') ? 'selected="selected"' : ''?>>Санкт-Петербург</option>
                    </select>
                    <a href="/contacts/" class="white_btn">Контакты салонов</a>
                </div>
                <div class="call_back">
                    <a href="javascript:void(0);" class="red_btn" onClick="window.Calltouch.Callback.onClickCallButton(); yandexGoal('CALL'); return true;">Заказать звонок</a>
                </div>
            </div>
        </header>
<?elseif(CITY_NAME == 'Белгород'):?>
           <header class="header">
            <div class="container clearfix">
                <a href="/" class="logo">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/logo.svg" alt="<?$APPLICATION->ShowTitle();?>" />
                </a>
                <div class="logo_text logo_text_piter">Покупка и продажа автомобилей:<br/> с пробегом и новых</div>
                <div class="phone_piter" style="margin-top: 15px;">
        <!-- <a href="tel:+7 4722599749" onclick="fbq('track', 'Contact');">+7 4722 59-97-49</a> -->
        <span>Работаем с 9:00 до 20:00</span>
    </div>
				<div class="select_city clearfix">
                    <select name="select_city" id="citySelect" onchange="changeCity(this);">
                        <option value="http://<? echo CITY_ALIAS_VRN;?>" <?=(CITY_NAME == 'Воронеж') ? 'selected="selected"' : ''?>>Воронеж</option>
                        <option value="http://<? echo CITY_ALIAS_BLG;?>" <?=(CITY_NAME == 'Белгород') ? 'selected="selected"' : ''?>>Белгород</option>
                        <option value="http://<? echo CITY_ALIAS_SPB;?>" <?=(CITY_NAME == 'Санкт-Петербург') ? 'selected="selected"' : ''?>>Санкт-Петербург</option>
                    </select>
                    <a href="/contacts/" class="white_btn">Контакты салонов</a>
                </div>
                <div class="call_back">
                    <a href="javascript:void(0);" class="red_btn" onClick="window.Calltouch.Callback.onClickCallButton(); yandexGoal('CALL'); return true;">Заказать звонок</a>
                </div>
            </div>
        </header>
<?//Олег: шпака во всех городах такая как в питере КОНЕЦ?>

<?else:?>
	<header class="header">
			<div class="container clearfix">
                <a href="/" class="logo">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/logo.svg" alt="<?$APPLICATION->ShowTitle();?>" />
                </a>
                <div class="logo_text">Покупка и продажа автомобилей:<br/> с пробегом и новых</div>
                <div class="select_city clearfix">
                    <select name="select_city" id="citySelect" onchange="changeCity(this);">
                        <option value="http://<? echo CITY_ALIAS_VRN;?>" <?=(CITY_NAME == 'Воронеж') ? 'selected="selected"' : ''?>>Воронеж</option>
                        <option value="http://<? echo CITY_ALIAS_BLG;?>" <?=(CITY_NAME == 'Белгород') ? 'selected="selected"' : ''?>>Белгород</option>
                        <option value="http://<? echo CITY_ALIAS_SPB;?>" <?=(CITY_NAME == 'Санкт-Петербург') ? 'selected="selected"' : ''?>>Санкт-Петербург</option>
                    </select>
                    <a href="/contacts/" class="white_btn">Адреса салонов</a>
                </div>
                <div class="call_back">
                    <a href="javascript:void(0);" class="red_btn" onClick="window.Calltouch.Callback.onClickCallButton(); yandexGoal('CALL'); return true;">Заказать звонок</a>
                </div>
			</div>
		</header>
<?endif;?>

        <nav>
            <div class="container clearfix">
                <a href="/" class="logo_fixed"><img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/logo_fixed.svg" alt=""></a>
                <a href="javascript: void(0);" class="mobile-btn">
                    <span class="mobile-btn-line mobile-btn-line1"></span>
                    <span class="mobile-btn-line mobile-btn-line2"></span>
                    <span class="mobile-btn-line mobile-btn-line3"></span>
                </a>
                <ul class="top_menu">

					<? if(CITY_NAME == 'Санкт-Петербург'): ?>
					<li><a class="a_level_1" href="/redemption/">Выкуп</a></li>
					<? endif; ?>

                    <li class="li_sub 1">
                        <a class="a_level_1 white-btn" href="/car/">Купить<span class="sub"></span></a>

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "cars.menu",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "N",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "N",
                                "DISPLAY_NAME" => "N",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array("ID","NAME","PREVIEW_PICTURE","CODE"),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => "7",
                                "IBLOCK_TYPE" => "marks",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "30",
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
                                "PROPERTY_CODE" => array("LOGO",""),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SORT_BY1" => "NAME",
                                "SORT_BY2" => "NAME",
                                "SORT_ORDER1" => "ASC",
                                "SORT_ORDER2" => "ASC",
                                "STRICT_SECTION_CHECK" => "N"
                            )
                        );?>
                    </li>

                    <li class="li_sub">
                        <a href="/prodat-avtomobil/" class="a_level_1">Продать<span class="sub"></span></a>
                        <ul class="submenu">
                            <li><a href="/ocenka-avto/">Оценка авто</a></li>
                            <li><a href="/obmen-avtomobilya/">Обмен / TRADE-IN</a></li>
                            <li><a href="/komissionnaya-prodazha/">Комиссионная продажа</a></li>
                        </ul>
                    </li>
                    <li class="li_sub">
                        <a class="a_level_1" href="javascript:void(0);">Услуги<span class="sub"></span></a>
                        <ul class="submenu">
                            <li><a href="/special/">Спецпредложения</a></li>
                            <li><a href="/avto-v-kredit/">Кредитование</a></li>
                            <li><a href="/insurance/">Страхование</a></li>
                        </ul>
                    </li>
                    <li class="li_sub">
                        <a class="a_level_1" href="javascript:void(0);">Компания<span class="sub"></span></a>
                        <ul class="submenu">
                            <li><a href="/about/">О компании</a></li>
                            <!--<li><a href="/news/">События</a></li>-->
                            <li><a href="/loyalty/">Программа лояльности</a></li>
                        </ul>
                    </li>
					<?/*if(CITY_NAME == 'Белгород'):?>
						<li><a class="a_level_1" href="/sale-car/">Выкуп авто</a></li>
					<?endif;*/?>
                    <li><a class="a_level_1" href="/novye-avto/">Новые автомобили</a></li>
                    <li><a class="a_level_1" href="/blog/">Полезная информация</a></li>
					<li><a class="a_level_1" href="/contacts/">Контакты салонов</a></li>
                </ul>
            </div>
        </nav>

        <?if($page[1] != 'ocenka-avto' && $page[1] != 'ocenka-test'):?>

        <?$sliderFilter = array( "PROPERTY_city_of_slide_VALUE" => CITY_NAME ); ?>
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "sliders1", Array(
	    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "DETAIL_TEXT",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "sliderFilter",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "2",	// Код информационного блока
		"IBLOCK_TYPE" => "slider",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "page_link", // Олег: добавил свойство для ссылки
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
		"COMPONENT_TEMPLATE" => "sliders"
	),
	false
);?>

        <? endif; ?>

        <?if($page[1] == 'car'):?>

            <?
            preg_match('/\\/filter\\/(.*?)\\/apply\\//', $APPLICATION->GetCurPage(), $SMART_FILTER_PATH);
            $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "cars", Array(
                "CACHE_GROUPS" => "Y",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "36000000",
                "DISPLAY_ELEMENT_COUNT" => "N",	// Показывать количество
                "FILTER_NAME" => "arrFilterCar",
                "FILTER_VIEW_MODE" => "horizontal",	// Вид отображения
                "IBLOCK_ID" => "1",
                "IBLOCK_TYPE" => "cars",
                "PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
                "POPUP_POSITION" => "left",
                "SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
                "SECTION_CODE" => "",	// Код раздела
                "SECTION_DESCRIPTION" => "-",	// Описание
                "SECTION_ID" => "",	// ID раздела инфоблока
                "SECTION_TITLE" => "-",	// Заголовок
                "SEF_MODE" => "Y",
                "TEMPLATE_THEME" => "",	// Цветовая тема
                "XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
                "SHOW_ALL_WO_SECTION" => "Y",
                "COMPONENT_TEMPLATE" => "",
                "SEF_RULE" => "/car/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
                "SECTION_CODE_PATH" => "/car/#SECTION_CODE_PATH#/",	// Путь из символьных кодов раздела
                "SMART_FILTER_PATH" => $SMART_FILTER_PATH[1],	// Блок ЧПУ умного фильтра
            ),
                false
            );?>


            <?
            if($page[4] == ''): // Олег: проверяем или указана модель (откачено)
            ?>

                <?$fmodel = $_GET['arrFilter_pf']['brand'];?>
                <?if(!$_GET['arrFilter_pf']['brand'] && $page[2] != ''){$fmodel=$page[2]; } ?>

                <div class="breadcrumbs_wrap">
                    <div class="container">
                        <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs">
                            <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" title="Главная"  href="/">
                                    <span itemprop="name">Респект</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </li>
                            <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" title="Авто с пробегом"  href="javascript:void(0);">
                                    <span itemprop="name">Авто с пробегом</span>
                                    <meta itemprop="position" content="2">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="title_filter">
                    <div class="container clearfix">
                        <?// Олег: добавил ксловие для вывода заголовка из раздела если он указан ?>
                        <?if($SECTION_SEO_TEXT['SECTION']['UF_SEO_TITLE']):?>
                            <h1 class="title"><?=$SECTION_SEO_TEXT['SECTION']['UF_SEO_TITLE']?></h1>
                        <?else:?>
                        <h1 class="title"> Каталог автомобилей <?if (!$fmodel) {} else {?> <?=ucfirst($fmodel);?> <?}?>с пробегом</h1>
                        <?endif;?>
                        <div class="filter clearfix">
                            <select id="sortBy" class="filter_price">
                                <option value="DATE_DESC">Дате</option>
                                <option <?if(isset($_GET['sortBy']) && $_GET['sortBy'] == 'PRICE_ASC')
                                {echo 'selected="selected"';}?> value="PRICE_ASC">Цене (дешевле — дороже)</option>
                                <option <?if(isset($_GET['sortBy']) && $_GET['sortBy'] == 'PRICE_DESC')
                                {echo 'selected="selected"';}?> value="PRICE_DESC">Цене (дороже — дешевле)</option>
                            </select>
                        </div>
                        <span class="sort_by">Сортировать по</span>
                    </div>
                </div>

            <? endif; ?>

        <?else:?>

            <?if($APPLICATION->GetCurPage(false) !== '/'):?>
                <?if($page[1] != 'ocenka-avto' && $page[1] != 'ocenka-test' && $page[1] != 'special'):?>

                <div class="content">
                <div class="container">

                    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumbs", Array(
                        "COMPONENT_TEMPLATE" => "universal",
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => "s1",
                    ),
                        false
                    );?>

                <?endif;?>
            <?endif;?>

        <?endif;?>
