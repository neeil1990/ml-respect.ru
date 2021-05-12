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

function strpos_array($haystack, $needles) {
    if ( is_array($needles) ) {
        foreach ($needles as $str) {
            if ( is_array($str) ) {
                $pos = strpos_array($haystack, $str);
            } else {
                $pos = stripos($haystack, $str);
            }
            if ($pos !== FALSE) {
                return true;
            }
        }
    } else {
        $pos = stripos($haystack, $needles);
        if ($pos !== FALSE) {
            return true;
        }
    }
    return false;
}

if(!empty($arResult['DISPLAY_PROPERTIES']['equipment']['VALUE'])){
                        $preg['I'] = array(
                            'Отделка салона',
                            'Темный цвет салона',
                            'Люк',
                            'Обивка салона',
                            'Цвет салона',
                            'Салон велюр',
                            'Салон ткань',
                            'Темный салон',
                            'Кожаный руль',
                            'Салон кожа',
'отделка кожей',
'кожаный салон'

                        );
                        $preg['S'] = array(
                            'ABS',
                            'ASR',
                            'ESP',
                            'EBA',
                            'EBV',
                            'EBD',
                            'Подушки безопасности',
                            'Боковые подушки безопасности',
                            'Фронтальные подушки безопасности',
                            'Водительская подушка безопасности',
                            'Подушка безопасности водителя',
                            'Подушка безопасности пассажира',
							'антипробуксовочная система',
'блокировка замков задних дверей',
'подушка безопасности для защиты коленей водителя',
'',
                        );
                        $preg['E'] = array(
                            'Легкосплавные',
                            'Противотуманные фары',
                            'Фары',
                            'Галогенные',
                            'Тонированные стекла',
                        );
                        $preg['C'] = array(
                            'Обогрев сидений',
                            'Кондиционер',
                            'Круиз-контроль',
                            'Подогрев сидений',
                            'Климат',
                            'Обогрев передних сидений',
                            'Обогрев задних сидений',
                            'Обогрев руля',
'вентиляция передних сидений',
'охлаждаемый перчаточный ящик',
'подогрев передних сидений',
'электрообогрев зоны стеклоочистителей',
'электропривод зеркал',
'электропривод крышки багажника',
'электроскладывание зеркал'

                        );
                        $preg['F'] = array(
                            'Датчик дождя',
                            'Датчик света',
                            'Бортовой компьютер',
                            'Мультимедиа',
                            'Центральный замок',
                            'Обогрев зеркал',
                            'Обогрев стекол',
                            'Электропривод стекол',
                            'Электрические стеклоподъёмники',
                            'Электрические зеркала',
                            'Усилитель руля',
                            'Гидроусилитель руля',
                            'Мультируль',
                            'Камера заднего вида',
                            'Омыватели фар',
							'AUX',
'USB',
'датчик давления в шинах',
'датчик проникновения в салон',
'дистанционный запуск двигателя',
'запуск двигателя с кнопки',
'камера 360°',
'обогрев рулевого колеса',
'омыватель фар',
'розетка',
'система адаптивного головного освещения в повороте',
'система доступа без ключа',

                        );
                        $preg['R'] = array(
                            'Регулировка',
                            'Рег-ка',
                            'Корректор',
'сиденье водителя: с памятью положения',
                        );
                        $preg['A'] = array(
                            'Сигнализация',
                            'Иммобилайзер'
                        );
                        $interior = array();
                        $secure = array();
                        $exterior = array();
                        $comfort = array();
                        $func = array();
                        $regulation = array();
                        $alarm = array();
                        $other = array();
                        foreach($arResult['DISPLAY_PROPERTIES']['equipment']['VALUE'] as $equipment){
                            if(strpos_array($equipment, $preg['I'])){
                                $interior[] = $equipment;
                            }elseif(strpos_array($equipment, $preg['S'])){
                                $secure[] = $equipment;
                            }elseif(strpos_array($equipment, $preg['E'])){
                                $exterior[] = $equipment;
                            }elseif(strpos_array($equipment, $preg['C'])){
                                $comfort[] = $equipment;
                            }elseif(strpos_array($equipment, $preg['F'])){
                                $func[] = $equipment;
                            }elseif(strpos_array($equipment, $preg['R'])){
                                $regulation[] = $equipment;
                            }elseif(strpos_array($equipment, $preg['A'])){
                                $alarm[] = $equipment;
                            }else{
                                $other[] = $equipment;
                            }
                        }
}

