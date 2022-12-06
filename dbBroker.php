<?php
$serverName = "localhost";
$userName = "root";
$password = "root";

$link = mysqli_connect($serverName, $userName, $password);
mysqli_select_db($link, "knjizara");

?>