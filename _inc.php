<?php
session_start();
$params=json_decode(file_get_contents('param.json'),true);
define('CONNECT_PATH', $params['connect']['local']);
define('ROOT_DIR', '/cmrfwDefaultProject');
define('CSS_DIR', '/asset/css/');
define('JS_DIR', '/asset/js/');
define('IMG_DIR', '/asset/img/');
define('MOD_DIR', '/web/module/');
define('PAGES_DIR', '/web/pages/');
include 'lib/Form.php';
include 'lib/Html.php';
include 'lib/DB.php';
include 'lib/Autoload.php';
Autoloader::register(); 
$url="";
if(isset($_GET['url'])){
    $url=explode('/',$_GET['url']);
}
if(isset($_SESSION['user']['id'])){
    $username = $_SESSION['user']['name'];
    $userid = $_SESSION['user']['id'];
}else{
    $username='';$userid ='';
}
