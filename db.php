<?php
$host = "localhost";
$user = "root";   // coloque seu usuário do MySQL
$pass = "";       // coloque sua senha do MySQL
$dbname = "ecoquiz";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>