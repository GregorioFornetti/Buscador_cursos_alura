<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function buscar(string $url): array
    {
        $response = $this->client->request('GET', $url);

        $crawler = new Crawler($response->getBody());
        $cursos = $crawler->filter('.card-curso__nome');

        $arrayCursosString = [];
        foreach ($cursos as $curso) {
            $arrayCursosString[] = $curso->textContent;
        }
        return $arrayCursosString;
    }
}