?>
        <?$cnaonical = explode('?', $arResult["DETAIL_PAGE_URL"]);
            $APPLICATION->AddHeadString('<link href="https://'.$_SERVER["SERVER_NAME"].$cnaonical[0].'" rel="canonical" />',true); // Олег: установка канонического url?>
        <div itemscope itemtype="http://schema.org/Product" class="card_car" style="margin-top: 30px;" 
        <?if(!empty($arResult['DISPLAY_PROPERTIES']['panorama']['VALUE'])):?>
        <?if(!empty($arResult['DISPLAY_PROPERTIES']['vin']['VALUE'])):?>data-vin="<?=$arResult['DISPLAY_PROPERTIES']['vin']['VALUE']?>"<?endif;?>
        <?endif;?>
        >
			<?$brandp = explode(" ", $arResult['NAME']);
			$brand = $brandp[0];
			if ($brand == 'Land') {
				$brand = 'Land Cruser';
			}
			?>
			<span itemprop="brand" style="display:none;"><?=$brand?></span>
            <div class="container clearfix">
                <div class="card_car_left">
                    <div class="thumbs">
                        <?$ind=0;foreach($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $idx=>$img): $ind = $idx;?>
                         <a href="<?=$img['SRC']?>" class="thumbs_item" style="background-image: url(<?=$img['SRC_PREW']?>);"></a><?//Олег: заменил $img['SRC'] на $img['SRC_PREW'] в котором уменьшеная картинка?>
                        <?endforeach?>
						<img style="display:none;" itemprop="image" src="<?=$img['SRC']?>" loading="lazy" width="586" height="390" />
                        <?if($ind > 8):?><a class="more_photos" href="javascript:void(0);">Ещё <?=($ind-9);?> фото</a><?endif;?>
                    </div>
                </div>
                <div class="card_car_right">

<div style="display: none;">
<?$APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "breadcrumbs_car",
    Array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0"
    )
);?>


