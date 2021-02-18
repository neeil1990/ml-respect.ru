<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>

        <div class="card_car" style="margin-top: 50px;">
            <div class="container clearfix">
                <div class="card_car_left">
                    <div class="thumbs">
                        <?if(!empty($arResult['DISPLAY_PROPERTIES']['img'])):?>
                        <?foreach($arResult['DISPLAY_PROPERTIES']['img'] as $img):?>
                        <a href="assets/img/ceed2.jpg" class="thumbs_item" style="background-image: url(assets/img/ceed2.jpg);"></a>
                        <?endforeach;?>
                        <?endif;?>
                        <a class="more_photos" href="javascript:void(0);">Ещё 9 фото</a>
                        <!-- <a href="assets/img/ceed11.jpg"><img src="assets/img/ceed11.jpg"></a>
                        <a href="assets/img/ceed12.jpg"><img src="assets/img/ceed12.jpg"></a>
                        <a href="assets/img/ceed13.jpg"><img src="assets/img/ceed11.jpg"></a>
                        <a href="assets/img/ceed14.jpg"><img src="assets/img/ceed14.jpg"></a> -->
                    </div>
                </div>
                <div class="card_car_right">
                    <ul class="breadcrumbs">
                        <li><a href="#">Респект</a></li>
                        <li><a href="#">Авто с пробегом</a></li>
                    </ul>
                    <div class="card_car_title">KIA CEE’D</div>
                    <div class="card_car_date">Добавлено 11.06.2018</div>
                    <div class="char_box clearfix">
                        <div class="char_left">
                            <div class="char_name">Год выпуска</div>
                            <div class="char_name">Пробег</div>
                            <div class="char_name">Двигатель</div>
                            <div class="char_name">Коробка</div>
                            <div class="char_name">Состояние</div>
                        </div>
                        <div class="char_right">
                            <div class="char_value">2012</div>
                            <div class="char_value">97 700 км</div>
                            <div class="char_value">1591 см<sup>3</sup> / 129 л.с. / Бензиновый</div>
                            <div class="char_value">Механика</div>
                            <div class="char_value">Отличное</div>
                        </div>
                    </div>
                    <div class="card_car_price_car">
                        <div class="card_car_price_car_left">
                            <div class="card_car_old_price">680 000</div>
                            <div class="card_car_new_price">630 000 ₽</div>
                            <div class="credit_text">Можно в кредит</div>
                        </div>
                        <div class="card_car_price_car_right">
                            <a href="#" class="red_btn">Записаться на тест-драйв</a>
                            <a href="#" class="white_btn">Рассчитать кредит</a>
                        </div>
                    </div>
                    <div class="card_car_map">
                        <div class="card_car_map_title">Где можно осмотреть авто</div>
                        <span>Мотор Ленд KIA,<br/> 
                        тел +7 (473) 233-33-23<br/> 
                        ул. Изыскателей, 23</span>
                        <a href="#map1" class="map"></a>
                        <div id="map1" class="map_box"></div>
                    </div>
                </div>
                <!-- <div class="card_car_right_mobile">
                    <div class="thumbs">
                        <a href="assets/img/ceed0.png" style="background-image: url(assets/img/ceed0.png);"></a>
                        <a href="assets/img/ceed2.jpg" style="background-image: url(assets/img/ceed2.jpg);"></a>
                        <a href="assets/img/ceed3.jpg" style="background-image: url(assets/img/ceed3.jpg);"></a>
                        <a href="assets/img/ceed4.jpg" style="background-image: url(assets/img/ceed4.jpg);"></a>
                        <a href="assets/img/ceed5.jpg" style="background-image: url(assets/img/ceed5.jpg);"></a>
                        <a href="assets/img/ceed6.jpg" style="background-image: url(assets/img/ceed6.jpg);"></a>
                        <a href="assets/img/ceed7.jpg" style="background-image: url(assets/img/ceed7.jpg);"></a>
                        <a href="assets/img/ceed8.jpg" style="background-image: url(assets/img/ceed8.jpg);"></a>
                        <a href="assets/img/ceed9.jpg" style="background-image: url(assets/img/ceed9.jpg);"></a>
                        <a href="assets/img/ceed10.jpg" style="background-image: url(assets/img/ceed10.jpg);"></a>
                        <a href="assets/img/ceed11.jpg"><img src="assets/img/ceed11.jpg"></a>
                        <a href="assets/img/ceed12.jpg"><img src="assets/img/ceed12.jpg"></a>
                        <a href="assets/img/ceed13.jpg"><img src="assets/img/ceed11.jpg"></a>
                        <a href="assets/img/ceed14.jpg"><img src="assets/img/ceed14.jpg"></a>
                    </div>
                </div> -->
    
                <div class="advantages">
                    <div class="advantages_item ico1">Полная исправность<br/> всех машин</div>
                    <div class="advantages_item ico2">Гарантия на все наши<br/>  автомобили</div>
                    <div class="advantages_item ico3">Быстрый выкуп авто<br/> за 30 минут</div>
                    <div class="advantages_item ico4">Бесплатная юридическая<br/> поддержка</div>
                </div>

                <h2>Комплектация автомобиля</h2>

                <div class="compl_auto">
                    <div class="compl_auto_box">
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Интерьер</div>
                            <span>Кожаный руль</span>
                            <span>Тканевая обивка салона</span>
                            <span>Темный цвет салона</span>
                        </div>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Безопасность</div>
                            <span>ASR</span>
                            <span>ABS</span>
                            <span>EBD</span>
                            <span>SRS водителя</span>
                            <span>SRS пассажира</span>
                            <span>SRS задние пассажиры</span>
                            <span>SRS боковые</span>
                        </div>
                    </div>
                    <div class="compl_auto_box">
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Интерьер</div>
                            <span>Противотуманные фары</span>
                            <span>Легкосплавные диски</span>
                            <span>Рейлинги</span>
                            <span>Задние тонир. стекла</span>
                        </div>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Комфорт</div>
                            <span>Подогрев пер.сидений</span>
                            <span>Кондиционер</span>
                            <span>Перед. эл-подъемники</span>
                            <span>Задние эл-подъемники</span>
                        </div>
                    </div>
                    <div class="compl_auto_box">
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Функциональное оборудование</div>
                            <span>Break Assist</span>
                            <span>Центральный замок</span>
                            <span>Обогрев зеркал</span>
                            <span>Обогрев задн. стекла</span>
                            <span>Обогрев зоны щеток</span>
                            <span>Бортовой компьютер</span>
                            <span>CD</span>
                            <span>DVD</span>
                            <span>USB</span>
                            <span>Галогенные фары</span>
                            <span>ГУР</span>
                        </div>
                    </div>
                    <div class="compl_auto_box">
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Регулировки</div>
                            <span>Регулировака руля по высоте</span>
                        </div>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Сигнализация</div>
                            <span>Иммобилайзер</span>
                            <span>Сигнализация</span>
                        </div>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Другое</div>
                            <span>Регулировка водительского сиденья вод.сид. по горизонт</span>
                            <span>Регулировка водительского сиденья вод.сид. по высоте</span>
                            <span>Регулировка пассажирского сиденья пас.сид. по горизонт</span>
                            <span>ISOFIX</span>
                        </div>
                    </div>
                </div>

                <h3>Посмотрите эти выгодные предложения</h3>

                <div class="cars">
                    <a href="#" class="car_item">
                        <div class="car_item_img">
                            <img src="assets/img/car1.png" alt="">
                            <div class="sale_val">
                                <span>Выгода</span>
                                <span>26 000 ₽</span>
                            </div>
                        </div>
                        <div class="car_item_text">
                            <div class="car_item_name">Lada Kalina</div>
                            <div class="car_item_desc">2000, АКПП, 141 л.с., 102 000 км</div>
                            <span class="btn_fav3"></span>
                            <div class="car_item_price">
                                <div class="car_item_price_val_sale">
                                    <div class="car_item_price_val_old">125 000</div>
                                    <div class="car_item_price_val_new">99 000 ₽</div>
                                </div>
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

                    <a href="#" class="car_item">
                        <div class="car_item_img"><img src="assets/img/car2.png" alt=""></div>
                        <div class="car_item_text">
                            <div class="car_item_name">KIA Cee'd</div>
                            <div class="car_item_desc">2014, АКПП, 141 л.с., 102 000 км</div>
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

                    <a href="#" class="car_item">
                        <div class="car_item_img"><img src="assets/img/car3.png" alt=""></div>
                        <div class="car_item_text">
                            <div class="car_item_name">Hyundai Solaris</div>
                            <div class="car_item_desc">2000, АКПП, 141 л.с., 102 000 км</div>
                            <span class="btn_fav2"></span>
                            <div class="car_item_price">
                                <div class="car_item_price_val_sale">
                                    <div class="car_item_price_val_old">1 325 000</div>
                                    <div class="car_item_price_val_new">1 295 000 ₽</div>
                                </div>
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
                </div>

                <a href="#" class="white_btn white_btn_special">Посмотреть все спецпредложения</a>

            </div>
        </div>