<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

   <?if($APPLICATION->GetCurPage(false) !== '/'):?>
        <?if($page[1] != 'car'):?>
        <?if($page[1] != 'ocenka-avto'):?>
        </div></div>

        <div class="bottom_text_content">
            <div class="container">
                <div class="bottom_text_content_top">
                    <div class="right_box_services komis">
                        <div class="right_box_services_title">Комиссионная продажа</div>
                        <div class="right_box_services_desc">Доверьте продажу автомобиля профессионалам и обезопасьте себя от возможных неприятностей</div>
						<?if ($APPLICATION->GetCurPage(false) != '/komissionnaya-prodazha/') {?>
							<a href="/komissionnaya-prodazha/" class="white_btn">О комиссионной продаже</a>
						<?} else {?>
						<a href="javascript:void(0);" class="white_btn no-act">О комиссионной продаже</a>
						<?}?>
                    </div>
                    <div class="right_box_services tradein">
                        <div class="right_box_services_title">Trade In</div>
                        <div class="right_box_services_desc">Вы можете продать нам свой автомобиль, и доплатив разницу, стать обладателем новой б/у машины</div>
						<?if ($APPLICATION->GetCurPage(false) != '/obmen-avtomobilya/') {?>
							<a href="/obmen-avtomobilya/" class="white_btn">Условия Trade In</a>
						<?} else {?>
							<a href="javascript:void(0);" class="white_btn no-act">Условия Trade In</a>
						<?}?>
                    </div>
                </div>
                <div class="bottom_text_content_bottom">
                    <div class="advantages">
                        <div class="advantages_item ico1">Полная исправность<br/> всех машин</div>
                        <div class="advantages_item ico2">Гарантия на все наши<br/>  автомобили</div>
                        <div class="advantages_item ico3">Быстрый выкуп авто<br/> за 30 минут</div>
                        <div class="advantages_item ico4">Бесплатная юридическая<br/> поддержка</div>
                    </div>
                    <div class="social_box">
                        <div class="social_box_left">
                            Следите за нашими спецпредложениями<br/> в соцсетях:
                        </div>
						<?/*div class="social_box_right">
                            <a rel="nofollow" href="#WF_SOC_IN#" target="_blank" class="inst social"></a>
                            <a rel="nofollow" href="#WF_SOC_VK#" target="_blank" class="vk social"></a>
                            <a rel="nofollow" href="#WF_SOC_FB#" target="_blank" class="fb social"></a>
						</div*/?>
                    </div>
                </div>
            </div>
        </div>
        <?endif;?>
        <?endif;?>
        <?endif;?>

        <div class="bottom_nav">
            <div class="container">
                <ul class="bottom_menu">
                    <li><a href="/car/">Купить</a></li>
                    <li><a href="/prodat-avtomobil/">Продать</a></li>
                    <li><a href="/about/">О компании</a></li>
                    <li><a href="/blog/">Полезная информация</a></li>
					<div class="socblock">
						<a class="nsoc nsoc-1" target="_blank" href="#WF_SOC_IN#"></a>
						<a class="nsoc nsoc-2" target="_blank" href="#WF_SOC_VK#"></a>
						<a class="nsoc nsoc-3" target="_blank" href="#WF_SOC_FB#"></a>
						<a class="nsoc nsoc-4" target="_blank" href="https://www.youtube.com/channel/UCgS_hPHrje1Gb3HdByz91cQ"></a>
					</div>
                </ul>
            </div>
        </div>

		<footer class="footer">
			<div class="container">
                <? /*
                <div class="footer_top">
                    <div class="title">Новые автомобили<br> от официальных дилеров:</div>
                    <div class="footer_cars">
                        <div class="footer_car_item">
                            <a href="http://www.kiavrn.ru/" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/kia.png" alt="KIA" />
                            </a>
                            <span>KIA</span>
                        </div>
                        <div class="footer_car_item">
                            <a href="http://nissan-motorland.ru" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/nissan.png" alt="Nissan" />
                            </a>
                            <span>Nissan</span>
                        </div>
                        <div class="footer_car_item">
                            <a href="http://belgorod.subaru.ru/" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/subaru.png" alt="Subaru" />
                            </a>
                            <span>Subaru</span>
                        </div>
                        <div class="footer_car_item">
                            <?if(CITY_NAME == 'Белгород'):?>
                            <a href="http://motorland31.ru/" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/Volvo.png" alt="Volvo" />
                            </a>
                            <?else:?>
                            <a href="http://www.motorlandgroup.ru" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/Volvo.png" alt="Volvo" />
                            </a>
                            <?endif;?>
                            <span>Volvo</span>
                        </div>
                        <div class="footer_car_item">
                            <a href="http://www.mychery.ru/" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/Chery1.png" alt="Chery" />
                            </a>
                            <span>Chery</span>
                        </div>
                        <div class="footer_car_item">
                            <a href="http://www.jeepvrn.ru/" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/Jeep.png" alt="Jeep" />
                            </a>
                            <span>Jeep</span>
                        </div>
                        <div class="footer_car_item">
                            <a href="javascript:void(0);" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/SsangYong.png" alt="SsangYong" />
                            </a>
                            <span>SsangYong</span>
                        </div>
						<div class="footer_car_item footer_car_item-mitsibishi">
                            <a href="https://mitsubishi-vrn.ru/" rel="nofollow" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/mitsubishi1.png" alt="Mitsubishi" />
                            </a>
                            <span>Mitsubishi</span>
                        </div>

                    </div>
                </div>
                */ ?>

                <div class="footer_bottom clearfix">
                    <a href="/" class="logo">
                        <img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/logo_footer.svg" alt="РЕСПЕКТ Автомобили с пробегом" />
                    </a>
                    <span>Покупка и продажа автомобилей: с пробегом и новых</span>
                    <a href="javascript:void(0);" class="btn_callback" onClick="window.Calltouch.Callback.onClickCallButton(); yandexGoal('CALL'); return true;">Заказать звонок</a>
                    <a href="/contacts/" class="btn_adress">Адреса салонов</a>
                </div>
                <div class="footer_copyright clearfix">
                    <span>Группа компаний МОТОР ЛЕНД</span>
					<a href="/politika-konfidentsialnosti/">Политика конфиденциальности</a>
					<a href="http://<?=CITY_DOMAIN;?>/terms.pdf">Пользовательское соглашение</a>
                    <a href="https://prime-ltd.su/?from=ml-respect.ru" target="_blank" class="promo">
                        <img src="http://prime-ltd.su/logo/white.svg" width="170" title="Продвижение сайтов" alt="Продвижение сайтов">
                    </a>
                </div>
			</div>

			<div class="popup_wrap" id="popup">
                <div class="popup">
                    <div class="title" id="credit_title">Рассчитать кредит</div>
                    <div class="title_auto" id="credit_titleauto">Желаемый автомобиль</div>
                    <div class="auto_name" id="credit_auto">KIA CEE’D 2012</div>
                    <form action="/" method="post" onsubmit="return sendCredit();" id="credit_form">
                        <input type="hidden" value="699" id="credit_filial" name="credit_filial" />
                        <div class="left_form">
                            <label for="credit_form_name">Ваше имя</label>
                            <input type="text" name="credit_form_name" id="credit_form_name" />
                            <label for="credit_form_phone">Контактный телефон</label>
                            <input type="tel" name="credit_form_phone" id="credit_form_phone" placeholder="+7" />
                            <!--<label for="credit_form_city">Город</label>
                            <select name="credit_form_city" id="credit_form_city">
                                <option <?if(CITY_NAME=='Воронеж') echo 'selected="selected"';?> value="Воронеж">Воронеж</option>
                                <option <?if(CITY_NAME=='Санкт-Петербург') echo 'selected="selected"';?> value="Санкт-Петербург">Санкт-Петербург</option>
                                <option <?if(CITY_NAME=='Белгород') echo 'selected="selected"';?> value="Белгород">Белгород</option>
                            </select>-->
                        </div>
                        <div class="right_form">
                            <label for="credit_form_comment">Комментарий</label>
                            <textarea name="credit_form_comment" id="credit_form_comment" style="resize: none;"></textarea>
                           <?// <button type="submit" class="red_btn" onclick="yandexGoal('CREDIT'); return true;">Отправить</button>  Олег: убрал onclick="yandexGoal('CREDIT'); return true;"?>
                            <button type="submit" class="red_btn">Отправить</button>
                        </div>
                    </form>
                    <div class="privacy_text" id="credit_privacy">Нажимая кнопку «Отправить» вы соглашаетесь с <a href="http://<?=CITY_DOMAIN;?>/terms.pdf">пользовательским соглашением</a> и ознакомились с нашей <a href="http://<?=CITY_DOMAIN;?>/privacy.pdf">политикой конфиденциальности</a></div>
                    <a href="javascript:void(0);" onclick="hide_popup();" class="close-icon">Закрыть</a>
                </div>
            </div>

			<div class="popup_wrap" id="popup-test_drive">
                <div class="popup">
                   <?/*?> <div class="title" id="testdrive_title"><?=(CITY_NAME == 'Воронеж' || CITY_NAME == 'Санкт-Петербург')? "Купить онлайн":"Рассчитать trade-in"?> <?// Олег: БЫЛО заменил название кнопки в зависимости от города?></div><?*/?>
                    <div class="title" id="testdrive_title">Рассчитать trade-in<?// Олег: СТАЛО один заголовок на все города?></div>
                        <div class="title_auto" id="testdrive_titleauto">Желаемый автомобиль</div>
                    <div class="auto_name" id="tesdrive_auto">KIA CEE’D 2012</div>
                    <form action="/" method="post" onsubmit="return sendTestDrive();" id="tesdrive_form">
                        <input type="hidden" value="699" id="tesdrive_filial" name="tesdrive_filial" />
                        <div class="left_form">
                            <label for="testdrive_form_name">Ваше имя</label>
                            <input type="text" name="testdrive_form_name" id="testdrive_form_name" />
                            <label for="testdrive_form_phone">Контактный телефон</label>
                            <input type="tel" placeholder="+7" name="testdrive_form_phone" id="testdrive_form_phone" />
                            <!--<label for="testdrive_form_city">Город</label>
                            <select name="testdrive_form_city" id="testdrive_form_city">
                                <option <?if(CITY_NAME=='Воронеж') echo 'selected="selected"';?> value="Воронеж">Воронеж</option>
                                <option <?if(CITY_NAME=='Санкт-Петербург') echo 'selected="selected"';?> value="Санкт-Петербург">Санкт-Петербург</option>
                                <option <?if(CITY_NAME=='Белгород') echo 'selected="selected"';?> value="Белгород">Белгород</option>
                            </select>-->
                        </div>
                        <div class="right_form">
                            <label for="testdrive_form_comment"> <?=(CITY_NAME == 'Воронеж' || CITY_NAME == 'Санкт-Петербург')? "Комментарии":"Опишите Ваш автомобиль (модель, год и т.д.)"?></label> <?// Олег: заменил название поля в зависимости от города?>
                            <textarea name="testdrive_form_comment" id="testdrive_form_comment" style="resize: none;"></textarea>
                            <?//<button type="submit" class="red_btn" onclick="yandexGoal('TESTDRIVE'); return true;">Отправить</button> Олег: убрал  onclick="yandexGoal('TESTDRIVE'); return true;"?>
                            <button type="submit" class="red_btn">Отправить</button>
                        </div>
                    </form>
                    <div class="privacy_text" id="tesdrive_privacy">Нажимая кнопку «Отправить» вы соглашаетесь с <a href="http://<?=CITY_DOMAIN;?>/terms.pdf">пользовательским соглашением</a> и ознакомились с нашей <a href="http://<?=CITY_DOMAIN;?>/privacy.pdf">политикой конфиденциальности</a></div>
                    <a href="javascript:void(0);" onclick="hide_popupTest();" class="close-icon">Закрыть</a>
                </div>
            </div>

		</footer>
	</div>
