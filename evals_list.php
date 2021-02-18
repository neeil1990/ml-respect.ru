<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/dbconn.php');

$mysqli = new mysqli($DBHost, $DBLogin, $DBPassword, $DBName);

$query = "SELECT * FROM `u_accounts` WHERE `datetime` >  '2019-11-18' ORDER BY `datetime` DESC";

if(!$result = $mysqli->query($query)){
    die('No result');
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Сalculation sheet</title>
    <style>
        body{
            padding: 50px;
            font-family: sans-serif;
        }
    </style>
</head>
<body>

    <table border="1" style="width: 100%;">
        <tr>
            <th style="width: 50px;">#</th>
            <th>Phone</th>
            <th style="width: 200px;">Brand</th>
            <th style="width: 200px;">Model</th>
            <th style="width: 100px;">Year</th>
            <th style="width: 100px;">Run</th>
            <th style="width: 100px;">Owners</th>
            <th style="width: 100px;">Painted</th>
            <th style="width: 100px;">PTS</th>
            <th style="width: 150px;">Datetime</th>
        </tr>
        <? 
            if ($result->num_rows > 0):
            while($account = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$account['id']?></td>
                    <td><?=$account['phone']?></td>
                    <td><?=$account['auto_brand']?></td>
                    <td><?=$account['auto_model']?></td>
                    <td><?=$account['auto_year']?></td>
                    <td><?=$account['auto_run']?></td>
                    <td><?=$account['auto_owners']?></td>
                    <td><?=$account['auto_dyed']?></td>
                    <td><?=$account['auto_pts']?></td>
                    <td><?=$account['datetime']?></td>
                </tr>
                <?
            }
            $result->free();
        ?>
        
        <? endif; ?>
    </table>

</body>
</html>