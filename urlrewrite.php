<?php
$arUrlRewrite=array (
  8 => 
  array (
    'CONDITION' => '#^/car/(.+?)/filter/(.+?)/apply/\\??(.*)#',
    'RULE' => 'SECTION_CODE_PATH=$1&SMART_FILTER_PATH=$2&$3',
    'ID' => 'bitrix:catalog.smart.filter',
    'PATH' => '/test/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/blog/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/blog/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/car/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/car/index.php',
    'SORT' => 100,
  ),
);
