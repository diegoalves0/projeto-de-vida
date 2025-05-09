<?php

$host = 'localhost';
$dbname = 'enervision'; 
$usuario = 'root';
$senha = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    // Configura o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro, mostra mensagem e encerra
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>