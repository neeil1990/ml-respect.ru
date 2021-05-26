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

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
<?if($APPLICATION->GetCurPage(false) !== '/'):?>
<div class="search_car_box">
    <div class="container">
        <?endif;?>

    <div class="search_car">

        <?foreach($arResult["HIDDEN"] as $arItem):?>
            <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
        <?endforeach;?>

        <?
        foreach($arResult["ITEMS"] as $key=>$arItem)
        {
            if(
                empty($arItem["VALUES"])
                || isset($arItem["PRICE"])
            )
                continue;

            if (
                $arItem["DISPLAY_TYPE"] == "A"
                && (
                    $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
                )
            )
                continue;
            ?>

            <?
            $arCur = current($arItem["VALUES"]);
            switch ($arItem["DISPLAY_TYPE"])
            {
                case "B"://NUMBERS
                    ?>
                    <input
                            placeholder="Цена от"
                            class="min-price price_from"
                            type="text"
                            name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                            size="5"
                            onkeyup="smartFilter.keyup(this)"
                    />

                    <input
                            placeholder="до, ₽"
                            class="max-price price_to"
                            type="text"
                            name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                            size="5"
                            onkeyup="smartFilter.keyup(this)"
                    />

                    <?
                    break;
                case "P"://DROPDOWN
                    $arAllDropDown = [];
                    foreach ($arItem["VALUES"] as $val => $ar){
                        $arAllDropDown['NAME'] = $ar['CONTROL_NAME_ALT'];
                        $arAllDropDown['ID'] = 'all_' . $ar['CONTROL_NAME'];
                    }
                    ?>
                    <select name="" onchange="$(this).closest('.search_car').find('#' + $(this).val()).click();" class="<?=$arItem['FILTER_HINT']?>">
                        <option value="<?=$arAllDropDown['ID']?>" selected="selected"><?=$arItem['NAME']?></option>
                        <?foreach ($arItem["VALUES"] as $val => $ar):?>
                            <option value="<?=$ar["CONTROL_NAME"]?>"><? echo $ar["VALUE"] ?></option>
                        <?endforeach?>
                    </select>

                    <input style="display: none" type="radio" name="<?=$arAllDropDown['NAME']?>" id="<?=$arAllDropDown['ID']?>" value="" onclick="smartFilter.keyup(this)" />
                    <?foreach ($arItem["VALUES"] as $val => $ar): ?>
                        <input style="display: none" type="radio" name="<?=$ar['CONTROL_NAME_ALT']?>" id="<?=$ar['CONTROL_NAME']?>" value="<?=$ar['HTML_VALUE_ALT']?>" onclick="smartFilter.keyup(this)" />
                    <?endforeach?>
                    <?
                    break;
            }
        }
        ?>

        <button
                class="btn_search_car"
                type="submit"
                id="set_filter"
                name="set_filter"
                value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
        >Найти</button>

        <div id="modef" style="display: none">
            <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
            <a href="<?echo $arResult["FILTER_URL"]?>" target="" class="btn_search_car"><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
        </div>
    </div>

<?if($APPLICATION->GetCurPage(false) !== '/'):?>
    </div>
</div>
<?endif;?>
</form>

<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>

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

    <?
    $model = explode('/', $arResult['FORM_ACTION'])[2];
    if($model):
    ?>

    <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "car.models.list", Array(
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
        "SECTION_CODE" => $model,	// Код раздела
        "SECTION_FIELDS" => array(	// Поля разделов
            0 => "NAME",
            1 => "DESCRIPTION",
        ),
        "SECTION_ID" => "",	// ID раздела
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
        "TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
        "VIEW_MODE" => "LINE",	// Вид списка подразделов
    ),
        false
    );?>

    <? endif; ?>

<?endif;?>