</div>
					<ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs">
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<a itemprop="item" title="Главная"  href="/">
								<span itemprop="name">Главная</span>
								<meta itemprop="position" content="1">
							</a>
						</li>
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<a itemprop="item" title="Авто с пробегом"  href="/car/">
								<span itemprop="name">Авто с пробегом</span>
								<meta itemprop="position" content="2">
							</a>
						</li>
						<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<a itemprop="item" title="<?=$arResult['NAME'];?>" href="javascript:void(0);">
								<span itemprop="name"><?=$arResult['NAME'];?></span>
								<meta itemprop="position" content="3">
							</a>
						</li>
					</ul>
                    <h1 class="card_car_title" itemprop="name"><?=$arResult['NAME'];?></h1>
                    <?if($arResult['DATE_CREATE']):?>
                        <div class="card_car_date">
                            <!--Добавлен <? echo FormatDateFromDB($arResult["DATE_CREATE"], 'SHORT'); ?>-->
                            &nbsp;
                        </div>
                    <?endif;?>
                    <div class="char_box clearfix">
                        <div class="char_left" itemprop="description">
                            <?if($arResult['DISPLAY_PROPERTIES']['year']['VALUE']):?>
                            <div class="char_name">Год выпуска</div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['run']['VALUE']):?>
                            <div class="char_name">Пробег</div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['displacement']['VALUE'] 
                            || $arResult['DISPLAY_PROPERTIES']['power']['VALUE']
                            || $arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                            <div class="char_name">Двигатель</div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['transmission']['VALUE']):?>
                            <div class="char_name">Коробка</div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['state']['VALUE']):?>
                            <div class="char_name">Состояние</div>
                            <?endif;?>
                        </div>
                        <div class="char_right">
                            <?if($arResult['DISPLAY_PROPERTIES']['year']['VALUE']):?>
                            <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?></div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['run']['VALUE']):?>
                            <div class="char_value"><?=number_format($arResult['DISPLAY_PROPERTIES']['run']['VALUE'], 0, ',', ' ');?> км</div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['displacement']['VALUE'] 
                            || $arResult['DISPLAY_PROPERTIES']['power']['VALUE']
                            || $arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                            <div class="char_value">
                                <?if($arResult['DISPLAY_PROPERTIES']['displacement']['VALUE']):?>
                                <?=$arResult['DISPLAY_PROPERTIES']['displacement']['VALUE']?> см<sup>3</sup> / 
                                <?endif;?>
                                <?if($arResult['DISPLAY_PROPERTIES']['power']['VALUE']):?>
                                <?=$arResult['DISPLAY_PROPERTIES']['power']['VALUE']?> л.с. / 
                                <?endif;?>
                                <?if($arResult['DISPLAY_PROPERTIES']['engine']['VALUE']):?>
                                <?=$arResult['DISPLAY_PROPERTIES']['engine']['VALUE']?>
                                <?endif;?>
                            </div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['transmission']['VALUE']):?>
                            <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['transmission']['VALUE']?></div>
                            <?endif;?>
                            <?if($arResult['DISPLAY_PROPERTIES']['state']['VALUE']):?>
                            <div class="char_value"><?=$arResult['DISPLAY_PROPERTIES']['state']['VALUE']?></div>
                            <?endif;?>
                        </div>
                    </div>


					<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" style="display:none;">
						<div><?=$arResult['DISPLAY_PROPERTIES']['price']['VALUE']?> ₽</div>
						<meta itemprop="price" content="<?=$arResult['DISPLAY_PROPERTIES']['price']['VALUE']?>.00"> 
						<link itemprop="availability" href="http://schema.org/InStock">
						<meta itemprop="priceCurrency" content="RUB">
					</div>

                    <div class="card_car_price_car">


                        <div class="card_car_price_car_left">
                            <?if(!empty($arResult['DISPLAY_PROPERTIES']['oldprice']['VALUE'])):?>
                            <div class="card_car_old_price">
                            <?=number_format($arResult['DISPLAY_PROPERTIES']['oldprice']['VALUE'], 0, ',', ' ');?>
                            </div>
                            <?endif;?>
                            <div class="card_car_new_price">
                                <?=number_format($arResult['DISPLAY_PROPERTIES']['price']['VALUE'], 0, ',', ' ');?> ₽
                            </div>
                            <!--<div class="credit_text">Можно в кредит</div>-->
                            <? $time = time(); ?>
                            <?if($time < 1577836799):?>
							<?if($arResult['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Воронеж'):?>
								<div class="car_item_persent">Рассрочка 0%*</div>
							<?endif;?>
                            <?endif;?>
                            <?// Олег: Скрыл(закоментил) плашку ВЫГОДА со всех поддоменов для всех машин?>
                            <?/*if(CITY_NAME != 'Санкт-Петербург'): // Олег: добавил условие исключающее плашку из поддомена spb?>
                                <?if($arResult['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Белгород'):?>
                                    <div class="car_item_price_action" style="display: none">
                                        <span>Выгода</span>
                                        <?
                                        $dprice = $arResult['DISPLAY_PROPERTIES']['price']['VALUE'];
                                        $percent20 = $arResult['DISPLAY_PROPERTIES']['price']['VALUE'] * 0.2;
                                        $discount = floor((($dprice-$percent20)*0.13872) / 1000) * 1000;
                                        ?>
                                        <b>- <?=number_format($discount, 0, ',', ' ');?> ₽</b>
                                    </div>
                                <?endif;?>
                                <?if($arResult['DISPLAY_PROPERTIES']['city']['VALUE'] == 'Санкт-Петербург'):?>
                                    <div class="car_item_price_action">
                                        <span>Выгода</span>
                                        <?
                                        $dprice = $arResult['DISPLAY_PROPERTIES']['price']['VALUE'];
                                        $percent20 = $arResult['DISPLAY_PROPERTIES']['price']['VALUE'] * 0.2;
                                        $discount = floor((($dprice-$percent20)*0.13872) / 1000) * 1000;
                                        ?>
                                        <b>- <?=number_format($discount, 0, ',', ' ');?> ₽</b>
                                    </div>
                                <?endif;?>
                            <?endif;*/ // Олег: добавил условие исключающее плашку из поддомена spb конец условия?>
                        </div>
                        <div class="card_car_price_car_right">
                            <a href="javascript:void(0);" 
                            onclick="show_popupTest('<?=str_replace(["'"], '', $arResult['NAME']);?> <?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?>', <?=$arResult['DISPLAY_PROPERTIES']['filial']['VALUE'];?>)" 
                            class="red_btn">
                                <?//=(CITY_NAME == 'Воронеж' || CITY_NAME == 'Санкт-Петербург')? "Купить онлайн":"Рассчитать trade-in"?> <?// Олег: БЫЛО заменил название кнопки в зависимости от города?>
                                Рассчитать trade-in<?// Олег: СТАЛО одно название кнопки на все города?>
                            </a>
                            <a href="javascript:void(0);" 
                            onclick="show_popup('<?=str_replace(["'"], '', $arResult['NAME']);?> <?=$arResult['DISPLAY_PROPERTIES']['year']['VALUE']?>', <?=$arResult['DISPLAY_PROPERTIES']['filial']['VALUE'];?>);" 
                            class="white_btn">Рассчитать кредит</a>
                        </div>
                    </div>
					<!-- <p class="car_card-red-text">скидка распространяется при покупке автомобиля в кредит</p> -->
                    <div class="card_car_map">
                        <div class="card_car_map_title">Где можно осмотреть авто</div>
                        <span><?=$arResult['FILIAL'][0]['NAME'];?>,<br/> 
                        тел <a href="tel:<?=$arResult['FILIAL'][0]['PROPERTY_PHONE_VALUE'];?>" style="color: #ea1e26">
                        <?=$arResult['FILIAL'][0]['PROPERTY_PHONE_VALUE'];?></a><br/> 
                        <?=$arResult['FILIAL'][0]['PROPERTY_ADDRESS_VALUE'];?></span>
                        <?
                        if(isset($arResult['FILIAL'][0]['PROPERTY_COORD_VALUE'])):
                        $coord = $arResult['FILIAL'][0]['PROPERTY_COORD_VALUE'];
                        $coord = explode(',', $coord);
                        $city = '';
                        if(isset($arResult['FILIAL'][0]['PROPERTY_CITY_VALUE'])){
                            $city = $arResult['FILIAL'][0]['PROPERTY_CITY_VALUE'] . ', ';
                        }
                        ?>

                        <? $sub = array_shift((explode(".",$_SERVER['HTTP_HOST']))); ?>

                        <?//Олег: закоментировал карту?>
                        <?/*<a href="#map1" class="map<? if( $sub == 'spb' ) { ?> map-spb<? } ?><? if( $sub == 'belgorod' ){ ?> map-bel<? } ?>"></a>*/?>   
                        <div onclick="return false;" style="cursor:unset" class="map<? if( $sub == 'spb' ) { ?> map-spb<? } ?><? if( $sub == 'belgorod' ){ ?> map-bel<? } ?>"></div>   
                            <?/*?> 
                            <div id="map1" class="map_box" 
                                 data-coordx="<?=$coord[0]?>" 
                                 data-coordy="<?=$coord[1]?>" 
                                 data-addr="<?=$city?><?=$arResult['FILIAL'][0]['PROPERTY_ADDRESS_VALUE'];?>">
                            </div>
                            <?*/?>
                        <?endif;?>
                    </div>
                </div>
    
                <div class="advantages">
                    <div class="advantages_item ico1">Полная исправность<br/> всех машин</div>
                    <div class="advantages_item ico2">Гарантия на все наши<br/>  автомобили</div>
                    <div class="advantages_item ico3">Быстрый выкуп авто<br/> за 30 минут</div>
                    <div class="advantages_item ico4">Бесплатная юридическая<br/> поддержка</div>
                </div>
                
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['equipment']['VALUE'])):?>
                
                <h2>Комплектация автомобиля</h2>

                <div class="compl_auto">
                    <?if(!empty($interior) || !empty($secure)):?>
                    <div class="compl_auto_box">
                        <?if(!empty($interior)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Интерьер</div>
                            <?foreach($interior as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                        <?if(!empty($secure)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Безопасность</div>
                            <?foreach($secure as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                    </div>
                    <?endif;?>
                    <?if(!empty($exterior) || !empty($comfort)):?>
                    <div class="compl_auto_box">
                        <?if(!empty($exterior)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Экстерьер</div>
                            <?foreach($exterior as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                        <?if(!empty($comfort)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Комфорт</div>
                            <?foreach($comfort as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                    </div>
                    <?endif;?>
                    <?if(!empty($func)):?>
                    <div class="compl_auto_box">
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Функциональное оборудование</div>
                            <?foreach($func as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                    </div>
                    <?endif;?>
                    <?if(!empty($regulation) || !empty($alarm) || !empty($other)):?>
                    <div class="compl_auto_box">
                        <?if(!empty($regulation)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Регулировки</div>
                            <?foreach($regulation as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                        <?if(!empty($alarm)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Сигнализация</div>
                            <?foreach($alarm as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                        <?if(!empty($other)):?>
                        <div class="compl_auto_box_item">
                            <div class="compl_auto_title">Другое</div>
                            <?foreach($other as $equipment):?>
                            <span><?=$equipment;?></span>
                            <?endforeach;?>
                        </div>
                        <?endif;?>
                    </div>
                    <?endif;?>
                </div>

                <?endif;?>
                
                <? if(!empty($arResult["DETAIL_TEXT"])): ?>
                    <div class="detail_text">
						<h2>Условия покупки <?=$arResult['NAME'];?></h2>
                        <?=$arResult["DETAIL_TEXT"];?>
                    </div>
                <? endif; ?>

                
                <!--
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

            </div>-->
        </div>