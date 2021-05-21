<?php

/**
 * Библиотека парсинга XML файлов для выгрузки на сайт ml-respect.ru
 * ---
 * Илья Глаголев, 10.01.2019 (vk.com/motoslam)
*/
//$_SERVER["DOCUMENT_ROOT"] = "/var/www/html"; //добавил определение кроня сайта что бы скрипт отработал по крону
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].'/export_maxposte.php');
class Paarser{

    private $import = [
        //['url' => 'http://caroperator.slms.ru/Export/socrat/', 'function' => 'caroperator', 'city' => 'Воронеж'],
                ['url' => 'https://media.cm.expert/stock/export/cmexpert/all/all/f3ce7c65dedabeb1e6e8ff360cfe5076.xml', 'function' => 'turbodealer', 'city' => 'Воронеж'],
                ['url' => 'https://media.cm.expert/stock/export/cmexpert/all/all/503ea7ea3c38cdbbd5fc1ffac62f2242.xml', 'function' => 'turbodealer', 'city' => 'Воронеж'],
                ['url' => 'https://media.cm.expert/stock/export/cmexpert/all/all/1917bd04c44d5e66b646f5136c5e2241.xml', 'function' => 'turbodealer', 'city' => 'Воронеж'],
                ['url' => 'https://media.cm.expert/stock/export/cmexpert/all/all/8a32e52cb215e15c3ae99615ceee1955.xml', 'function' => 'turbodealer', 'city' => 'Воронеж'],
        //['url' => 'http://turbodealer.ru/export/142226_site.xml', 'function' => 'turbodealer', 'city' => 'Воронеж'],
        //['url' => 'http://api2.carbay.ru/dealers/fortuna_auto.xml', 'function' => 'carbay', 'city' => 'Белгород'],// Олег : закоментировал старый адрес
        ['url' => 'https://media.cm.expert/stock/export/cmexpert/all/all/13f90db4450726a62d067823b8fc2109.xml', 'function' => 'turbodealer', 'city' => 'Белгород'],// Олег : новый адрес и обработчик турбодиллер
        ['url' => 'https://media.cm.expert/stock/export/cmexpert/all/all/eca95f4d0f0d23794c7efe21d10a2108.xml', 'function' => 'turbodealer', 'city' => 'Санкт-Петербург']
        //['url' => 'https://ml-respect.ru/export_maxposte.xml', 'function' => 'turbodealer', 'city' => 'Воронеж']
    ];

    private $auto_count = 0; /* Количество автомобилей */
    private $load_count = 0; /* Количество загруженных на сайт автомобилей */
    private $upload_path;    /* Путь для загрузки изображений */
    private $file_upload = '/upload/auto_images/';
    private $uri_array = []; /* Массив URL автомобилей, чтобы не повторялись */

    public $d_array = array();
    public $actual_dir_array = array(); // Массив для удаления лишних директорий
    public $brands_array = array();     // Список всех используемых брендов
    public $models_array = array();     // Список всех используемых моделей
    public $brand_c_array = array();    // Количество объявлений данного бренда

    private $cars;
    private $xml_cars;
    private $xml_belgorod;

    public function __construct(){
        # Ищем все папки с изображениями
        $this->upload_path = $_SERVER['DOCUMENT_ROOT'] . '/upload/auto_images';
        $dirs = scandir($this->upload_path);
        foreach($dirs as $dir){
            if(is_dir($this->upload_path.'/'.$dir) && $dir != '.' && $dir != '..'){
                $this->d_array[] = $dir;
            }
        }

        # Сканируем файлы
        $this->analyze();

        # Удаление директорий картинок, не являющихся актуальными
        $deleted_directories = array_diff($this->d_array, $this->actual_dir_array);
        foreach($deleted_directories as $dir){
            $files = scandir($this->upload_path . '/' . $dir);
            foreach($files as $file){
                if($file == '.' || $file == '..') continue;
                unlink($this->upload_path . '/' . $dir . '/' . $file);
            }
            rmdir($this->upload_path . '/' . $dir);
        }

        # Пишем файлы импорта
        $this->save();
        $this->saveXML($this->xml_cars, 'https://ml-respect.ru', 'offers.xml');
        $this->saveXML($this->xml_belgorod, 'https://belgorod.ml-respect.ru', 'offers_belgorod.xml');
        // ссылка БЕЗ слэша в конце
        $this->saveFacebookFeed('Воронеж', 'feed36.xml', 'https://ml-respect.ru');
        $this->saveFacebookFeed('Белгород', 'feed31.xml', 'https://belgorod.ml-respect.ru');
        $this->saveFacebookFeed('Санкт-Петербург', 'feed78.xml', 'https://spb.ml-respect.ru');
        $this->saveFacebookFeedAuto('Воронеж', 'feed_vrn3.xml', 'https://ml-respect.ru');
    }

    public function analyze(){
        foreach($this->import as $import){
            $func = $import['function'];
            $this->$func($import['url'], $import['city']);
        }
    }

