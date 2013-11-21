<?php header("Content-type: text/html; charset=utf-8");
//название класса название файла
require ('config/config.php');
require ('auth/auth.php');

function __autoload($class) {
    require LIBS . $class .".php";
}

$bootstrap = new Bootstrap();
$bootstrap->init();
