<?php
    
    function getModels()
    {
      ob_start();
      include $_SERVER['DOCUMENT_ROOT'].'/inc/models.php';
      return ob_get_clean();
    }

    $models = unserialize(getModels());

    if(isset($_GET['brand'])){
        if(isset($models[$_GET['brand']])){
            echo json_encode(array('status' => 'Y', 'data' => $models[$_GET['brand']]));
            exit;
        }
    }
    echo json_encode(array('status' => 'N'));