    public function save(){
        # Создание CSV файла
        $fv = fopen($_SERVER['DOCUMENT_ROOT'] . '/upload/offers.csv', 'w');
        foreach ($this->cars as $car) {
            fputcsv($fv, $car, ';');
        }
        fclose($fv);

        ksort($this->brands_array);

        # Создание файлов для фильтрации
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/inc/brands.php', 'w');
        foreach ($this->brands_name_array as $brand=>$bool) {
            $arParams = array("replace_space"=>"-","replace_other"=>"-");
            $brand_code = Cutil::translit($brand,"ru",$arParams);
            fwrite($fp, '<option value="'.$brand_code.'">' . ucfirst($brand) . "</option>\r\n");
        }
        fclose($fp);

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/inc/models.php', serialize($this->models_array));

        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/inc/brands_home.php', 'w');
        foreach ($this->brands_array as $brand=>$bool) {

            fwrite($fp, '<div class="car_list_item clearfix">
            <div class="car_list_item_name">
            <a href="/car/?arrFilter_pf%5Bbrand%5D='.urlencode($brand).'&set_filter=Y">' . ucfirst($brand) . '</a>
            </div><div class="car_list_item_col">' . $this->brand_c_array[$brand] . '</div>
            </div>' . "\r\n");
        }
        fclose($fp);
    }

    public function saveXML($cars, $url, $output){
        $param_names = ['year' => 'Год выпуска', 'engine' => 'Двигатель', 'run' => 'Пробег'];

        # Создание XML файла
        $version = '1.0';
        $encoding = 'UTF-8';
        $rootName = 'yml_catalog';
        $catName = 'shop';
        $itemsName = 'offers';
        $itemName = 'offer';

        $xml = new XMLWriter();

        $xml->openMemory();
        $xml->setIndent(true);
        $xml->startDocument($version, $encoding);

        $xml->writeDtd('yml_catalog', NULL, 'shops.dtd');

        $xml->startElement($rootName);

            $xml->startAttribute('date');
                $xml->text(date('Y-m-d H:i'));
            $xml->endAttribute();

            $xml->startElement($catName);

            $xml->startElement('name');
                $xml->text('РЕСПЕКТ авто с пробегом');
            $xml->endElement();

            $xml->startElement('company');
                $xml->text('ООО "ВТБ"');
            $xml->endElement();

            $xml->startElement('url');
                $xml->text($url);
            $xml->endElement();

            $xml->startElement('currencies');
                $xml->startElement('currency');
                    $xml->startAttribute('id');
                        $xml->text('RUR');
                    $xml->endAttribute();
                    $xml->startAttribute('rate');
                        $xml->text('1');
                    $xml->endAttribute();
                $xml->endElement();
            $xml->endElement();

            $xml->startElement('categories');
                $xml->startElement('category');
                    $xml->startAttribute('id');
                        $xml->text('1');
                    $xml->endAttribute();
                    $xml->text('Основная подборка');
                $xml->endElement();
            $xml->endElement();

            $xml->startElement($itemsName);

                foreach($cars as $car){
                    $xml->startElement($itemName);

                        $xml->startAttribute('id');
                            $xml->text($car['id']);
                        $xml->endAttribute();

                        $xml->startAttribute('available');
                            $xml->text('true');
                        $xml->endAttribute();

                        $xml->startElement('currencyId');
                            $xml->text('RUR');
                        $xml->endElement();

                        $xml->startElement('categoryId');
                            $xml->text('1');
                        $xml->endElement();

                        foreach($car as $id=>$value){
                            if($id == 'id') continue;
                            if(in_array($id, ['year', 'engine', 'run'])){
                                $xml->startElement('param');
                                    $xml->startAttribute('name');
                                        $xml->text($param_names[$id]);
                                    $xml->endAttribute();
                                    $xml->text($value);
                                $xml->endElement();
                                continue;
                            }
                            if($id == 'picture'){
                                foreach($value as $picture){
                                    $xml->startElement($id);
                                        $xml->text($picture);
                                    $xml->endElement();
                                }
                                continue;
                            }
                            if($id == 'price') $value = number_format($value, 2, '.', '');
                            $xml->startElement($id);
                                $xml->text($value);
                            $xml->endElement();
                        }

                    $xml->endElement();
                }

            $xml->endElement();
            $xml->endElement();
        $xml->endElement();
        $xml->endDocument();
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/' . $output, $xml->outputMemory());
    }

    public function saveFacebookFeed($city, $file, $link){
        $param_names = ['year' => 'Год выпуска', 'engine' => 'Двигатель', 'run' => 'Пробег'];

        $useless = []; // Добавленные ID автомобилей

        # Создание XML файла
        $version = '1.0';
        $encoding = 'UTF-8';
        $rootName = 'rss';
        $catName = 'channel';
        $itemName = 'item';

        $xml = new XMLWriter();

        $xml->openMemory();
        $xml->setIndent(true);
        $xml->startDocument($version, $encoding);

        $xml->startElement($rootName);

            $xml->startAttribute('xmlns:g');
                $xml->text('http://base.google.com/ns/1.0');
            $xml->endAttribute();

            $xml->startAttribute('version');
                $xml->text('2.0');
            $xml->endAttribute();

            $xml->startElement($catName);

                $xml->startElement('title');
                    $xml->text('Мотор Ленд Респект ' . $city);
                $xml->endElement();

                $xml->startElement('link');
                    $xml->text($link);
                $xml->endElement();

                $xml->startElement('description');
                    $xml->text('Мотор Ленд Респект ' . $city);
                $xml->endElement();

                foreach($this->cars as $car){
                    if($car['city'] == $city && !in_array($car['id'], $useless)){
                        $useless[] = $car['id'];

                        $xml->startElement($itemName);

                            $xml->startElement('g:id');
                                $xml->text($car['id']);
                            $xml->endElement();

                            $xml->startElement('g:title');
                                $xml->text($car['name']);
                            $xml->endElement();

                            $xml->startElement('g:description');
                                if(!empty($car['comment'])){
                                    $xml->text(mb_substr($car['comment'], 0, 4900));
                                }
                            $xml->endElement();

                            $xml->startElement('g:link');
                                $xml->text($link . '/car/' . $car['url_code'] . '/?utm_source=facebook');
                            $xml->endElement();

                            $xml->startElement('g:image_link');
                                $xml->text($link . $car['image']);
                            $xml->endElement();

                            $xml->startElement('g:brand');
                                $xml->text($car['brand']);
                            $xml->endElement();

                            $xml->startElement('g:condition');
                                $xml->text('used');
                            $xml->endElement();

                            $xml->startElement('g:availability');
                                $xml->text('in stock');
                            $xml->endElement();

                            $xml->startElement('g:price');
                                $xml->text($car['price']);
                            $xml->endElement();

                            $xml->startElement('g:google_product_category');
                                $xml->text('Vehicles &amp; Parts &gt; Vehicles &gt; Motor Vehicles &gt; Cars, Trucks &amp; Vans');
                            $xml->endElement();

                        $xml->endElement();
                    }
                }

            $xml->endElement();

        $xml->endElement();
        $xml->endDocument();
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/' . $file, $xml->outputMemory());
    }

    public function saveFacebookFeedAuto($city, $file, $link){
        $param_names = ['year' => 'Год выпуска', 'engine' => 'Двигатель', 'run' => 'Пробег'];

        $useless = []; // Добавленные ID автомобилей

        # Создание XML файла
        $version = '1.0';
        $encoding = 'UTF-8';
        $rootName = 'listings';
        $catName = '';
        $itemName = 'listing';

        $xml = new XMLWriter();

        $xml->openMemory();
        $xml->setIndent(true);
        $xml->startDocument($version, $encoding);

        $xml->startElement($rootName);

            $xml->startAttribute('xmlns:g');
                $xml->text('http://base.google.com/ns/1.0');
            $xml->endAttribute();

            $xml->startAttribute('version');
                $xml->text('2.0');
            $xml->endAttribute();

            //$xml->startElement($catName);

                $xml->startElement('title');
                    $xml->text('Мотор Ленд Респект ' . $city);
                $xml->endElement();

                $xml->startElement('link');

                    $xml->startAttribute('rel');
                        $xml->text('self');
                    $xml->endAttribute();

                    $xml->text($link);

                $xml->endElement();

                foreach($this->cars as $car){
                    if($car['city'] == $city && !in_array($car['id'], $useless)){
                        $useless[] = $car['id'];

                        $body_style = 'OTHER';
                        if (stripos($car['body-type'], 'седан') !== false) {
                            $body_style = 'SEDAN';
                        }
                        if (stripos($car['body-type'], 'хэтчбек') !== false) {
                            $body_style = 'HATCHBACK';
                        }
                        if (stripos($car['body-type'], 'внедорожник') !== false) {
                            $body_style = 'CROSSOVER';
                        }
                        if (stripos($car['body-type'], 'купе') !== false) {
                            $body_style = 'COUPE';
                        }
                        if (stripos($car['body-type'], 'кабриолет') !== false) {
                            $body_style = 'CONVERTIBLE';
                        }
                        if (stripos($car['body-type'], 'минивэн') !== false) {
                            $body_style = 'MINIVAN';
                        }
                        if (stripos($car['body-type'], 'универсал') !== false) {
                            $body_style = 'WAGON';
                        }

                        $drivetrain = 'Other';
                        if (stripos($car['gear-type'], 'полный') !== false) {
                            $drivetrain = 'AWD';
                        }
                        if (stripos($car['gear-type'], 'передний') !== false) {
                            $drivetrain = 'FWD';
                        }
                        if (stripos($car['gear-type'], 'задний') !== false) {
                            $drivetrain = 'RWD';
                        }

                        $transmission = 'Automatic';
                        if (stripos($car['transmission'], 'механика') !== false) {
                            $transmission = 'Manual';
                        }

                        /*
                        Condition of the vehicle. Expected values: excellent, good, fair, poor, or other.
                        */

                        $condition = 'good';
                        if (stripos($car['state'], 'отличное') !== false) {
                            $condition = 'excellent';
                        }
                        if (stripos($car['state'], 'отличное') !== false) {
                            $condition = 'excellent';
                        }

                        $xml->startElement($itemName);

                            $xml->startElement('vehicle_id');
                                $xml->text($car['id']);
                            $xml->endElement();

                            $xml->startElement('vin');
                                $xml->text($car['vin']);
                            $xml->endElement();

                            $xml->startElement('title');
                                $xml->text($car['name']);
                            $xml->endElement();

                            $xml->startElement('description');
                                if(!empty($car['comment'])){
                                    $xml->text($car['comment']);
                                }
                            $xml->endElement();

                            $xml->startElement('url');
                                $xml->text($link . '/car/' . $car['url_code']);
                            $xml->endElement();

                            $xml->startElement('make');
                                $xml->text($car['brand']);
                            $xml->endElement();

                            $xml->startElement('model');
                                $xml->text($car['model']);
                            $xml->endElement();

                            $xml->startElement('year');
                                $xml->text($car['year']);
                            $xml->endElement();

                            $xml->startElement('image');
                                $xml->startElement('url');
                                    $xml->text($link . $car['image']);
                                $xml->endElement();
                                $xml->startElement('tag');
                                    $xml->text('Exterior');
                                $xml->endElement();
                            $xml->endElement();

                            $xml->startElement('body_style');
                                $xml->text($body_style);
                            $xml->endElement();

                            $xml->startElement('transmission');
                                $xml->text($transmission);
                            $xml->endElement();

                            $xml->startElement('mileage');
                                $xml->startElement('value');
                                    $xml->text($car['run']);
                                $xml->endElement();
                                $xml->startElement('unit');
                                    $xml->text('KM');
                                $xml->endElement();
                            $xml->endElement();

                            $xml->startElement('drivetrain');
                                $xml->text($drivetrain);
                            $xml->endElement();

                            $xml->startElement('price');
                                $xml->text($car['price']);
                            $xml->endElement();

                            $xml->startElement('state_of_vehicle');
                                $xml->text('USED');
                            $xml->endElement();

                            $xml->startElement('exterior_color');
                                $xml->text($car['color']);
                            $xml->endElement();

                            /*$xml->startElement('fuel_type');
                                $xml->text($car['engine-type']);
                            $xml->endElement();*/

                            $xml->startElement('condition');
                                $xml->text($condition);
                            $xml->endElement();

                            $xml->startElement('availability');
                                $xml->text('AVAILABLE');
                            $xml->endElement();

                            $xml->startElement('address');

                                $xml->startAttribute('format');
                                    $xml->text('simple');
                                $xml->endAttribute();

                                $xml->startElement('component');
                                    $xml->startAttribute('name');
                                        $xml->text('addr1');
                                    $xml->endAttribute();
                                    $xml->text('ул. Изыскателей 23');
                                $xml->endElement();

                                $xml->startElement('component');
                                    $xml->startAttribute('name');
                                        $xml->text('city');
                                    $xml->endAttribute();
                                    $xml->text($city);
                                $xml->endElement();

                                $xml->startElement('component');
                                    $xml->startAttribute('name');
                                        $xml->text('region');
                                    $xml->endAttribute();
                                    $xml->text('Воронежская обл.');
                                $xml->endElement();

                                $xml->startElement('component');
                                    $xml->startAttribute('name');
                                        $xml->text('country');
                                    $xml->endAttribute();
                                    $xml->text('Россия');
                                $xml->endElement();

                            $xml->endElement();

                            $xml->startElement('latitude');
                                $xml->text('51.663853');
                            $xml->endElement();

                            $xml->startElement('longitude');
                                $xml->text('39.299749');
                            $xml->endElement();

                        $xml->endElement();
                    }
                }

            //$xml->endElement();

        $xml->endElement();
        $xml->endDocument();
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/' . $file, $xml->outputMemory());
    }

    public function caroperator($import, $city){
        $bodyTypeFileName = 'body-type.xml';
        $brandFileName = 'brand.xml';
        $modelFileName = 'model.xml';
        $colorFileName = 'color.xml';
        $engineTypeFileName = 'engine-type.xml';
        $gearTypeFileName = 'gear-type.xml';
        $transmissionFileName = 'transmission.xml';
        $carsFileName = 'data.xml';

        $proporties = array();

        # body-types
        $url = $import.$bodyTypeFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['body-type'][(string)$item->id] = (string)$item->value;
            }
        }

