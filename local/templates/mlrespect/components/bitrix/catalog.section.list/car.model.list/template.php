<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<?
$arModels=array('status'=>'Y','data'=>array());
if (0 < $arResult["SECTIONS_COUNT"]){
    foreach ($arResult['SECTIONS'] as &$arSection){
        $arModels['data'][]=array('name'=>$arSection['NAME'], 'code'=>$arSection['CODE']);
     }
 unset($arSection);
    echo json_encode($arModels);
}else{
    $arModels['status'] = "N";
}
?>
