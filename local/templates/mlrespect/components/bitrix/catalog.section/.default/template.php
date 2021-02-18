<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
?>

<div class="breadcrumbs_wrap" style="margin-top: 50px;">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#">Респект</a></li>
            <li><a href="#">Авто с пробегом</a></li>
        </ul>
    </div>
</div>
       
<div class="title_filter">
    <div class="container clearfix">
        <div class="title">Каталог автомобилей с пробегом</div>
        <div class="filter clearfix">
            <select name="" class="filter_price">
                <option value="По убыванию">Цене (дешевле — дороже)</option>
                <option value="По возрастанию">Цене (дороже — дешевле)</option>
                <option value="По возрастанию">Дате</option>
            </select>
        </div>
        <span class="sort_by">Сортировать по</span>
    </div>
</div>

<div class="catalog_cars">
    <div class="container">
        <div class="cars">
            <?foreach($arResult['ITEMS'] as $arElement):?>
            <a href="<?=$arElement["DETAIL_PAGE_URL"];?>" class="car_item">
                <div class="car_item_img car_item_img_slider">
                    <pre>
                    <?var_export($arElement['PROPERTIES']['img'])?>
                    </pre>
                    <!--<img src="assets/img/car1.png" alt="">-->
                </div>
                <div class="car_item_text">
                    <div class="car_item_name"><?=$arElement['NAME'];?></div>
                    <div class="car_item_desc">2000, АКПП, 141 л.с., 102 000 км</div>
                    <span class="btn_fav"></span>
                    <div class="car_item_price">
                        <div class="car_item_price_val">1 295 000 ₽</div>
                        <div class="car_item_price_text">Можно<br/> в кредит</div>
                    </div>
                    <div class="car_item_date clearfix">
                        <div class="car_item_date_left">Воронеж</div>
                        <div class="car_item_date_right">
                            <p>Добавлен <span>26.04.2018</span></p>
                        </div>
                    </div>
                </div>
            </a>
            <?endforeach;?>
        </div>
    </div>
</div>

<pre><?var_export($arResult['ITEMS']);?></pre>