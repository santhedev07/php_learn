<?php

$hostname = "localhost";
$db_user = "root";
$password = "";
$db_name = "php_native";

$db = mysqli_connect($hostname, $db_user, $password, $db_name);
if($db->connect_error){
    echo "Koneksi Gagal: ";
    die('error : '.$db->connect_error);
}
?>