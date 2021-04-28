<?php

/**
 * Рассчет стоимости автомобиля.
 * Используется API auto.ru
 * Версия 1.0
 * ---
 * Илья Глаголев, 01.10.2018 (vk.com/motoslam)
*/
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/dbconn.php');

include($_SERVER['DOCUMENT_ROOT'] . '/inc/emails.forms.php');

if (CModule::IncludeModule("webfly.seocities")){
    define(CITY_CURRENT_ID, CSeoCities::getCityId());
}

$mysqli = new mysqli($DBHost, $DBLogin, $DBPassword, $DBName);

if(!function_exists( 'json_output' )){

    function json_output($result){
        echo json_encode($result);
        exit;
    }

}

if(!function_exists( 'ce_val_string' )){

    function ce_val_string($string){
        global $mysqli;
        return "'" . $mysqli->real_escape_string($string) . "'";
    }

}

if(!function_exists( 'evalute_car' )){

    function evalute_car($brand, $model, $year, $owners){

        $owners = intval($owners);
        if($owners == 0){
            $owners = 1;
        }
        if($owners > 3){
            $owners = 3;
        }

        $rid = 193; // region id

        $brand = strtoupper($brand);
        $model = strtoupper($model);

        $model = str_replace(['\''], '', $model);

        $default_generation_id = '';
        $default_configuration_id = '';

        $price = 0;

        $KEY = 'kiafest-b4c57b4915bdb3fb271471bee50206a0237d5e27';
        $url = 'https://apiauto.ru/1.0/search/cars/breadcrumbs';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url . '?bc_lookup='.$brand.'%23'.$model.'&state=USED&rid='.$rid);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-Authorization: Vertis ' . $KEY,
            'Content-Type: application/json'
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($data);

        // определяем уровень поколения
        $generation_index = 0;
        foreach($data->breadcrumbs as $index=>$bc){
            if($bc->meta_level == 'GENERATION_LEVEL'){
                $generation_index = $index;
            }
        }

        // ищем ID поколение и ID конфигурации
        if(!isset($data->breadcrumbs[$generation_index]->entities)){
            return 0;
        }
        foreach($data->breadcrumbs[$generation_index]->entities as $entity){
            $year_from = $entity->super_gen->year_from;
            $year_to = date('Y');
            if(isset($entity->super_gen->year_to)){
                $year_to = $entity->super_gen->year_to;
            }
            if($year_from <= $year  && $year <= $year_to){
                $default_generation_id = $entity->id;
                $default_configuration_id = $entity->super_gen->default_configuration_id;
            }
        }

        // запрашиваем tech_param_id
        $url = 'https://apiauto.ru/1.0/search/cars/breadcrumbs';
        $bc_lookup = $brand.'%23'.$model.'%23'.$default_generation_id.'%23'.$default_configuration_id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url . '?bc_lookup='.$bc_lookup.'&state=USED&rid='.$rid);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-Authorization: Vertis ' . $KEY,
            'Content-Type: application/json'
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($data);

        // определяем уровень TECH_PARAM_LEVEL
        $tech_index = 0;
        foreach($data->breadcrumbs as $index=>$bc){
            if($bc->meta_level == 'TECH_PARAM_LEVEL'){
                $tech_index = $index;
            }
        }

        // берем первую tech_param_id
        $tech_param_id = $data->breadcrumbs[$generation_index]->entities[0]->id;

        // запрашиваем стоимость
        if(!empty($default_configuration_id)){
            $url = 'https://apiauto.ru/1.0/stats/predict';

            $postfields = json_encode([
                'rid' => $rid,
                'tech_param_id' => $tech_param_id,
                'color' => 'FAFBFB',
                'owners_count' => $owners,
                'year' => $year
            ]);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'X-Authorization: Vertis ' . $KEY,
                'Content-Type: application/json'
            ]);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
            $data = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($data);

            if($data->status == 'SUCCESS'){
                $from = 0;
                $to = 0;
                if(isset($data->prices->tradein)){
                    $from = $data->prices->tradein->from;
                    if(isset($data->prices->tradein->to)){
                        $to = $data->prices->tradein->to;
                    }else{
                        $to = $from;
                    }
                }
                $average = intval(($from + $to) / 2);
                $price = $average;
            }

        }
        return $price;
    }

}

