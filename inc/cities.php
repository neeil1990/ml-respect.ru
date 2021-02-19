<?php
$vrnSite = CSite::GetByID("s1")->Fetch();

$pos = strripos($_SERVER['HTTP_HOST'], 'webworkers');
if($pos!==false){
    define('CITY_ALIAS_VRN', 'ml-respect.webworkers.pro');
    define('CITY_ALIAS_BLG', 'belgorod.ml-respect.webworkers.pro');
    define('CITY_ALIAS_SPB', 'spb.ml-respect.webworkers.pro');
}else{
    define('CITY_ALIAS_VRN', $vrnSite['SERVER_NAME']);
    define('CITY_ALIAS_BLG', 'belgorod.ml-respect.ru');
    define('CITY_ALIAS_SPB', 'spb.ml-respect.ru');
}


$domain = $_SERVER['HTTP_HOST'];
$cities = [
    CITY_ALIAS_VRN => 'Воронеж',
    CITY_ALIAS_BLG => 'Белгород',
    CITY_ALIAS_SPB => 'Санкт-Петербург'
];

$sort = [
    CITY_ALIAS_VRN => [
        'SORT_BY' => 'PROPERTYSORT_CITY_LIST',
        'SORT_ORDER' => 'asc'
    ],
    CITY_ALIAS_BLG => [
        'SORT_BY' => 'PROPERTY_CITY_LIST',
        'SORT_ORDER' => 'asc'
    ],
    CITY_ALIAS_SPB => [
        'SORT_BY' => 'PROPERTY_CITY_LIST',
        'SORT_ORDER' => 'desc'
    ]
];

$aliases_tech = [
    CITY_ALIAS_VRN => 'VRN',
    CITY_ALIAS_BLG => 'BLG',
    CITY_ALIAS_SPB => 'SPB'
];

define('CITY_NAME', $cities[$domain]);
define('CITY_DOMAIN', $domain);
define('CITY_ALIAS', $aliases_tech[$domain]);

define('CITY_SORT_BY', $sort[$domain]['SORT_BY']);
define('CITY_SORT_ORDER', $sort[$domain]['SORT_ORDER']);