<?/*?>
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH;?>/assets/js/jquery.fancybox.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH;?>/assets/js/slick.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH;?>/assets/js/fotorama.js"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
    <script src="<?=SITE_TEMPLATE_PATH;?>/assets/js/jQuery.Brazzers-Carousel.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH;?>/assets/js/map.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH;?>/assets/js/frontend.js?v=<?=time();?>"></script>
<?*/?>
    <?
    // Олег: подключени скриптов методами битрикса
    $APPLICATION->AddHeadScript('//code.jquery.com/jquery-latest.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/tooltip.js');
    // $APPLICATION->AddHeadScript('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/jquery.inputmask.bundle.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/jquery.fancybox.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/slick.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/jquery.nice-select.min.js');
    // $APPLICATION->AddHeadScript('//cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js');
    // $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/fotorama.js');
    // $APPLICATION->AddHeadScript('//api-maps.yandex.ru/2.1/?lang=ru_RU');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/jQuery.Brazzers-Carousel.min.js');
    // $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/map.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/assets/js/frontend.js?v='.time());

    ?>


    #WF_COUNT#



<!-- calltouch -->

<?if(CITY_NAME == 'Воронеж'):?>
	<script>
	window.ct_mod_id = 'e748zhwy';
	window.ct_site_id = '43939';
	</script>
