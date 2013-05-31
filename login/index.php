<?php
session_start();

include('/class.login.php');

$login = new Login();

if($login->isLoggedIn())
  echo "Members Area";
else
  echo "Front Page";


?>