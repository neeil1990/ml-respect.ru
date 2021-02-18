<?php
        
        $files = [
            'sitemap_iblock_3.xml'
        ];
        $homepage = '';
        
        foreach ($files as $file) {
            $homepage .= preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", str_replace('ml-respect.ru', $_SERVER['SERVER_NAME'], file_get_contents($file)));
        }
        
        header("Content-type: text/xml");        
        echo $homepage;
        
        ?>