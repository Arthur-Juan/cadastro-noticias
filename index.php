<?php

require __DIR__ .'/vendor/autoload.php';

use \App\Entity\Noticias;
use \App\Entity\Pagination;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//CONDIÇÕES SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(" ", '%', $busca).'%"' : null
];

$where = implode(' AND ', $condicoes);
//QUANTIDADE TOTAL DE VAGAS
$quantidadeNoticia = Noticias::getQuantidadeNoticia($where);

//PAGINAÇÃO
$obPagination = new Pagination($quantidadeNoticia, $_GET['pagina'] ?? 1, 6); //?? confirma se exite ou não
$obPagination->getPages();
$noticias = Noticias::getNoticias($where,null, $obPagination->getLimit());



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';