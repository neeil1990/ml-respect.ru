<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "car.model.list", Array(
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
    "SECTION_CODE" => $_GET['brand'],	// Код раздела
    "SECTION_FIELDS" => array(	// Поля разделов
        0 => "NAME",
        1 => "",
    ),
    "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
    "SECTION_URL" => "/car/#SECTION_CODE_PATH#",	// URL, ведущий на страницу с содержимым раздела
    "SECTION_USER_FIELDS" => array(	// Свойства разделов
        0 => "",
        1 => "",
    ),
    "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
    "TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
    "VIEW_MODE" => "LINE",	// Вид списка подразделов
),
    false
);?>