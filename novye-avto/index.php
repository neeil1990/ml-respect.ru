<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "В наших салонах Вы можете приобрести новые автомобили. Покупка в кредит на выгодных условиях, обмен авто по trade-in, автострахование ОСАГО и КАСКО.");
$APPLICATION->SetPageProperty("TITLE", "Купить новые автомобили в салоне МОТОР ЛЕНД");
$APPLICATION->SetTitle("Новые автомобили");
?><div class="dealrs_cars">
    <h1 class="title">
        Группа компаний МОТОР ЛЕНД является официальным дилером следующих марок
    </h1>
    <div class="dealrs_cars_list">
        <div class="dealrs_cars_item">
             <img src="/local/templates/mlrespect/assets/img/image 12.png" alt=""> <img src="/local/templates/mlrespect/assets/img/kia_ico.png" class="dealer_logo" alt=""> 
<?if(CITY_NAME == 'Санкт-Петербург'):?>
<a href="https://www.kia78.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
<?else:?>
<a href="http://www.kiavrn.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
<?endif;?>
        </div>
        <div class="dealrs_cars_item">
            <img src="/local/templates/mlrespect/assets/img/volvo_img.png" alt=""> <img src="/local/templates/mlrespect/assets/img/volvo_ico.png" class="dealer_logo" alt="">
            <?if(CITY_NAME == 'Белгород'):?> <a href="http://motorland31.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
            <?else:?> <a href="http://www.motorlandgroup.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
            <?endif;?>
        </div>
        <div class="dealrs_cars_item" style="display: none;">
            <img src="/local/templates/mlrespect/assets/img/image 14.png" alt=""> <img src="/local/templates/mlrespect/assets/img/jeep_ico.png" class="dealer_logo" alt=""> <a href="http://www.jeepvrn.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
        </div>
        <div class="dealrs_cars_item" style="display: none;">
            <img src="/local/templates/mlrespect/assets/img/image 13.png" alt=""> <img src="/local/templates/mlrespect/assets/img/chery_ico.png" class="dealer_logo" alt=""> <?/*<a href="http://www.mychery.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>*/?>
        </div>
        <div class="dealrs_cars_item">
            <img src="/local/templates/mlrespect/assets/img/image 16.png" alt=""> <img src="/local/templates/mlrespect/assets/img/nissan_ico.png" class="dealer_logo" alt=""> <a href="http://nissan-motorland.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
        </div>
        <div class="dealrs_cars_item">
            <img src="/local/templates/mlrespect/assets/img/image 15.png" alt=""> <img src="/local/templates/mlrespect/assets/img/subaru_ico.png" class="dealer_logo" alt=""> <a href="http://www.belgorod.subaru.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
        </div>
        <div class="dealrs_cars_item" style="display: none;">
         <img src="/local/templates/mlrespect/assets/img/image-171.png" class="sy_desc" alt=""> <img src="/local/templates/mlrespect/assets/img/ssanhyong_ico.png" class="dealer_logo" alt="">
            <!--<a href="#" class="dealer_btn">Перейти на сайт<span></span></a>-->
        </div>
        <div class="dealrs_cars_item">
            <img src="/local/templates/mlrespect/assets/img/mits2.jpg" class="sy_desc" alt=""> <img src="/local/templates/mlrespect/assets/img/mits-02.png" class="dealer_logo" alt=""> 
            <a href="https://mitsubishi-vrn.ru/" rel="nofollow" target="_blank" class="dealer_btn">Перейти на сайт<span></span></a>
        </div>
    </div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>