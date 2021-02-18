<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестовая страница - {city}");
?><?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumbs",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?><?php 

$title = $APPLICATION->GetTitle();

$new = str_replace("{city}", CITY_NAME, $title);

$APPLICATION->SetTitle($new);

 ?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>