<?php
include_once('db.php');

$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string( md5($_POST["password"]));
$sql = "SELECT count(*)FROM users WHERE(username='$username' AND password='$password')";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

if($row[0] > 0)
echo "Login Sucessful";
else
echo "Failed to Login";
?>