<?endif;?>

<?if(CITY_NAME == 'Санкт-Петербург'):?>
	<script>
	window.ct_mod_id = 'q6nl3di7';
	window.ct_site_id = '43942';
	</script>
<?endif;?>

<?if(CITY_NAME == 'Белгород'):?>
	<script>
	window.ct_mod_id = 'l908sr01';
	window.ct_site_id = '43945';
	</script>
<?endif;?>
</script>
<script type="text/javascript">
(function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)};s.type="text/javascript";s.async=true;s.src="https://mod.calltouch.ru/init.js?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})
(window,document,"ct",window.ct_mod_id);
</script>
<script>
jQuery(document).on("click", 'form#credit_form [type="submit"]', function() { 
	var m = jQuery(this).closest('form'); 
	var fio = m.find('input[name="credit_form_name"]').val(); 
	var phone = m.find('input[name="credit_form_phone"]').val(); 
	var mail = m.find('input[name="email"]').val(); 
	var ct_site_id = window.ct_site_id;
	var sub = 'Кредит';
	var ct_data = {             
		fio: fio,
		phoneNumber: phone,
		email: mail,
		subject: sub,
		requestUrl: location.href,
		sessionId: window.call_value
	};
	var ct_valid = !!phone;
	console.log(ct_data,ct_valid);
	if (ct_valid && !window.ct_snd_flag){
		window.ct_snd_flag = 1; setTimeout(function(){ window.ct_snd_flag = 0; }, 20000);
		jQuery.ajax({  
		  url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/', 
		  dataType: 'json', type: 'POST', data: ct_data, async: false
		}); 
	}
});
</script> 
<script>
jQuery(document).on("click", 'form#tesdrive_form [type="submit"]', function() { 
	var m = jQuery(this).closest('form'); 
	var fio = m.find('input[name="testdrive_form_name"]').val(); 
	var phone = m.find('input[name="testdrive_form_phone"]').val(); 
	var mail = m.find('input[name="email"]').val(); 
	var ct_site_id = window.ct_site_id;
	var sub = 'Трейд-ин';
	var ct_data = {             
		fio: fio,
		phoneNumber: phone,
		email: mail,
		subject: sub,
		requestUrl: location.href,
		sessionId: window.call_value
	};
	var ct_valid = !!phone;
	console.log(ct_data,ct_valid);
	if (ct_valid && !window.ct_snd_flag){
		window.ct_snd_flag = 1; setTimeout(function(){ window.ct_snd_flag = 0; }, 20000);
		jQuery.ajax({  
		  url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/', 
		  dataType: 'json', type: 'POST', data: ct_data, async: false
		}); 
	}
});
</script> 
<script>
jQuery(document).on("click", 'form#formStep1 [type="submit"]', function() { 
	var m = jQuery(this).closest('form'); 
	var fio = m.find('input[name="name"]').val(); 
	var phone = m.find('input[name="phone"]').val(); 
	var mail = m.find('input[name="email"]').val(); 
	var marka = m.find('select[name="carsEvalBrands"]').val(); 
	var model = m.find('select[name="carsEvalModels"]').val(); 
	var year = m.find('select[name="carsEvalYear"]').val(); 
	var ct_site_id = window.ct_site_id;
	var sub = 'Онлайн оценка';
	var ct_data = {             
		fio: fio,
		phoneNumber: phone,
		email: mail,
		subject: sub,
		requestUrl: location.href,
		sessionId: window.call_value
	};
	var ct_valid = !!phone && !!marka && !!model && !!year;
	console.log(ct_data,ct_valid);
	if (ct_valid && !window.ct_snd_flag){
		window.ct_snd_flag = 1; setTimeout(function(){ window.ct_snd_flag = 0; }, 20000);
		jQuery.ajax({  
		  url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/', 
		  dataType: 'json', type: 'POST', data: ct_data, async: false
		}); 
	}
});
</script> 

