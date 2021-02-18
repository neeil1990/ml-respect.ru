<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <style type="text/css">

    * {
      margin: 0;
      padding: 0;
      font-size: 100%;
      font-family: Arial, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
      line-height: 1.65; }
    
    a {
      color: #71bc37;
      text-decoration: none; }
    
    .text-center {
      text-align: center; }
    
    .text-right {
      text-align: right; }
    
    .text-left {
      text-align: left; }
    
    .button {
      display: inline-block;
      color: white;
      background: #df5700;
      border: solid #df5700;
      border-width: 10px 20px 8px;
      font-weight: bold;
      border-radius: 4px; }
    
    h1, h2, h3, h4, h5, h6 {
      margin-bottom: 20px;
      line-height: 1.25; }
    
    h1 {
      font-size: 32px; }
    
    h2 {
      font-size: 28px; }
    
    h3 {
      font-size: 24px; }
    
    h4 {
      font-size: 20px; }
    
    h5 {
      font-size: 16px; }
    
    p, ul, ol {
      font-size: 16px;
      font-weight: normal;
      margin-bottom: 20px; }
    
    .container {
      display: block !important;
      clear: both !important;
      margin: 0 auto !important;
      max-width: 588px !important;
      }
      .container table {
        width: 100% !important;
        border-collapse: collapse; 
        }
      .container .masthead {
        padding: 20px 0;
        background: #3b3536;
        color: white; 
        }
        .container .masthead h1 {
          margin: 0 auto !important;
          max-width: 90%;
          text-transform: uppercase; 
          }
      .container .content {
        background: white;
        padding: 30px 35px; 
        }
        .container .content.footer {
          background: none; 
          }
          .container .content.footer p {
            margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 14px; 
            }
          .container .content.footer a {
            color: #df5700;
            text-decoration: none;
            font-weight: bold; }


    </style>
</head>
<body style="width: 100% !important;height: 100%; background: #fff; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; margin: 0;
      padding: 0;
      font-size: 100%;
      font-family: Arial, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      line-height: 1.65;">
<table style="width: 100% !important;height: 100%;background: #fff;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none; ">
    <tr>
        <td style="display: block !important;
      clear: both !important;
      margin: 0 auto !important;
      max-width: 588px !important; width: 100%;">

            <!-- Message start -->
            <table style=" width: 100%;">
                <tr>
                    <td align="center" style="padding: 20px 0;background: #fff;color: white; ">
                    
                        <img src="http://<?=$host;?>/local/templates/mlrespect/assets/img/logo.png" 
                        style="max-width: 100%;margin: 0 auto;display: block;" />

                    </td>
                </tr>
                <tr>
                    <td style="background: white;padding: 30px 35px;border: 1px #1f1f1f solid;">

                        <h2>Заявка на кредит</h2>
                        
                        <p style="color:#989898;font-size: 13px;">на сайте <?=$host;?>, <?=$datetime;?></p>
                        
                        <table style="width: 100%; font-size: 13px;">
                            <? if(isset($auto)): ?>
                            <tr style="vertical-align: top;">
                                <td style="width: 100%;padding: 5px 0;" colspan="2"><strong>Автомобиль:</strong> <?=$auto?> </td>
                            </tr>
                            <? endif; ?>
                            <? if(isset($name)): ?>
                            <tr style="vertical-align: top;">
                                <td style="width: 100%;padding: 5px 0;" colspan="2"><strong>Имя:</strong> <?=$name?> </td>
                            </tr>
                            <? endif; ?>
                            <tr style="vertical-align: top;">
                                <td style="width: 100%;padding: 5px 0;" colspan="2"><strong>Номер телефона:</strong> <?=$phone?> </td>
                            </tr>
                            <? if(isset($city)): ?>
                            <tr style="vertical-align: top;">
                                <td style="width: 100%;padding: 5px 0;" colspan="2"><strong>Город:</strong> <?=$city?> </td>
                            </tr>
                            <? endif; ?>
                            <? if(isset($comment)): ?>
                            <tr style="vertical-align: top;">
                                <td style="width: 100%;padding: 5px 0;" colspan="2"><strong> Комментарий:</strong> <?=$comment?> </td>
                            </tr>
                            <? endif; ?>
                        </table>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td style="display: block !important;
      clear: both !important;
      margin: 0 auto !important;
      max-width: 588px !important;">

            <!-- Message start -->
            <table style="width: 100% !important;height: 100%;background: #fff;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none; ">
                <tr>
                    <td style="padding: 30px 35px; " align="center">
                        <p style="margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 12px; ">Создание сайта <a href="https://promo01.ru" style="color: #ee1d23;
            text-decoration: none;
            font-weight: bold;width:100%;text-align:center;">Генерация</a></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>