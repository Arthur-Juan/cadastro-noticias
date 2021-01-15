<?php

require __DIR__ .'/vendor/autoload.php';

use \App\Entity\Noticias;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//CONDIÇÕES SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(" ", '%', $busca).'%"' : null
];

$where = implode(' AND ', $condicoes);

$noticias = Noticias::getNoticias($where);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';