<!-- calltouch -->

<script type="text/javascript">
window.calltouchEvent = function(arCtEvent){
    if(arCtEvent[0].object == "widget-request" && arCtEvent[0].data.actionType == "manual" && arCtEvent[0].action == "create"){
        fbq('track', 'Contact');
    }
}
</script>

<?if(CITY_NAME == 'Белгород'):?>
<script>
	$('.car_item').addClass('car_item-belg');
</script>
<?endif;?>
<?// Oleg: добавилgit код виджета Smartpoint?>
<script type="text/javascript">
    (function(w, p) {
        var a, s;
        (w[p] = w[p] || []).push(
            "uid=123757",
            "site="+encodeURIComponent(window.location.href)
        );
        a = document.createElement('script'); a.type = 'text/javascript'; a.async = true;	a.charset='utf-8';
        a.src = 'https://panel.smartpoint.pro/collectwidgets/?'+window.SMP_params.join('&');
        s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(a, s);
    })(window, 'SMP_params');
</script>


<?// Oleg: отключение JIVOSITE?>
<?/*if(CITY_NAME == 'Воронеж'):?>
<!-- BEGIN JIVOSITE CODE {literal} -->

<script type='text/javascript'>

(function(){ var widget_id = 'L1x4nkh2id';var d=document;var w=window;function l(){

  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;

  s.src = '//code.jivosite.com/script/widget/'+widget_id

    ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}

  if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}

  else{w.addEventListener('load',l,false);}}})();

</script>

<!-- {/literal} END JIVOSITE CODE -->
<?endif;*/?>

<script>
    var yandexGoal = function(id)
    {
        <?if(CITY_NAME == 'Воронеж'):?>
        yaCounter36737250.reachGoal(id);
        <?endif;?>
        <?if(CITY_NAME == 'Белгород'):?>
        yaCounter42805354.reachGoal(id);
        <?endif;?>
        <?if(CITY_NAME == 'Санкт-Петербург'):?>
        yaCounter51337171.reachGoal(id);
        <?endif;?>
    }
</script>


    #WF_SCRIPTS#

    <?$APPLICATION->IncludeComponent(
        "webfly:meta.edit",
        ".default",
        array(
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "WF_JQUERY" => "N"
        ),
        false
    );?>

</body>
</html>
