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

\Bitrix\Main\EventManager::getInstance()->addEventHandler(
    'main',
    'OnPageStart',
    ['FilterUrl', 'PageStart']
);

class FilterUrl
{
    /*
     * PROPERTY IBLOCK NEW_URL (String)
     */
    const IBLOCK_ID = '6';

    public function PageStart()
    {
        CModule::IncludeModule("iblock");
        global $APPLICATION;

        //off autocompozite
        //\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();

        if(strpos($APPLICATION->GetCurPage(false), '/bitrix') === 0)
            return;

        $context = Bitrix\Main\Context::getCurrent();
        $server = $context->getServer();
        $server_array = $server->toArray();
        $url_parts = explode("?", $context->getRequest()->getRequestUri());

        if(!($instance = self::getByNewUrl($url_parts[0])) && !($instance = self::getByNewUrl($context->getRequest()->getRequestUri())))
        {
            $instance = self::getByRealUrl($url_parts[0]);

            if(!$instance)
                $instance = self::getByRealUrl($context->getRequest()->getRequestUri());

            if($instance && $instance['NEW_URL'])
            {
                LocalRedirect($instance['NEW_URL'], false, '301 Moved Permanently');
            }
        }

        if($instance && $instance['NEW_URL'] && ($instance['NEW_URL'] != $instance['REAL_URL']))
        {
            $url_parts = explode("?", $instance['REAL_URL']);
            $url_parts = explode("&", $url_parts[1]);

            foreach($url_parts as $item)
            {
                $items = explode('=', $item);
                $_GET[$items[0]] = $items[1];
            }

            $_SERVER['REQUEST_URI'] = $instance['REAL_URL'];
            $server_array['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
            $server->set($server_array);

            $context->initialize(new Bitrix\Main\HttpRequest($server, $_GET, array(), array(), $_COOKIE), $context->getResponse(), $server);
            $APPLICATION->reinitPath();
        }
    }

    private function getByNewUrl($url){

        $res = CIBlockElement::GetList(
            Array(),
            Array("IBLOCK_ID" => IntVal(self::IBLOCK_ID), "ACTIVE" => "Y", '=PROPERTY_NEW_URL' => $url),
            false,
            array("nTopCount" => 1),
            Array("ID", "IBLOCK_ID", "NAME","PROPERTY_NEW_URL")
        );
        $arData = $res->fetch();

        if($arData){
            $arData['NEW_URL'] = $arData['PROPERTY_NEW_URL_VALUE'];
            $arData['REAL_URL'] = str_replace(SITE_SERVER_NAME, '', $arData['NAME']);
        }
        return $arData;
    }

    private function getByRealUrl($url){

        $url = SITE_SERVER_NAME . $url;

        $res = CIBlockElement::GetList(
            Array(),
            Array("IBLOCK_ID" => IntVal(self::IBLOCK_ID), "ACTIVE" => "Y", '=NAME' => $url),
            false,
            array("nTopCount" => 1),
            Array("ID", "IBLOCK_ID", "NAME","PROPERTY_NEW_URL")
        );
        $arData = $res->fetch();
        if($arData) {
            $arData['NEW_URL'] = $arData['PROPERTY_NEW_URL_VALUE'];
            $arData['REAL_URL'] = str_replace(SITE_SERVER_NAME, '', $arData['NAME']);
        }
        return $arData;
    }
}

?>
