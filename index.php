<?php

define("APP_FOLDER", "php/app");
define("APP_URL", "http://".$_SERVER['SERVER_NAME'].":8888/".APP_FOLDER."/");
define("APP_URL_CSS", APP_URL."public/css/");
define("APP_URL_IMG", APP_URL."public/img/");
define("APP_URL_JS", APP_URL."public/js/");

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)).DS);
define("APP_PATH", ROOT."application".DS);
define("LIB_PATH", ROOT."libs".DS);

require_once(APP_PATH."config.php");
require_once(LIB_PATH."PDO.php");
require_once(LIB_PATH."Authorization.php");
require_once(LIB_PATH."Password.php");
require_once(LIB_PATH."Validations.php");
require_once(APP_PATH."request.php");
require_once(APP_PATH."bootstrap.php");
require_once(APP_PATH."controller.php");
require_once(APP_PATH."model.php");
require_once(APP_PATH."view.php");

if (isset($_GET['url'])) {
    $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
    $url = explode("/", $url);
    $url = array_filter($url);
    $controller = array_shift($url);
    $action = array_shift($url);
    $args = $url;
}

if (!isset($controller)) $controller = "pages";
if (!isset($action)) $action = "index";
if (empty($args)) $args = array();

$path = ROOT."controllers".DS.$controller."Controller.php";
$view = ROOT."views".DS.$controller.DS.$action.".php";
$header = ROOT."views".DS."layouts".DS."default".DS."header.php";
$footer = ROOT."views".DS."layouts".DS."default".DS."footer.php";

if ($action == "login") {
    $header = ROOT."views".DS."layouts".DS."login".DS."header.php";
    $footer = ROOT."views".DS."layouts".DS."login".DS."footer.php";

} else {
    Authorization::logged();
}

if (file_exists($path)) {
    include_once($path);
    $ob = new $controller();

    if (method_exists($ob, $action)) {
        $ob->$action($args);

        if (file_exists($view)) {
            include_once($header);
            include_once($view);
            include_once($footer);
        } else {
            echo "La vista para la acción $action no existe";
        }
    } else {
        echo "La acción $action no existe";
    }
} else {
    echo "El controlador $controller no existe";
}