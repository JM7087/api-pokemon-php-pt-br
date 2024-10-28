<?php

// Configurações do banco de dados
$host = 'localhost';
$dbname = 'pokemon_api_backup';
$username = 'api';
$password = '123';

// Tentar estabelecer a conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
