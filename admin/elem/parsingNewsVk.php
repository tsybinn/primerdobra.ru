<?php
//phpinfo();
//   3c5576910f939296015ab108b0cfe2caf1e60412f0cef5d533d4c31e500b2a49ee8f418e1413ae464edfe
include_once "../class/Db.class.php";
$db = new Db;
 $request_params = array(

     'owner_id' => '-180255958',
     'domain' => 'https://vk.com/club180255958',
     'count' => 100,
     'access_token' => '3c5576910f939296015ab108b0cfe2caf1e60412f0cef5d533d4c31e500b2a49ee8f418e1413ae464edfe',     'v' => '5.101',
);

 //--------------------------------------
  $get_params = http_build_query($request_params);
 $result = json_decode(file_get_contents('https://api.vk.com/method/wall.get?' . $get_params), true);
  $ITEMS = $result['response']['items'];

//   echo "<pre>";
//   var_dump($ITEMS);
// $filename = 'array.txt';
// $data = file_get_contents($filename);
// $ITEMS = unserialize($data);
   // echo "<pre>";
  // print_r($ITEMS);
 $lastPost =  $db->lastDate('news');
  $lastDatePost = $lastPost['date'];

  $count = 0;

  $arrResult = array();
foreach ($ITEMS as $key => $value) {

    $array = array(
        "date" => "",
        "video" => array(
            "0" => "",
            "1" => "",
        ),
        "photo" => array(
            "0" => "",
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
        ),
        "text" => "",
    );

    if ($key != 0 &&  $value['date'] > $lastDatePost ) {
        if (isset($value['attachments'])) {
            $array['date'] = $value['date'];
            if ($value['attachments'][0]['type'] == 'video') {
                $array['date'] = $value['date'];
                if (preg_match_all('#https://.+?\s#i', $value['text'], $arr)) {
                    $array['video']['0'] = trim($arr[0][0]);
                };
                $array['text'] = preg_replace('#https://.+?\s#i', '', $value['text']);
            }
            if($value['attachments'][0]['type'] == 'link'){
                $array['video']['0'] = $value['attachments'][0]['link']['url'];
               $array['text'] = preg_replace('#https://.+?\s#i', '', $value['text']);
            }
            if ($value['attachments'][0]['type'] == 'photo') {
                $array['date'] =   $value['date'];
                preg_match_all('#https://.+?\s#i', $value['text'], $arr);

                foreach ($value['attachments'] as $key1 => $value1) {
                    $array['photo']["$key1"] =  $value1['photo']['sizes'][6]['url'];
                }
                $array['text'] = preg_replace('#https://.+?\s#i', '', $value['text']);
            }
        }
    }

    $detailText = "";
    $prevText = $db->clear($array['text']);
    $prevText =  preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $prevText);
    $detailText = "";
    $date = $array["date"];

     if(!empty($prevText) && (!empty($array['photo'][0])  || !empty($array['video'][0])) ){
        $count ++;
        $db->insert(
            "news",
            $prevText,
            $detailText,
            $array['photo'],
            $array['video'],
            $date
        );
    }
     }
  if($count == 0){
      echo "<h1> Новых новостей в группе контакте не обнаружено!!! </h1>";
  }else{
    echo "<h1> Добалено ". $db->countNews($count)." </h1>";
  }
  

 