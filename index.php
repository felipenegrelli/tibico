<?php
//unset($_COOKIE['login']);
$login_cookie = $_COOKIE['login'];

$page_title = "Tibico - Home";
include_once 'header.php';
include_once 'footer.php';
/*
if(isset($login_cookie)){
  $page_title = "Tibico - Home";
  include_once 'header.php';
  include_once 'footer.php';
}
else{
  header("location:login.php");
}
*/

?>