if(isset($_GET['act'])){

    if($mysqli->connect_errno){
        json_output([
            'status' => 'N',
            'errno'  => $mysqli->connect_errno,
            'error'  => $mysqli->connect_error
        ]);
    }

    switch($_GET['act']){
        case 'getBrands':
            $sql = 'SELECT * FROM `u_brands`';
            if(!$result = $mysqli->query($sql)){
                json_output([
                    'status' => 'N',
                    'errno'  => $mysqli->connect_errno,
                    'error'  => $mysqli->connect_error
                ]);
            }
            if ($result->num_rows === 0) {
                json_output([
                    'status' => 'N',
                    'errno'  => '101',
                    'error'  => 'There are no rows for the specified parameters'
                ]);
            }
            while($brand = $result->fetch_assoc()){
                $brands[] = $brand['name'];
            }
            json_output([
                'status' => 'Y',
                'response'  => $brands
            ]);
            $result->free();
            $mysqli->close();
            break;
        case 'getModels':
            if(!isset($_GET['brandId'])){
                json_output([
                    'status' => 'N',
                    'errno'  => '102',
                    'error'  => 'Missing input parameters'
                ]);
            }
            $brandName = ce_val_string($_GET['brandId']);
            $query = 'SELECT * FROM `u_brands` WHERE `name`=' . $brandName;
            if(!$brandResult = $mysqli->query($query)){
                json_output([
                    'status' => 'N',
                    'query'  => $query,
                    'errno'  => $mysqli->connect_errno,
                    'error'  => $mysqli->connect_error
                ]);
            }
            if ($brandResult->num_rows === 0) {
                json_output([
                    'status' => 'N',
                    'query'  => $query,
                    'errno'  => '103',
                    'error'  => 'There are no rows for the specified parameters'
                ]);
            }
            $brand = $brandResult->fetch_assoc();
            $brandId = intval($brand['id']);
            $sql = 'SELECT * FROM `u_models` WHERE `brand_id`=' . $brandId;
            if(!$result = $mysqli->query($sql)){
                json_output([
                    'status' => 'N',
                    'errno'  => $mysqli->connect_errno,
                    'error'  => $mysqli->connect_error
                ]);
            }
            if ($result->num_rows === 0) {
                json_output([
                    'status' => 'N',
                    'errno'  => '104',
                    'error'  => 'There are no rows for the specified parameters'
                ]);
            }
            while($model = $result->fetch_assoc()){
                $models[] = $model['name'];
            }
            json_output([
                'status' => 'Y',
                'response'  => $models
            ]);
            $result->free();
            $mysqli->close();
            break;
        case 'sendStep1':
            if(!isset($_POST['phone'])){
                json_output([
                    'status' => 'N',
                    'errno'  => '105',
                    'error'  => 'Missing input parameters'
                ]);
            }
            $phone = $mysqli->real_escape_string($_POST['phone']);
            $name = $mysqli->real_escape_string($_POST['name']);
            $datetime = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `u_accounts` (`id`, `phone`, `name`, `ip`, `auto_brand`, `auto_model`, `auto_year`, `datetime`) 
                    VALUES (
                        NULL, 
                        '" . $phone . "', 
                        '" . $name . "', 
                        '" . $_SERVER['REMOTE_ADDR'] . "',
                        " . ce_val_string($_POST['abrand']) .",
                        " . ce_val_string($_POST['amodel']) . ",
                        " . ce_val_string($_POST['ayear']) . ",
                        '" . $datetime . "'
                    );";
            if(!$result = $mysqli->query($sql)){
                json_output([
                    'status' => 'N',
                    'query'  => $sql,
                    'errno'  => $mysqli->connect_errno,
                    'error'  => $mysqli->connect_error
                ]);
            }

            $account['auto_brand'] = $_POST['abrand'];
            $account['auto_model'] = $_POST['amodel'];
            $account['auto_year'] = $_POST['ayear'];

            $host = $_SERVER['HTTP_HOST'];
            $datetime = date('d.m.Y в H:i');

            ob_start();
            include('./inc/mail.carevalute.php');
            $html = ob_get_contents();
            ob_end_clean();

            $subject = "Онлайн-оценка стоимости автомобиля";
            $mailheaders = "Content-type:text/html;charset=utf-8\r\n";
            $mailheaders .= "From: ML-RESPECT <noreply@$host>\r\n";
            $mailheaders .= "Reply-To: noreply@$host\r\n";
            foreach($EMAILS[CITY_CURRENT_ID]['cars.eval'] as $email){
                mail($email, $subject, $html, $mailheaders);
            }

            json_output([
                'status'   => 'Y',
                'account'  => $mysqli->insert_id
            ]);
            $mysqli->close();
            break;
        case 'sendStep2':
            if(empty($_POST['accountId'])){
                json_output([
                    'status' => 'N',
                    'errno'  => '106',
                    'error'  => 'Missing input parameters'
                ]);
            }
            $accountId = intval($_POST['accountId']);
            $query = 'SELECT * FROM `u_accounts` WHERE `id`=' . $accountId . " AND `ip`='" . $_SERVER['REMOTE_ADDR'] . "'";
            if(!$result = $mysqli->query($query)){
                json_output([
                    'status' => 'N',
                    'errno'  => $mysqli->connect_errno,
                    'error'  => $mysqli->connect_error
                ]);
            }
            if ($result->num_rows === 0) {
                json_output([
                    'status' => 'N',
                    'errno'  => '104',
                    'error'  => 'There are no rows for the specified parameters'
                ]);
            }
            $account = $result->fetch_assoc();
            $result->free();

            $sql  = "UPDATE `u_accounts` SET ";
            if(!empty($_POST['run'])){
                $sql .= "`auto_run` = " . ce_val_string($_POST['run']) . ",";
            }
            if(!empty($_POST['dyed'])){
                $sql .= "`auto_dyed` = " . ce_val_string($_POST['dyed']) . ",";
            }
            if(!empty($_POST['pts'])){
                $sql .= "`auto_pts` = " . ce_val_string($_POST['pts']) . ",";
            }
            $owners = 0;
            if(!empty($_POST['owners'])){
                $owners = $_POST['owners'];
                $sql .= "`auto_owners` = " . ce_val_string($_POST['owners']) . "";
            }
            if(substr($sql, -1) == ','){
                $sql = substr($sql, 0, -1);
            }
            $sql .= " WHERE `id` = " . $accountId;
            if(!$result = $mysqli->query($sql)){
                json_output([
                    'status' => 'N',
                    'query'  => $sql,
                    'errno'  => $mysqli->connect_errno,
                    'error'  => $mysqli->connect_error
                ]);
            }

            $price = evalute_car($account['auto_brand'], $account['auto_model'], $account['auto_year'], $owners);
            $price = number_format($price, 0, '.', ' ');

            $phone = $account['phone'];

            $host = $_SERVER['HTTP_HOST'];
            $datetime = date('d.m.Y в H:i');

            ob_start();
            include('./inc/mail.carevalute.php');
            $html = ob_get_contents();
            ob_end_clean();

            $subject = "Онлайн-оценка стоимости автомобиля";
            $mailheaders = "Content-type:text/html;charset=utf-8\r\n";
            $mailheaders .= "From: ML-RESPECT <noreply@$host>\r\n";
            $mailheaders .= "Reply-To: noreply@$host\r\n";
            foreach($EMAILS[CITY_ALIAS]['cars.eval'] as $email){
                mail($email, $subject, $html, $mailheaders);
            }
            $mysqli->close();
            json_output([
                'status'   => 'Y',
                'price'    => $price
            ]);
            break;
        case 'test':
            break;
    }

}
