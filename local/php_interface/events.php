<?
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("MyClass", "OnBeforeIBlockElementDeleteHandler"));

class MyClass
{
    // создаем обработчик события "OnBeforeIBlockElementDelete"
    function OnBeforeIBlockElementDeleteHandler($ID)
    {
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/aad.txt', print_r($ID,true));
        if (CModule::IncludeModule("iblock") ){
            $arSelect = array("ID", "IBLOCK_ID", "NAME","CODE",'PROPERTY_img');
            $arFilter = array("ID"=>$ID);
            $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
            if($ob = $res->GetNextElement())
            {
                $arProps = $ob->GetProperties(); 
                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/aaf.txt', print_r($arProps,true));
                foreach ($arProps['img']['VALUE'] as $key => $imgItem){
                    $rsFile[$imgItem] = CFile::GetPath($imgItem);
                    $fileList.= $imgItem.','; 
                }
                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/aae.txt', print_r($rsFile,true));
            }

            foreach ($rsFile as $key => $fileItem)
            {
                $extention=explode('.',$fileItem)[1];
                $webpFile=str_replace('.'.$extention,'.webp', $fileItem);
                $webpPath =  $_SERVER['DOCUMENT_ROOT'].$webpFile;
                $flist[] =  $webpPath;

                if (file_exists($webpPath)===true) 
                {
                    $flistU[] =  $webpPath;
                    unlink($webpPath);
                }
            }

            $res = CFile::GetList(array("FILE_SIZE"=>"desc"), array("@ID"=>$fileList));
            while($res_arr = $res->GetNext())
            {
                $rsFiledd[]=$res_arr;

                $small_imgPath = $_SERVER['DOCUMENT_ROOT'].'/upload/resize_cache/'.$res_arr['SUBDIR'];

                $small_imgExt = explode('.',$res_arr['FILE_NAME'])[1];
                $small_imgFile=str_replace('.'.$small_imgExt,'.webp', $res_arr['FILE_NAME']);
                $files = glob($small_imgPath."/*/".$small_imgFile,GLOB_NOSORT);
                foreach ($files as $filekey => $filePath) {
                    unlink($filePath);
                }
            }



                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/aab.txt', print_r($flistU,true));
                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/aac.txt', print_r($flist,true));
        }
    }
}







?>