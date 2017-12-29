<?php
/**
 * Created by PhpStorm.
 * User: pantao
 * Date: 2017/12/29
 * Time: 21:43
 */
echo "验证是否是整数。<br/>";
$int = 123;

if (filter_var($int, FILTER_VALIDATE_INT)) {
    echo("Integer is valid");
} else {
    echo("Integer is not valid");
}

echo "<br/><br/>区域验证<br/>";

$var = 300;

$int_options = array(
    "options" => array
    (
        "min_range" => 0,
        "max_range" => 256
    )
);

if (!filter_var($var, FILTER_VALIDATE_INT, $int_options)) {
    echo("Integer is not valid");
} else {
    echo("Integer is valid");
}

echo "<br/><br/>输入验证<br/>";

if (!filter_has_var(INPUT_GET, "email")) {
    echo("Input type does not exist");
} else {
    if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL)) {
        echo "E-Mail is not valid";
    } else {
        echo "E-Mail is valid";
    }
}

echo "<br/><br/>净化输入<br/>";

if (!filter_has_var(INPUT_POST, "url")) {
    echo("Input type does not exist");
} else {
    $url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL);
}

echo "<br/><br/>过滤多个输入<br/>";

$filters = array
(
    "name" => array
    (
        "filter" => FILTER_SANITIZE_STRING
    ),
    "age" => array
    (
        "filter" => FILTER_VALIDATE_INT,
        "options" => array
        (
            "min_range" => 1,
            "max_range" => 120
        )
    ),
    "email" => FILTER_VALIDATE_EMAIL,
);

$result = filter_input_array(INPUT_GET, $filters);

if (!$result["age"]) {
    echo("Age must be a number between 1 and 120.<br />");
} elseif (!$result["email"]) {
    echo("E-Mail is not valid.<br />");
} else {
    echo("User input is valid");
}

echo "<br/><br/>Filter Callback自定义过滤<br/>";

function convertSpace($string)
{
    return str_replace("_", " ", $string);
}

$string = "Peter_is_a_great_guy!";
echo filter_var($string, FILTER_CALLBACK, array("options" => "convertSpace"));