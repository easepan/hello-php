<?php
/**
 * Created by PhpStorm.
 * User: pantao
 * Date: 2017/12/29
 * Time: 19:18
 */

//简单地读取文件
echo readfile("hello.txt");

echo "<br/><br/>";

//高级地读取文件
$myfile = fopen("hello.txt", "r") or die("Unable to open file!");
echo fread($myfile, filesize("hello.txt"));
fclose($myfile);

echo "<br/><br/>读取单选文件：<br/>";

//读取单选文件
$myfile = fopen("hello.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);

echo "<br/><br/>读取单个文件：<br/>";

$myfile = fopen("hello.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    echo fgetc($myfile);
}
fclose($myfile);

echo "<br/><br/>写入文件（会覆盖原内容）：<br/>";

$myfile = fopen("hello.txt", "w") or die("Unable to open file!");
$txt = "Bill Gates\n";
fwrite($myfile, $txt);
$txt = "Steve Jobs\n";
fwrite($myfile, $txt);
fclose($myfile);
echo readfile("hello.txt");