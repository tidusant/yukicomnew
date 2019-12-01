<?php
function t($data,$exit=1) {
    echo '<pre style="text-align:left;">';
    print_r($data);
    echo '</pre>';
    if($exit)exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// set default timezone
date_default_timezone_set('UTC');

// handle php webserver
if (PHP_SAPI == 'cli-server' && is_file(__DIR__.parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// bootstrap monoplane
require(__DIR__.'/bootstrap.php');


// $cockpit->bind("/convertolddb", function() use($app) {
//     $client = new \MongoDB\Client('mongodb://192.168.1.229:27017/yukicomold', [
//             'db' => 'yukicomold',
//             'username'=>'yukicom',
//             'password'=>'yukicom@P.',
//         ], []);

//     $db = $client->yukicomold;

//     $chips=$db->addons_posts->find();
//     $count=0;
//     foreach ($chips as $key => $value) {
        
        
//         cockpit('collections:save', 'chips',['name'=>$value->title,'published'=>1,'content'=>$value->content]);
//         $count++;
//     }
// });

// run app
$cockpit->run();
