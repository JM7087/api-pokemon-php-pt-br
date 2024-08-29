<?php

require_once 'conexao.php';

// Habilitar exibição de erros para debug (remover em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Função para obter a URL base
function getBaseUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $port = ($_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443) ? ':' . $_SERVER['SERVER_PORT'] : '';

    return $protocol . $host . $port;
}

// Obter o segmento da URL depois do 'pokemon-api-backup/'
$segmentoUrl = trim(str_replace('/api-pokemon-php', '', $_SERVER['REQUEST_URI']), '/');
$nomeOuNumeroDoPokemon = urldecode($segmentoUrl);

// Verificar se um parâmetro foi passado
if (!empty($nomeOuNumeroDoPokemon)) {
    if (is_numeric($nomeOuNumeroDoPokemon)) {
        // Selecionar pokemon pelo número
        $stmt = $pdo->prepare("SELECT * FROM `pokemon` WHERE numero = ?");
        $stmt->execute([$nomeOuNumeroDoPokemon]);
        $pokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Selecionar pokemon pelo nome
        $stmt = $pdo->prepare("SELECT * FROM `pokemon` WHERE nome LIKE ? LIMIT 1");
        $stmt->execute([$nomeOuNumeroDoPokemon . '%']);
        $pokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    // Listar todos os pokemons se nenhum parâmetro for passado
    $stmt = $pdo->query("SELECT * FROM `pokemon`");
    $pokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Adicionar URL completa para a imagem, ajuste como nesesario.
$baseUrl = getBaseUrl();
foreach ($pokemon as &$p) {
    $p['imagem'] = $baseUrl . '/'. 'api-pokemon-php' .'/' . $p['imagem'];
}

// Retornar os pokemons em formato JSON
header('Content-Type: application/json');
echo json_encode($pokemon);