        # brands
        $url = $import.$brandFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['brand'][(string)$item->id] = (string)$item->value;
            }
        }

        # models
        $url = $import.$modelFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['model'][(string)$item->id] = (string)$item->value;
            }
        }

        # colors
        $url = $import.$colorFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['color'][(string)$item->id] = (string)$item->value;
            }
        }

        # engine-types
        $url = $import.$engineTypeFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['engine-type'][(string)$item->id] = (string)$item->value;
            }
        }

        # gear-types
        $url = $import.$gearTypeFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['gear-type'][(string)$item->id] = (string)$item->value;
            }
        }

        # transmission
        $url = $import.$transmissionFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);
        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $item){
                $proporties['transmission'][(string)$item->id] = (string)$item->value;
            }
        }

        $url = $import.$carsFileName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = curl_exec($curl);
        curl_close($curl);

        if($simpleXml) {
            $simpleXml = simplexml_load_string($simpleXml);
            if (isset($simpleXml->car)) {
                foreach ($simpleXml->car as $car) {

                    $this->auto_count++;

                    $name = $proporties['brand'][(string)$car->brand] . ' ' . $proporties['model'][(string)$car->model];
                    $url_code = str_replace(['(', ')', '*', '"', '`', "'"], '', strtolower($name));
                    $url_code = str_replace([' '], '-', $url_code);
                    if (in_array($url_code, $this->uri_array)) {
                        $i = 1;
                        $test_uri = '';
                        do {
                            $test_uri = $url_code . '-' . $i;
                            $i++;
                        } while (in_array($test_uri, $this->uri_array));
                        $url_code = $test_uri;
                    }
                    $this->uri_array[] = $url_code;

                    $equipments = array();
                    if (isset($car->equipment)) {
                        foreach ($car->equipment as $equipment) {
                            $equipments[] = (string)$equipment;
                        }
                    }


                    $images = array();

                    if (isset($car->image)) {
                        $dirname = 'co_' . (string)$car->id;
                        $this->actual_dir_array[] = $dirname;
                        $scan_images = false;
                        if (in_array($dirname, $this->d_array)) {
                            $scan_images = scandir($this->upload_path . '/' . $dirname);
                        } else {
                            mkdir($this->upload_path . '/' . $dirname, 0755);
                        }
                        foreach ($car->image as $idx => $image) {
                            $images[] = $this->file_upload . $dirname . '/' . $image;
                            if ($scan_images && in_array($image, $scan_images)) {
                                continue;
                            }
                            $ch = curl_init($import . 'images/' . $image);
                            $fp = fopen($this->upload_path . '/' . $dirname . '/' . $image, 'wb');
                            curl_setopt($ch, CURLOPT_FILE, $fp);
                            curl_setopt($ch, CURLOPT_HEADER, 0);
                            curl_exec($ch);
                            curl_close($ch);
                            fclose($fp);
                        }
                    } else {
                        continue;
                    }

                    $ubrand = strtolower($proporties['brand'][(string)$car->brand]);
                    $umodel = strtolower($proporties['model'][(string)$car->model]);

                    $this->brands_name_array[(string)$car->brand] = true; // Олег : собираю массив с нормальными именами
                    $this->brands_array[$ubrand] = true;
                    if (!isset($this->models_array[$ubrand])) {
                        $this->models_array[$ubrand][] = $umodel;
                    } else {
                        if (!in_array($umodel, $this->models_array[$ubrand])) {
                            $this->models_array[$ubrand][] = $umodel;
                        }
                    }
                    if (isset($this->brand_c_array[$ubrand])) {
                        $this->brand_c_array[$ubrand]++;
                    } else {
                        $this->brand_c_array[$ubrand] = 1;
                    }

                    $each_array = array();
                    $count_images = count($images);
                    $count_equipments = count($equipments);
                    if ($count_images > $count_equipments) {
                        $each_array = $images;
                    } else {
                        $each_array = $equipments;
                    }

                    $date = date('d.m.Y H:i:s');
                    if (!empty($car->date)) {
                        $date = date('d.m.Y H:i:s', strtotime((string)$car->date));
                    }

                    $states = [
                        '1' => 'Отличное',
                        '2' => 'Хорошее',
                        '3' => 'Требует ремонта',
                        '11' => 'Новый',
                        '12' => 'Среднее'
                    ];

                    foreach ($each_array as $idx => $element) {

                        $this->cars[] = array(
                            'id' => 'vco' . (string)$car->id,
                            'name' => $name,
                            'url_code' => $url_code,
                            'vin' => (!empty($car->vin)) ? (string)$car->vin : '',
                            'brand' => $proporties['brand'][(string)$car->brand],
                            'model' => $proporties['model'][(string)$car->model],
                            'year' => (!empty($car->year)) ? (string)$car->year : '',
                            'price' => (!empty($car->price)) ? (string)$car->price : '',
                            'run' => (!empty($car->run)) ? (string)$car->run : '',
                            'power' => (!empty($car->power)) ? (string)$car->power : '',
                            'color' => $proporties['color'][(string)$car->color],
                            'body-type' => $proporties['body-type'][(string)$car->{'body-type'}],
                            'engine-type' => $proporties['engine-type'][(string)$car->{'engine-type'}],
                            'gear-type' => $proporties['gear-type'][(string)$car->{'gear-type'}],
                            'displacement' => (!empty($car->displacement)) ? (string)$car->displacement : '',
                            'transmission' => $proporties['transmission'][(string)$car->transmission],
                            'steering-wheel' => (!empty($car->{'steering-wheel'})) ? (string)$car->{'steering-wheel'} : '',
                            'image' => (isset($images[$idx])) ? $images[$idx] : end($images),
                            'equipment' => (isset($equipments[$idx])) ? $equipments[$idx] : end($equipments),
                            'comment' => '',
                            'date' => $date,
                            'state' => $states[(string)$car->state],
                            'city' => $city,
                            'filial' => 699,
                            'CITY_LIST' => $city,
                            'BRAND_SECTION' =>  $proporties['brand'][(string)$car->brand],
                            'MODEL_SECTION' =>  $proporties['model'][(string)$car->model],
                        );

                    }

                    $xml_images = array();
                    if(isset($images[0])) $xml_images[] = 'http://ml-respect.ru' . $images[0];
                    if(isset($images[1])) $xml_images[] = 'http://ml-respect.ru' . $images[1];
                    if(isset($images[2])) $xml_images[] = 'http://ml-respect.ru' . $images[2];
                    if(isset($images[3])) $xml_images[] = 'http://ml-respect.ru' . $images[3];
                    if(isset($images[4])) $xml_images[] = 'http://ml-respect.ru' . $images[4];


                    $xml_engine  = (!empty($car->displacement)) ? (string)$car->displacement . ' см3 / ' : '';
                    $xml_engine .= (!empty($car->power)) ? (string)$car->power . ' л.с. / ' : '';
                    $xml_engine .= $proporties['engine-type'][(string)$car->{'engine-type'}];

                    $this->xml_cars[] = array(
                        'id' => (string)$car->id,
                        'name'  => $name,
                        'url'   => 'http://ml-respect.ru/car/' . $url_code,
                        'price' => (!empty($car->price)) ? (string)$car->price : 0,
                        'picture' => $xml_images,
                        'description' => '',
                        'year' => (!empty($car->year)) ? (string)$car->year : '',
                        'engine' => $xml_engine,
                        'run' => (!empty($car->run)) ? (string)$car->run . ' км.' : '',
                    );

                }
            }
        }
    }

    public function carbay($import, $city)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $import);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);

        if(isset($simpleXml->item)){
            foreach($simpleXml->item as $car){

                if($car->run < 50){ continue; }

                $this->auto_count++;

                $name = ((!empty($car->mark_name)) ? (string)$car->mark_name : '') . ' ' . ((!empty($car->model_name)) ? (string)$car->model_name : '');
                $url_code = str_replace(['(', ')', '*', '"', '`', "'"], '', strtolower($name));
                $url_code = str_replace([' '], '-', $url_code);
                if(in_array($url_code, $this->uri_array)){
                    $i=1;
                    $test_uri = '';
                    do{
                        $test_uri = $url_code . '-' . $i;
                        $i++;
                    }while(in_array($test_uri, $this->uri_array));
                    $url_code = $test_uri;
                }
                $this->uri_array[] = $url_code;

                $equipments = array();
                if(isset($car->equipment)){
                    foreach($car->equipment->equipment as  $equipment){
                        $equipments[] = (string)$equipment;
                    }
                }

                $images = array();

                if(isset($car->images)){
                    $photos = $car->images;
                    $dirname = 'cb_' . (string)$car->id;
                    $this->actual_dir_array[] = $dirname;
                    $scan_images = false;
                    if(in_array($dirname, $this->d_array)){
                        $scan_images = scandir($this->upload_path . '/' . $dirname);
                    }else{
                        mkdir($this->upload_path . '/' . $dirname, 0755);
                    }
                    foreach($photos->images as $idx=>$image){
                        $image_a = explode('/', $image);
                        $images[] = $this->file_upload . $dirname . '/' . end($image_a);
                        if($scan_images && in_array(end($image_a), $scan_images)){
                            continue;
                        }
                        $ch = curl_init($image);
                        $fp = fopen($this->upload_path . '/' . $dirname . '/' . end($image_a), 'wb');
                        curl_setopt($ch, CURLOPT_FILE, $fp);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_exec($ch);
                        curl_close($ch);
                        fclose($fp);
                    }
                }else{
                    continue;
                }

                $ubrand = strtolower((string)$car->mark_name);
                $umodel = strtolower((string)$car->model_name);
                $this->brands_name_array[(string)$car->mark_name] = true; // Олег : собираю массив с нормальными именами
                $this->brands_array[$ubrand] = true;
                if(!isset($this->models_array[$ubrand])){
                    $this->models_array[$ubrand][] = $umodel;
                }else{
                    if(!in_array($umodel, $this->models_array[$ubrand])){
                        $this->models_array[$ubrand][] = $umodel;
                    }
                }
                if(isset($this->brand_c_array[$ubrand])){
                    $this->brand_c_array[$ubrand]++;
                }else{
                    $this->brand_c_array[$ubrand] = 1;
                }

                $each_array = array();
                $count_images = count($images);
                $count_equipments = count($equipments);
                if($count_images > $count_equipments){
                    $each_array = $images;
                }else{
                    $each_array = $equipments;
                }

                $date = date('d.m.Y H:i:s');
                if(!empty($car->created)){
                    $date = date('d.m.Y H:i:s', strtotime((string)$car->created));
                }

                foreach($each_array as $idx=>$element){

                    $this->cars[] = array(
                        'id' => 'bcb' . (string)$car->id,
                        'name' => $name,
                        'url_code' => $url_code,
                        'vin' => (!empty($car->vin)) ? (string)$car->vin : '',
                        'brand' => (!empty($car->mark_name)) ? (string)$car->mark_name : '',
                        'model' => (!empty($car->model_name)) ? (string)$car->model_name : '',
                        'year' => (!empty($car->year)) ? (string)$car->year : '',
                        'price' => (!empty($car->price)) ? (string)$car->price : '',
                        'run' => (!empty($car->run)) ? (string)$car->run : '',
                        'power' => (!empty($car->engine_power)) ? (string)$car->engine_power : '',
                        'color' => (!empty($car->color)) ? (string)$car->color : '',
                        'body-type' => (!empty($car->body)) ? (string)$car->body : '',
                        'engine-type' => (!empty($car->engine_key)) ? (string)$car->engine_key : '',
                        'gear-type' => (!empty($car->drive_key)) ? (string)$car->drive_key : '',
                        'displacement' => (!empty($car->engine_volume)) ? (string)$car->engine_volume : '',
                        'transmission' => (!empty($car->transmission)) ? (string)$car->transmission : '',
                        'steering-wheel' => '',
                        'image' => (isset($images[$idx])) ? $images[$idx] : end($images),
                        'equipment' => (isset($equipments[$idx])) ? $equipments[$idx] : end($equipments),
                        'comment' => (!empty($car->about)) ? (string)$car->about : '',
                        'date' => $date,
                        'state' => '',
                        'city' => $city,
                        'filial' => 1175,
                        'CITY_LIST' => $city,
                        'panorama' => '',
                        'BRAND_SECTION' =>  (!empty($car->mark_name)) ? (string)$car->mark_name : '',
                        'MODEL_SECTION' =>  (!empty($car->model_name)) ? (string)$car->model_name : '',
                    );

                }

                if($city == 'Белгород'):

                    $xml_images = array();
                    if(isset($images[0])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[0];
                    if(isset($images[1])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[1];
                    if(isset($images[2])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[2];
                    if(isset($images[3])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[3];
                    if(isset($images[4])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[4];

                    $xml_engine  = (!empty($car->modification_name)) ? (string)$car->modification_name : '';

                    $this->xml_belgorod[] = array(
                        'id' => (string)$car->id,
                        'name'  => $name,
                        'url'   => 'https://belgorod.ml-respect.ru/car/' . $url_code,
                        'price' => (!empty($car->price)) ? (string)$car->price : 0,
                        'picture' => $xml_images,
                        'description' => (!empty($car->description)) ? (string)$car->description : '',
                        'year' => (!empty($car->year)) ? (string)$car->year : '',
                        'engine' => $xml_engine,
                        'run' => (!empty($car->run)) ? (string)$car->run . ' км.' : '',
                    );

                endif;

            }
        }
    }

    public function turbodealer($import, $city)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $import);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $simpleXml = simplexml_load_string(curl_exec($curl));
        curl_close($curl);

        $sellers = array(
            '74732122376' => 699,
            '74732122338' => 2310,
            '74732757010' => 2310,
            //'74732122160' => 701, // Олег: старый номер телефона для салона Volvo
            '74732122970' => 701,   // Олег: новый номер телефона для салона Volvo
            '74732330323' => 701,
            '74732323023' => 702,
            '74732122707' => 702,
            '74732122510' => 702,   // Олег: добавил еще один номер телефона для салона Nissan
            '78126001800' => 1004,
            '78124248351' => 1004,
            '74732122553' => 2310,
            '78124934345' => 1004,
            '78122109071' => 1004,
            '74722599701' => 1175, // Олег: добавил филиал
            '74722599749' => 1175,
            '74732123538' => 2310, // Олег: добавил еще один номер телефона для салона Mitsubishi

        );

        //

        if(isset($simpleXml->cars)){
            foreach($simpleXml->cars->car as $car){

                $this->auto_count++;

                $name = ((!empty($car->mark_id)) ? (string)$car->mark_id : '') . ' ' . ((!empty($car->folder_id)) ? (string)$car->folder_id : '');
                $url_code = $this->getPseudoUrl(strtolower($name));
                if(in_array($url_code, $this->uri_array)){
                    $i=1;
                    $test_uri = '';
                    do{
                        $test_uri = $url_code . '-' . $i;
                        $i++;
                    }while(in_array($test_uri, $this->uri_array));
                    $url_code = $test_uri;
                }
                $this->uri_array[] = $url_code;

                $equipments = array();
                if(isset($car->extras)){
                    $extras = explode(',', (string)$car->extras);
                    foreach($extras as $equipment){
                        if(!empty($equipment)){
                            $equipments[] = ucfirst((string)$equipment);
                        }
                    }
                }

                $panorama = '';
                if(isset($car->panoramas)){
                    $panorama = 'Да';
                }

                $images = array();

                if(isset($car->images)){
                    $photos = $car->images;
                    $dirname = 'td_' . (string)$car->unique_id;
                    $this->actual_dir_array[] = $dirname;
                    $scan_images = false;
                    if(in_array($dirname, $this->d_array)){
                        $scan_images = scandir($this->upload_path . '/' . $dirname);
                    }else{
                        mkdir($this->upload_path . '/' . $dirname, 0755);
                    }
                    foreach($photos->image as $idx=>$image){
                        $images[] = $this->file_upload . $dirname . '/' . basename($image);
                        if($scan_images && in_array(basename($image), $scan_images)){
                            continue;
                        }
                        $ch = curl_init($image);
                        $fp = fopen($this->upload_path . '/' . $dirname . '/' . basename($image), 'wb');
                        curl_setopt($ch, CURLOPT_FILE, $fp);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_exec($ch);
                        curl_close($ch);
                        fclose($fp);
                    }
                }else{
                    continue;
                }

                $tmp = explode(',', (string)$car->folder_id);

                $ubrand = strtolower((string)$car->mark_id);
                $umodel = strtolower($tmp[0]);
                $this->brands_array[$ubrand] = true;
                $this->brands_name_array[(string)$car->mark_id] = true; // Олег : собираю массив с нормальными именами
                if(!isset($this->models_array[$ubrand])){
                    $this->models_array[$ubrand][] = $umodel;
                }else{
                    if(!in_array($umodel, $this->models_array[$ubrand])){
                        $this->models_array[$ubrand][] = $umodel;
                    }
                }
                if(isset($this->brand_c_array[$ubrand])){
                    $this->brand_c_array[$ubrand]++;
                }else{
                    $this->brand_c_array[$ubrand] = 1;
                }

                $each_array = array();
                $count_images = count($images);
                $count_equipments = count($equipments);
                if($count_images > $count_equipments){
                    $each_array = $images;
                }else{
                    $each_array = $equipments;
                }

                $date = date('d.m.Y H:i:s');

                preg_match('#\((.*?)\)#', (string)$car->modification_id, $match);
                $power = (int)$match[1];

                $kpp = 'Механика';
                $res = strpos((string)$car->modification_id, 'AT');
                if($res !== false){
                    $kpp = 'Автомат';
                }
                $res = strpos((string)$car->modification_id, 'AMT');
                if($res !== false){
                    $kpp = 'Робот';
                }
                $res = strpos((string)$car->modification_id, 'CVT');
                if($res !== false){
                    $kpp = 'Вариатор';
                }
                // Олег: создание смивольных кодов
                $translitParams = array("replace_space"=>"-","replace_other"=>"-");
                $brand_code = strtolower(Cutil::translit((!empty($car->mark_id)) ? (string)$car->mark_id : '',"ru",$translitParams));
                $model_code = strtolower(Cutil::translit((!empty($tmp[0])) ? $tmp[0] : '',"ru",$translitParams));

                foreach($each_array as $idx=>$element){

                    $this->cars[] = array(
                        'id' => 'vtd' . (string)$car->unique_id,
                        'name' => $name,
                        'url_code' => $url_code,
                        'vin' => (!empty($car->vin)) ? (string)$car->vin : '',
                        'brand' => (!empty($car->mark_id)) ? (string)$car->mark_id : '',
                        'model' => (!empty($tmp[0])) ? $tmp[0] : '',
                        'year' => (!empty($car->year)) ? (string)$car->year : '',
                        'price' => (!empty($car->price)) ? (string)$car->price : '',
                        'run' => (!empty($car->run)) ? (string)$car->run : '',
                        'power' => ($power>0) ? $power : '',
                        'color' => (!empty($car->color)) ? (string)$car->color : '',
                        'body-type' => (!empty($car->body_type)) ? (string)$car->body_type : '',
                        'engine-type' => (!empty($car->engine_type)) ? (string)$car->engine_type : '',
                        'gear-type' => (!empty($car->gear_type)) ? (string)$car->gear_type : '',
                        'displacement' => '',
                        'transmission' => $kpp,
                        'steering-wheel' => (!empty($car->wheel)) ? (string)$car->wheel : '',
                        'image' => (isset($images[$idx])) ? $images[$idx] : end($images),
                        'equipment' => (isset($equipments[$idx])) ? $equipments[$idx] : end($equipments),
                        'comment' => (!empty($car->description)) ? (string)$car->description : '',
                        'date' => $date,
                        'state' => (!empty($car->state)) ? (string)$car->state : '',
                        'city' => $city,
                        'filial' => (!empty($sellers[(string)$car->contact_info->contact->phone])) ? $sellers[(string)$car->contact_info->contact->phone] : 699,
                        'CITY_LIST' => $city,
                        'panorama' => $panorama,
                        'BRAND_SECTION' =>  (!empty($car->mark_id)) ? (string)$car->mark_id : '',
                        'MODEL_SECTION' =>  (!empty($tmp[0])) ? $tmp[0] : '',
                        'BRAND_SECTION_CODE' =>  $brand_code, // Олег: символьный код раздела бренда
                        'MODEL_SECTION_CODE' =>  $model_code,  // Олег: символьный код подраздела модели

                    );

                }

                if($city == 'Воронеж'):

                    $xml_images = array();
                    if(isset($images[0])) $xml_images[] = 'https://ml-respect.ru' . $images[0];
                    if(isset($images[1])) $xml_images[] = 'https://ml-respect.ru' . $images[1];
                    if(isset($images[2])) $xml_images[] = 'https://ml-respect.ru' . $images[2];
                    if(isset($images[3])) $xml_images[] = 'https://ml-respect.ru' . $images[3];
                    if(isset($images[4])) $xml_images[] = 'https://ml-respect.ru' . $images[4];

                    $xml_engine  = (!empty($car->modification_id)) ? (string)$car->modification_id : '';

                    $this->xml_cars[] = array(
                        'id' => (string)$car->unique_id,
                        'name'  => $name,
                        'url'   => 'https://ml-respect.ru/car/' . $url_code,
                        'price' => (!empty($car->price)) ? (string)$car->price : 0,
                        'picture' => $xml_images,
                        'description' => (!empty($car->description)) ? (string)$car->description : '',
                        'year' => (!empty($car->year)) ? (string)$car->year : '',
                        'engine' => $xml_engine,
                        'run' => (!empty($car->run)) ? (string)$car->run . ' км.' : '',
                    );

                endif;
                    // Олег: добавил обработку Белгорода
                if($city == 'Белгород'):

                    $xml_images = array();
                    if(isset($images[0])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[0];
                    if(isset($images[1])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[1];
                    if(isset($images[2])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[2];
                    if(isset($images[3])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[3];
                    if(isset($images[4])) $xml_images[] = 'https://belgorod.ml-respect.ru' . $images[4];

                    $xml_engine  = (!empty($car->modification_id)) ? (string)$car->modification_id : '';

                    $this->xml_belgorod[] = array(
                        'id' => (string)$car->unique_id,
                        'name'  => $name,
                        'url'   => 'https://belgorod.ml-respect.ru/car/' . $url_code,
                        'price' => (!empty($car->price)) ? (string)$car->price : 0,
                        'picture' => $xml_images,
                        'description' => (!empty($car->description)) ? (string)$car->description : '',
                        'year' => (!empty($car->year)) ? (string)$car->year : '',
                        'engine' => $xml_engine,
                        'run' => (!empty($car->run)) ? (string)$car->run . ' км.' : '',
                    );

                endif;
            }
        }
    }

    public function getPseudoUrl($string)
    {
        $string = (string) $string;
        $string = strip_tags($string);
        $string = str_replace(array("\n", "\r"), " ", $string);
        $string = str_replace(['(', ')', '*', '"', '`', "'"], "", $string);
        $string = preg_replace("/\s+/", ' ', $string);
        $string = trim($string);
        $string = function_exists('mb_strtolower') ? mb_strtolower($string) : strtolower($string);
        $string = strtr($string, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z',
        'и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f',
        'х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $string = preg_replace("/[^0-9a-z-_ ]/i", "", $string);
        $string = str_replace(" ", "-", $string);
        return $string;
    }

    public function getAutoCount()
    {
        return $this->auto_count;
    }
}

function addBrandToBitrix($brands_array){

    global $USER;
    $arParams = array("replace_space"=>"-","replace_other"=>"-");
    foreach ( $brands_array as $brand=>$val) {
        $brand_code = Cutil::translit($brand,"ru",$arParams);
        $brands_arrayCOPY[$brand_code] =  $brand;
        //unset($brands_array[$brand]);

    }
    $brands_array=$brands_arrayCOPY;
    echo '<pre> brands_array';
    print_r($brands_array);
    echo '<br> end brands_array</pre>';


    if (\Bitrix\Main\Loader::includeModule('iblock')){
        $arBransList = CIBlockElement::GetList(array(),["IBLOCK_ID" =>7],false,false,["ID","CODE","NAME","ACTIVE"]);
        $arBxBrands = array();
        while ($arBrand=$arBransList->Fetch()){
            $arBxBrands[$arBrand["CODE"]] = $arBrand;
        }

        echo '<pre> brands';
            print_r($arBxBrands);
        echo '<br> end brands</pre>';

        foreach ($brands_array as $brand=>$val) {
            echo '<pre> br <br>';
            print_r($arBxBrands[$brand]);
            var_dump(empty($arBxBrands[$brand]));
            echo '</pre>';

            if(empty($arBxBrands[$brand])){

                $newBrandItem = new CIBlockElement;
                $arLoadProductArray = Array(
                    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
                    "IBLOCK_ID"      => 7,
                    "NAME"           =>  $val,
                    "ACTIVE"         => "Y",            // активен
                    "CODE"          => $brand
                );

                if($PRODUCT_ID = $newBrandItem->Add($arLoadProductArray))
                    echo "<br>".$brand." New ID: ".$PRODUCT_ID;
                else
                    echo "<br>".$brand.": Error: ".$newBrandItem->LAST_ERROR;
            }elseif($arBxBrands[$brand]["ACTIVE"] != "Y"){
                $BrandItem = new CIBlockElement;
                $res = $BrandItem->Update($arBxBrands[$brand]["ID"],["ACTIVE"=>"Y"]);
                echo "<br>".$brand.": ativate<br>update result: ".$res;
            }
        }

        // foreach ($arBxBrands as $brandKey=>$brandValue){
        //     if(!$brands_array[$brandKey]){
        //         $BrandItem = new CIBlockElement;
        //         $res = $BrandItem->Update($arBxBrands[$brandKey]["ID"],["ACTIVE"=>"N"]);
        //         echo "<br>".$brandKey.": disable<br>update result: ".$res;
        //     }
        //}

    }else{
        echo '<br> ibliock not loaded';
    }
}

$start = microtime(true);
error_reporting(E_ALL);
set_time_limit(0);

$parser = new Paarser();

$memory = (!function_exists('memory_get_usage')) ? '' : round(memory_get_usage()/1024/1024, 2) . 'MB';

$finish = microtime(true);
$delta = $finish - $start;
echo '<br>Auto count: ' . $parser->getAutoCount();
echo '<br>Memory ' . $memory;
echo '<br>Script time: ' . $delta . 's';
echo '<pre>';
    print_r($parser->models_array);
echo '</pre>';
addBrandToBitrix($parser->brands_name_array);
