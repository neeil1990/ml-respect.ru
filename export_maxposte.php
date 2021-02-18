<?require $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";
use Bitrix\Main\Loader;

$results = array();

$inmport = array();

$url = "http://export.maxposter.ru/dealer-export/3126-124124.xml";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$simpleXml = simplexml_load_string(curl_exec($curl));
$json = json_encode($simpleXml);
$inmport = json_decode($json,TRUE);
curl_close($curl);



if(isset($inmport)){

    foreach($inmport as $arItem){
        foreach($arItem as $item){
            $inmportNew[] = $item;
        }
    }



    foreach($inmportNew as $key=> $item){
        if($item["ptsType"]=='original'){
            $inmportNew[$key]["ptsType"]='оригинал';
        }
        if($item["availability"]=='available'){
            $inmportNew[$key]["availability"]='В наличии';
        }
        if($item["bodyColor"]=='white'){
            $inmportNew[$key]["bodyColor"]='Белый';
        }
        if($item["bodyColor"]=='blue'){
            $inmportNew[$key]["bodyColor"]='Синий';
        }
        if($item["bodyColor"]=='black'){
            $inmportNew[$key]["bodyColor"]='Черный';
        }
        if($item["bodyColor"]=='grey'){
            $inmportNew[$key]["bodyColor"]='Серый';
        }
        if($item["bodyColor"]=='orange'){
            $inmportNew[$key]["bodyColor"]='Оранжевый';
        }
        if($item["bodyColor"]=='beige'){
            $inmportNew[$key]["bodyColor"]='Бежевый';
        }
        if($item["bodyColor"]=='silver'){
            $inmportNew[$key]["bodyColor"]='Серебристый';
        }

        if($item["steeringWheel"]=='left'){
            $inmportNew[$key]["steeringWheel"]='Левый';
        }


        if($item["driveType"]=='front'){
            $inmportNew[$key]["driveType"]='Передний';
        }      

        if($item["driveType"]=='full_4wd'){
            $inmportNew[$key]["driveType"]='Полный';
        }

    }
}

    $dom = new domDocument("1.0", "utf-8");

    $data = $dom->createElement("data");
    //$data->setAttribute("ver", "1.0");
    $dom->appendChild($data);    

    $cars = $dom->createElement("cars");
    $data->appendChild($cars);

    foreach ($inmportNew as $key => $item) {

        $car = $dom->createElement("car");

        if($item['id']){
            $unique_id = $dom->createElement("unique_id", $item['id']);
            $car->appendChild($unique_id);
        }

        if($item['brand']){
            $mark_id = $dom->createElement("mark_id", $item['brand']);
            $car->appendChild($mark_id);
        }
        if($item['model']){
            $folder_id = $dom->createElement("folder_id", $item['model']);
            $car->appendChild($folder_id);
        }
        if($item['modification']){
            $modification_id = $dom->createElement("modification_id", $item['modification']);
            $car->appendChild($modification_id);

            $transmission_str = stripos($item['modification'], "AT");
            if($transmission_str){
                $transmission = $dom->createElement("transmission", "AT");
                $car->appendChild($transmission);
            }

        }
        if($item['bodyConfiguration']){
            $body_type = $dom->createElement("body_type", $item['bodyConfiguration']);
            $car->appendChild($body_type);
        }
        if($item['driveType']){
            $drive = $dom->createElement("drive", $item['driveType']);
            $car->appendChild($drive);
        }
        if($item['complectation']){
           $complectation_name = $dom->createElement("complectation_name", $item['complectation']);
           $car->appendChild($complectation_name);         
        }
        if($item['steeringWheel']){
            $wheel = $dom->createElement("wheel", $item['steeringWheel']);
            $car->appendChild($wheel);
        }
        if($item['bodyColor']){
            $color = $dom->createElement("color", $item['bodyColor']);
            $car->appendChild($color);
        }
        if($item['availability']){
            $availability = $dom->createElement("availability", $item['availability']);
            $car->appendChild($availability);
        }
        if($item['ptsType']){
            $pts = $dom->createElement("pts", $item['ptsType']);
            $car->appendChild($pts);
        }
        if($item['ownersCount']){
            $owners_number = $dom->createElement("owners_number", $item['ownersCount']);
            $car->appendChild($owners_number);
        }
        if($item['mileage']){                
            $run = $dom->createElement("run", $item['mileage']);
            $car->appendChild($run);
        }
        if($item['year']){
            $year = $dom->createElement("year", $item['year']);
            $car->appendChild($year);
        }
        if($item['price']){
            $price = $dom->createElement("price", $item['price']);
            $car->appendChild($price);
        }

        $currency = $dom->createElement("currency", "RUR");
        $car->appendChild($currency);

        if($item['vin']){
            $vin = $dom->createElement("vin", $item['vin']);
            $car->appendChild($vin);
        }
        if($item['description']){
            $description = $dom->createElement("description", $item['description']);
            $car->appendChild($description);
        }
        if($item['photos']){
            $images = $dom->createElement("images");
            $car->appendChild($images);
            foreach ($item['photos'] as $key => $arPhoto) {
                foreach ($arPhoto as $key => $photo) {
                    $photo_ = explode('?',$photo);

                    $image = $dom->createElement("image", $photo_[0]);
                    $images->appendChild($image);
                }
            }
            
        }

            $contact_info = $dom->createElement("contact_info");
            $car->appendChild($contact_info);

            $contact = $dom->createElement("contact");
            $contact_info->appendChild($contact);

            $name = $dom->createElement("name", "Менеджер отдела продаж");
            $contact->appendChild($name);

            $phone = $dom->createElement("phone", "+7 (473) 212-26-52");
            $contact->appendChild($phone);

            $time = $dom->createElement("time", "-");
            $contact->appendChild($time);

        
        $cars->appendChild($car);
    }

  $dom->save($_SERVER['DOCUMENT_ROOT']."/export_maxposte.xml");