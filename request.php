<?php
/**
 * Created by PhpStorm.
 * User: pantao
 * Date: 2017/12/28
 * Time: 20:02
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hello php</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit">
</form>

<?php
$name = $_REQUEST['fname'];
echo $name;
echo "<br/>";
$name = $_POST['fname'];
echo $name;
echo "<br/><a href=\"test_get.php?subject=PHP&web=W3school.com.cn\">测试 $_GET[_ijt]</a>";
?>
</body>
</html>
