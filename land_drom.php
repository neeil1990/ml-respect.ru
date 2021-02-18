<?php

$ch = curl_init();
$options = [
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL            => 'http://turbodealer.ru/export/land_drom.xml'
];

curl_setopt_array($ch, $options);
$xml = curl_exec($ch);
curl_close($ch);

$fd = fopen('land_drom.xml', 'w+');
fputs($fd, $xml);
fclose($fd);