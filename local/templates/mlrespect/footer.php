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




<?if(CITY_NAME == 'Воронеж'):?>
<!-- calltouch -->
<script src="https://mod.calltouch.ru/init.js?id=882b1243"></script>

<!-- /calltouch -->
<?endif;?>

<?if(CITY_NAME == 'Санкт-Петербург'):?>
<!-- calltouch code -->

<script type="text/javascript">

(function (w, d, nv, ls, ua, ym){

var lwait = function (w, on, trf, dly, ma, orf, osf) { var y = "yaCounter", pfx = "ct_await_", sfx = "_completed", yac = function () { for (var v in w) if (v.indexOf(y)==0&&w[v].getClientID&&w[v].getClientID()) return w[v]; return false; }; if (!w[pfx + on + sfx]) { var ci = clearInterval, si = setInterval, st = setTimeout, cmld = function () { if (!w[pfx + on + sfx]) { w[pfx + on + sfx] = true; if ((w[pfx + on] && (w[pfx + on].timer))) { ci(w[pfx + on].timer); w[pfx + on] = null; } orf((on==y?yac():w[on])); } }; if (!(on==y?yac():w[on])|| !osf) { if (trf(on==y?yac():w[on])) { cmld(); } else { if (!w[pfx + on]) { w[pfx + on] = { timer: si(function () { if (trf(on==y?yac():w[on]) || ma < ++w[pfx + on].attempt) { cmld(); } }, dly), attempt: 0 }; } } } else { if (trf(on==y?yac():w[on])) { cmld(); } else { osf(cmld); st(function () { lwait(w, on, trf, dly, ma, orf); }, 0); } } } else { orf(on==y?yac():w[on]); } };

var ct = function (w, d, e, c, n, ym) { var a = 'all', b = 'tou', src = b + 'c' + 'h'; src = 'm' + 'o' + 'd.c' + a + src; var jsHost = "https://" + src, s = [{"sp":"6","sc":d.createElement(e)}]; var jsf = function (w, d, s, h, c, n) { var rep = function (ycntr) { s.forEach(function(el) { el.sc.async = 1; el.sc.src = jsHost + "." + "r" + "u/d_client.js?param;specific_id"+el.sp+";" + (ycntr && ycntr.getClientID ? "ya_client_id" + ycntr.getClientID() + ";" : "") + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":181008}") + ";"; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(el.sc, p); }); }; if (ym) { lwait(w, 'yaCounter', function(obj) { return (obj && obj.getClientID ? true : false); }, 50, 100, function (yaCounter) {rep(yaCounter);}, function (f) { if(w.jQuery) {  w.jQuery(d).on('yacounter' + yc + 'inited', f ); }});} else {rep(null);} }; if (!w.jQuery) { var jq = d.createElement(e); jq.src = jsHost + "." + "r" + 'u/js/jquery-1.7.min.js'; jq.onload = function () { lwait(w, 'jQuery', function(obj) { return (obj ? true : false); }, 30, 100, function () { jsf(w, d, s, jsHost, c, n); } ); }; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(jq, p); } else { jsf(w, d, s, jsHost, c, n); }};

var gaid = function (w, d, o, ct, n) { if (!!o) { lwait(w, o, function (obj) {  return (obj && obj.getAll ? true : false); }, 200, (nv.userAgent.match(/Opera|OPR\//) ? 10 : 20), function (gaCounter) { var clId = null; try {  var cnt = gaCounter && gaCounter.getAll ? gaCounter.getAll() : null; clId = cnt && cnt.length > 0 && !!cnt[0] && cnt[0].get ? cnt[0].get('clientId') : null; } catch (e) { console.warn("Unable to get clientId, Error: " + e.message); } ct(w, d, 'script', clId, n, ym); }, function (f) { w[o](function () {  f(w[o]); })});} else{ ct(w, d, 'script', null, n, ym); }};

var cid = function () { try { var m1 = d.cookie.match('(?:^|;)\\s*_ga=([^;]*)'); if (!(m1 && m1.length > 1)) return null; var m2 = decodeURIComponent(m1[1]).match(/(\d+\.\d+)$/); if (!(m2 && m2.length > 1)) return null; return m2[1]; } catch (err) {}}();

if(cid === null && ua){ lwait(w, 'GoogleAnalyticsObject', function (obj) {return (obj ? true : false);}, 100, 10, function (gaObjectName) { if (gaObjectName == 'ga_ckpr') w.ct_ga = 'ga'; else w.ct_ga = gaObjectName; if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1) { new Promise(function (resolve) {var db, on = function () {resolve(true)}, off = function () {resolve(false)}, tryls = function tryls() {try {ls && ls.length ? off() : (ls.x = 1, ls.removeItem("x"), off());} catch (e) {nv.cookieEnabled ? on() : off();}}; w.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on) : "MozAppearance" in d.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db.onsuccess = off) : /constructor/i.test(w.HTMLElement) ? tryls() : !w.indexedDB && (w.PointerEvent || w.MSPointerEvent) ? on() : off();}).then(function (pm) {if (pm) {gaid(w, d, w.ct_ga, ct, 2);} else {gaid(w, d, w.ct_ga, ct, 3);}})} else {gaid(w, d, w.ct_ga, ct, 4);}}, function (f) {w[o](function () {f(w[o]);})}); }else{ ct(w, d, 'script', (ua?cid:null), 1, ym); }})

(window, document, navigator, localStorage, true, true);

</script>

<!-- /calltouch code -->
<?endif;?>

<?if(CITY_NAME == 'Белгород'):?>
<!-- calltouch code -->

<script type="text/javascript">

(function (w, d, nv, ls, ua, ym){

var lwait = function (w, on, trf, dly, ma, orf, osf) { var y = "yaCounter", pfx = "ct_await_", sfx = "_completed", yac = function () { for (var v in w) if (v.indexOf(y)==0&&w[v].getClientID&&w[v].getClientID()) return w[v]; return false; }; if (!w[pfx + on + sfx]) { var ci = clearInterval, si = setInterval, st = setTimeout, cmld = function () { if (!w[pfx + on + sfx]) { w[pfx + on + sfx] = true; if ((w[pfx + on] && (w[pfx + on].timer))) { ci(w[pfx + on].timer); w[pfx + on] = null; } orf((on==y?yac():w[on])); } }; if (!(on==y?yac():w[on])|| !osf) { if (trf(on==y?yac():w[on])) { cmld(); } else { if (!w[pfx + on]) { w[pfx + on] = { timer: si(function () { if (trf(on==y?yac():w[on]) || ma < ++w[pfx + on].attempt) { cmld(); } }, dly), attempt: 0 }; } } } else { if (trf(on==y?yac():w[on])) { cmld(); } else { osf(cmld); st(function () { lwait(w, on, trf, dly, ma, orf); }, 0); } } } else { orf(on==y?yac():w[on]); } };

var ct = function (w, d, e, c, n, ym) { var a = 'all', b = 'tou', src = b + 'c' + 'h'; src = 'm' + 'o' + 'd.c' + a + src; var jsHost = "https://" + src, s = [{"sp":"5","sc":d.createElement(e)}]; var jsf = function (w, d, s, h, c, n) { var rep = function (ycntr) { s.forEach(function(el) { el.sc.async = 1; el.sc.src = jsHost + "." + "r" + "u/d_client.js?param;specific_id"+el.sp+";" + (ycntr && ycntr.getClientID ? "ya_client_id" + ycntr.getClientID() + ";" : "") + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":181008}") + ";"; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(el.sc, p); }); }; if (ym) { lwait(w, 'yaCounter', function(obj) { return (obj && obj.getClientID ? true : false); }, 50, 100, function (yaCounter) {rep(yaCounter);}, function (f) { if(w.jQuery) {  w.jQuery(d).on('yacounter' + yc + 'inited', f ); }});} else {rep(null);} }; if (!w.jQuery) { var jq = d.createElement(e); jq.src = jsHost + "." + "r" + 'u/js/jquery-1.7.min.js'; jq.onload = function () { lwait(w, 'jQuery', function(obj) { return (obj ? true : false); }, 30, 100, function () { jsf(w, d, s, jsHost, c, n); } ); }; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(jq, p); } else { jsf(w, d, s, jsHost, c, n); }};

var gaid = function (w, d, o, ct, n) { if (!!o) { lwait(w, o, function (obj) {  return (obj && obj.getAll ? true : false); }, 200, (nv.userAgent.match(/Opera|OPR\//) ? 10 : 20), function (gaCounter) { var clId = null; try {  var cnt = gaCounter && gaCounter.getAll ? gaCounter.getAll() : null; clId = cnt && cnt.length > 0 && !!cnt[0] && cnt[0].get ? cnt[0].get('clientId') : null; } catch (e) { console.warn("Unable to get clientId, Error: " + e.message); } ct(w, d, 'script', clId, n, ym); }, function (f) { w[o](function () {  f(w[o]); })});} else{ ct(w, d, 'script', null, n, ym); }};

var cid = function () { try { var m1 = d.cookie.match('(?:^|;)\\s*_ga=([^;]*)'); if (!(m1 && m1.length > 1)) return null; var m2 = decodeURIComponent(m1[1]).match(/(\d+\.\d+)$/); if (!(m2 && m2.length > 1)) return null; return m2[1]; } catch (err) {}}();

if(cid === null && ua){ lwait(w, 'GoogleAnalyticsObject', function (obj) {return (obj ? true : false);}, 100, 10, function (gaObjectName) { if (gaObjectName == 'ga_ckpr') w.ct_ga = 'ga'; else w.ct_ga = gaObjectName; if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1) { new Promise(function (resolve) {var db, on = function () {resolve(true)}, off = function () {resolve(false)}, tryls = function tryls() {try {ls && ls.length ? off() : (ls.x = 1, ls.removeItem("x"), off());} catch (e) {nv.cookieEnabled ? on() : off();}}; w.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on) : "MozAppearance" in d.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db.onsuccess = off) : /constructor/i.test(w.HTMLElement) ? tryls() : !w.indexedDB && (w.PointerEvent || w.MSPointerEvent) ? on() : off();}).then(function (pm) {if (pm) {gaid(w, d, w.ct_ga, ct, 2);} else {gaid(w, d, w.ct_ga, ct, 3);}})} else {gaid(w, d, w.ct_ga, ct, 4);}}, function (f) {w[o](function () {f(w[o]);})}); }else{ ct(w, d, 'script', (ua?cid:null), 1, ym); }})

(window, document, navigator, localStorage, true, true);

</script>

<!-- /calltouch code -->
<?endif;?>

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
