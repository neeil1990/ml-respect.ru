<?php
/**
 * Заявка на кредит
 * Версия 1.0
 * ---
 * Илья Глаголев, 01.10.2018 (vk.com/motoslam)
*/

include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/dbconn.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/emails.forms.php');
    
$mysqli = new mysqli($DBHost, $DBLogin, $DBPassword, $DBName);

if(!function_exists( 'json_output' )){
    
    function json_output($result){
        echo json_encode($result);
        exit;
    }
    
}

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $host = $_SERVER['HTTP_HOST'];
        $datetime = date('d.m.Y в H:i');
        
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if(isset($_POST['city'])){
            $city = $_POST['city'];
        }
        if(isset($_POST['auto'])){
            $auto = $_POST['auto'];
        }
        if(isset($_POST['comment'])){
            $comment = $_POST['comment'];
        }
        $phone = $_POST['phone'];
        
        if(isset($_POST['filial'])){
            $filial = (int)$_POST['filial'];
        }else{
            $filial = 699;
        }
    
        ob_start();
        include('./inc/mail.credit.php');
        $html = ob_get_contents();
        ob_end_clean();
        
        $subject = "Заявка на кредит"; 
        $mailheaders = "Content-type:text/html;charset=utf-8\r\n"; 
        $mailheaders .= "From: ML-RESPECT <noreply@$host>\r\n"; 
        $mailheaders .= "Reply-To: noreply@$host\r\n";
        if(isset($EMAILS['testdrive'][$filial])){
            foreach($EMAILS['testdrive'][$filial] as $email){ 
                mail($email, $subject, $html, $mailheaders);
            }
        }
        json_output([
            'status' => 'Y'
        ]);
    }