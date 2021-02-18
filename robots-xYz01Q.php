<?if ($_SERVER['SERVER_NAME'] == 'bel.ml-respect.ru') {?>User-agent: *
Disallow: 
<?} else {?> 



User-agent: *
<br><br>
Disallow: /cgi-bin
<br>
Disallow: /bitrix/
<br>
Disallow: *bitrix_*=
<br>
Disallow: /local/
<br>
Disallow: /*index.php$
<br>
Disallow: /auth/
<br>
Disallow: *auth=
<br>
Disallow: /personal/
<br>
Disallow: *register=
<br>
Disallow: *forgot_password=
<br>
Disallow: *change_password=
<br>
Disallow: *login=
<br>
Disallow: *logout= 
<br>
Disallow: */search/
<br>
Disallow: *action=
<br>
Disallow: *print=
<br>
Disallow: *?new=Y
<br>
Disallow: *?edit=
<br>
Disallow: *?preview=
<br>
Disallow: *backurl=
<br>
Disallow: *back_url= 
<br>
Disallow: *back_url_admin=
<br>
Disallow: *captcha
<br>
Disallow: */feed 
<br>
Disallow: */rss
<br>
Disallow: *?FILTER*=
<br>
Disallow: *?ei=
<br>
Disallow: *?p=
<br>
Disallow: *?q=
<br>
Disallow: *?tags=
<br>
Disallow: *B_ORDER=
<br>
Disallow: *BRAND=
<br>
Disallow: *CLEAR_CACHE=
<br>
Disallow: *ELEMENT_ID=
<br>
Disallow: *price_from=
<br>
Disallow: *price_to=         
<br>
Disallow: *PROPERTY_TYPE=
<br>
Disallow: *PROPERTY_WIDTH=
<br>
Disallow: *PROPERTY_HEIGHT=
<br>
Disallow: *PROPERTY_DIA=
<br>
Disallow: *PROPERTY_OPENING_COUNT=
<br>
Disallow: *PROPERTY_SELL_TYPE=
<br>
Disallow: *PROPERTY_MAIN_TYPE=    
<br>
Disallow: *PROPERTY_PRICE[*]=
<br>
Disallow: *S_LAST=  
<br>
Disallow: *SECTION_ID=
<br>
Disallow: *SECTION[*]=
<br>
Disallow: *SHOWALL= 
<br>
Disallow: *SHOW_ALL=
<br>
Disallow: *SHOWBY=
<br>
Disallow: *SORT=
<br>
Disallow: *SPHRASE_ID=        
<br>
Disallow: *TYPE=
<br>
Disallow: *utm*=
<br>
Disallow: *openstat= 
<br>
Disallow: *from=
<br>
Disallow: */page/*
<br>
Disallow: */car/*/?*
<br>
Disallow: *br%*
<br>
Disallow: *tr%*
<br>
Disallow: *calltouch*
<br><br>
Allow: */upload/
<br>
Allow: /bitrix/*.js
<br>
Allow: /bitrix/*.css
<br>
Allow: /local/*.js
<br>
Allow: /local/*.css
<br>
Allow: /local/*.jpg
<br>
Allow: /local/*.jpeg
<br>
Allow: /local/*.png
<br>
Allow: /local/*.gif

<?}?>

<br><br>
Sitemap: https://<?php echo $_SERVER['SERVER_NAME']; ?>/sitemap-n.xml
<br>
Sitemap: https://<?php echo $_SERVER['SERVER_NAME']; ?>/sitemap-n-sitemap_iblock_1.xml
<br>
Sitemap: https://<?php echo $_SERVER['SERVER_NAME']; ?>/sitemap-n-sitemap_iblock_3.xml
<br><br>
Host: https://<?php echo $_SERVER['SERVER_NAME']; ?>