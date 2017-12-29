<?php
/**
 * Created by PhpStorm.
 * User: pantao
 * Date: 2017/12/29
 * Time: 21:25
 */

function customError($errno, $errstr)
{
    echo "<b>Error:</b> [$errno] $errstr<br />";
    echo "Ending Script<br/>";
//    die();
}

set_error_handler("customError");

try {
    readfile("nothing");
} catch (Exception $exception) {
    echo "read file error: " . $exception->getMessage();
}

function myException($exception)
{
    echo "<b>Exception:</b> ", $exception->getMessage();
}

set_exception_handler('myException');


if (!isset($_COOKIE['error'])) {
    throw new Exception("cookie is not set.");
}

echo 1 / 0;