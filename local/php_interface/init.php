<?
// Олег: размер картинки в списке машин
define(IMG_CART_PREW_WIDTH, 358);
define(IMG_CART_PREW_HEIGHT, 200);
// Олег: размер большой картинки в деталке
define(IMG_CART_DETAIL_BIG_WIDTH, 749);
define(IMG_CART_DETAIL_BIG_HEIGHT, 500);
// Олег: размер ревю картинки в деталке
define(IMG_CART_DETAIL_PREW_WIDTH, 118);
define(IMG_CART_DETAIL_PREW_HEIGHT, 79);
// Олег: размер картинки спецпредложения в меню
define(IMG_MENU_SPECIAL_WIDTH, 118);
define(IMG_MENU_SPECIAL_HEIGHT, 79);

function myscandir($dir)
{
    $list = scandir($dir);
    unset($list[0],$list[1]);
    return array_values($list);
}

function clear_dir($dir)
{
    $list = myscandir($dir);

    foreach ($list as $file)
    {
        if (is_dir($dir.$file))
        {
            clear_dir($dir.$file.'/');
            rmdir($dir.$file);
        }
        else
        {
            unlink($dir.$file);
        }
    }
}

require_once __DIR__.'/events.php';
?>
