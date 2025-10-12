<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "fast_sesi_sa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexao falhou: " . $conn->connect_error);
}