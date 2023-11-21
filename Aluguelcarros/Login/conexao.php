<?php

$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "aluguel";

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("erro");
}

session_start();
