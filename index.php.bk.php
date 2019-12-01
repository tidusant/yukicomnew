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
/* USER-AGENTS
================================================== */
function check_user_agent ( $type = NULL ) {
        $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
        if ( $type == 'bot' ) {
                // matches popular bots
                if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                        return true;
                        // watchmouse|pingdom\.com are "uptime services"
                }
        } else if ( $type == 'browser' ) {
                // matches core browser types
                if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
                        return true;
                }
        } else if ( $type == 'mobile' ) {
                // matches popular mobile devices that have small screens and/or touch inputs
                // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
                // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
                if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
                        // these are the most common
                        return true;
                } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
                        // these are less common, and might not be worth checking
                        return true;
                }
        }
        return false;
}


require_once("aaa/bootstrap.php");
$app = new Lime\App();


$app->bind("/", function() use($app) {
	
    //query ex:
    //	t(cockpit('collections:collection', 'testc1'));
    //t(cockpit('collections:find', 'testc1',['filter'=>['testf'=>"a1"]]));
    //t(cockpit('collections:count', 'testc1',[]));
	
    $test=1;
    return $app->render('views/index.php',['test'=>$test]);
});


$app->bind("/convertolddb", function() use($app) {
    // $client = new \MongoDB\Client('mongodb://192.168.1.229:27017/yukicomold', [
    //         'db' => 'yukicomold',
    //         'username'=>'yukicom',
    //         'password'=>'yukicom@P.',
    //     ], []);

    // $db = $client->yukicomold;

    // $chips=$db->addons_posts->find();
    // $count=0;
    // foreach ($chips as $key => $value) {
        
        
    //     cockpit('collections:save', 'chips',['name'=>$value->title,'publish'=>1,'content'=>$value->content]);
    //     $count++;
    // }
});


$app->bind("/:name", function($params) use($app) {

	t($params['name']);
    return $app->render('views/index.php');
});


$app->run();

?>