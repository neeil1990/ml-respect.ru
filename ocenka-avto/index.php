<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Бесплатная онлайн оценка стоимости авто в Воронеже");
$APPLICATION->SetTitle("Оценка авто");
?>

<div class="form_box">
            <div class="container">
                <div class="bg_cars"></div>
                <ul class="breadcrumbs">
                    <li><a href="/">Респект</a></li>
                    <li><a href="javascript:void(0);">Оценка авто онлайн</a></li>
                </ul>

				<h1>Оценка авто</h1>
                
                <!--
                <div class="steps" id="stepWays">
                    <div class="steps_item step1 active_step">1. Марка и год выпуска</div>
                    <div class="steps_item step2">2. Пробег и ПТС</div>
                    <div class="steps_item step3">Результат оценки</div>
                </div>
                
                -->

                <div class="forms_steps_wrap">
                    <form action="#" class="form_step1" onsubmit="return carsEval(1);" id="formStep1">
                        <div class="title">Онлайн-оценка вашего автомобиля</div>
                        <p>В ближайшее время мы свяжемся с вами, уточним детали и назовем предварительную оценку автомобиля</p>
                        <div class="time_work">#WF_TIME_WORK#</div>
                        <select name="carsEvalBrands" class="select_auto" id="carsEvalBrands">
                            <option selected="selected" value="">Марка</option>
                        </select>
                        <select name="carsEvalModels" class="select_model" id="carsEvalModels">
                            <option selected="selected" value="">Модель</option>
                        </select>
                        <select name="carsEvalYear" class="select_year_start" id="carsEvalYear">
                            <option selected="selected" value="">Год выпуска</option>
                            <?for($i=2018;$i>=1998;$i--):?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <?endfor;?>
                        </select>
                        <div class="form_group" style="display: flex; justify-content: space-between;">
                            <label for="name">Ваше имя</label>
                            <input type="text" name="name" id="carsEvalName" placeholder="" />
                        </div>
                        <div class="form_group">
                            <label for="phone">Телефон для связи</label>
                            <input type="tel" name="phone" id="carsEvalPhone" placeholder="+7" />
                        </div>
                        <?//<button class="red_btn" type="submit" onclick="yandexGoal('COUNT'); return true;">Оценить</button> Олег: убрал onclick="yandexGoal('COUNT'); return true;"?>
                        <button class="red_btn" type="submit">Оценить</button>
                        <div class="privacy_text">Нажимая кнопку «Продолжить» вы соглашаетесь с <a href="/terms.pdf">пользовательским соглашением</a> и ознакомились с нашей <a href="/privacy.pdf">политикой конфиденциальности</a></div>
                    </form>

                    <form action="" class="form_step2" onsubmit="return carsEval(2);" id="formStep2">
                        <p>Для более точной оценки укажите пробег и другую дополнительную информацию об автомобиле.</p>
                        <div class="form_group">
                            <label for="carsEvalRun">Пробег</label>
                            <input type="text" name="carsEvalRun" class="only_d" placeholder="км" id="carsEvalRun" />
                        </div>
                        <select name="dyed" class="color_elem" id="carsEvalDyed">
                            <option selected="selected" value="">Крашенные элементы</option>
                            <option value="Отсутствуют">Отсутствуют</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3 и более">3 и более</option>
                        </select>
                        <div class="form_radio">
                            <span>ПТС</span>
                            <input type="radio" checked="checked" name="pts_type" class="radio" id="pts_orig" />
                            <label for="pts_orig">Оригинал</label>
                            <input type="radio" name="pts_type" class="radio" id="pts_double" />
                            <label for="pts_double">Дубликат</label>
                        </div>
                        <select name="owners" class="color_elem" id="carsEvalOwners">
                            <option selected="selected" value="">Владельцев по ПТС</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3 и более">3 и более</option>
                        </select>
                        <button class="red_btn" type="submit">Получить результат оценки</button>
                    </form>

                    <form action="/" class="form_step3" id="formStep3">
                        <div class="title">Заявка на оценку принята</div>
                        <div class="selected_auto">Ваш автомобиль: <span id="clientAuto"></span></div>
                        <div class="total_car_price" style="display: none;"><span id="clientPrice">2 630 550</span> ₽</div>
                        <p>В ближайшее время мы свяжемся с вами для уточнения деталей и назовем предварительную оценку вашего автомобиля. </p>
                        <p>Точную оценку своего автомобиля вы можете получить приехав к нам, предвательно записавшись на прием</p>
                    </form>

                </div>

            </div>
        </div>
        
        <div class="content">
            <div class="container">
                
                #WF_SEO_TEXT_1#
                
            </div>
        </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>