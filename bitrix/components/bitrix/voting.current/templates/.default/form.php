<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent(
	"bitrix:voting.form", 
	".default", 
	Array(
		"VOTE_ID" => $arResult["VOTE_ID"],
        "VOTE_ASK_CAPTCHA" => $arParams["VOTE_ASK_CAPTCHA"],
		"VOTE_RESULT_TEMPLATE" => $arResult["VOTE_RESULT_TEMPLATE"],
		"ADDITIONAL_CACHE_ID" => $arResult["ADDITIONAL_CACHE_ID"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	),
	($this->__component->__parent ? $this->__component->__parent : $component)
);
?>
