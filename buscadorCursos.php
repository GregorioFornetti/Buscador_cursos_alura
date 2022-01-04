#!/usr/bin/env php
<?php

//namespace Alura\BuscadorDeCursos;

// A psr-4 serve apenas para importar as classes que seguem esse padrão
// Para incluir arquivos, adicione no "autoload" do composer dentro do array de "files" os arquivos que possuem funções
// Para incluir outras classes que não implementam psr-4, utilize "classmap" dentro do "autoload" do composer e coloque os arquivos que possuem essas classes dentro do array.
// Após mudar o composer.json, rode o comando: composer dumpautoload   (atualiza o autoloader)

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Alura\BuscadorDeCursos\{Buscador};

Classe1::teste();
Classe2::teste();
teste();

$client = new Client(
    [
    'base_uri' => 'https://www.alura.com.br',
    'verify' => false
    ]
);
$buscador = new Buscador($client);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) 
{
    echo $curso . PHP_EOL;
}

