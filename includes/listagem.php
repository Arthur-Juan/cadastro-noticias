<?php
$resultados = '';

foreach ($noticias as $noticia){
    $resultados .= ' <div class="col-md-4">
     <div class="card mb-4 shadow">
                
    <div class="card-body">
        <h5 class="card-body">'.$noticia->titulo.'<h5>
        <h6 class="card-subtitle mb-2 text-muted">'.$noticia->categoria.'</h6>
      <p class="card-text">'.$noticia->conteudo.'</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <a href ="excluir.php?id='.$noticia->id.'" class="btn btn-sm btn-outline-danger mr-1">Excluir</a>
          <a href="editar.php?id='.$noticia->id.'" class="btn btn-sm btn-outline-info">Editar</a>
        </div>
      </div>
    </div>
  </div>
  </div>';
}

$resultados = strlen($resultados) ? $resultados : '<div class="alert alert-info text-center">Nenhuma notícia encontrada!</div>';


$mensagem = '';
if(isset($_GET['status'])){
  switch($_GET['status']){
    case 'success':
      $mensagem = '<div class="alert alert-success text-center">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}

//REMOVER OS GETS DA URL
unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);
//ESSA SEQUENCIA MONTA UMA URL COM VALORES PARA A PAGINAÇÃO, NA PAGINAÇÃO QUEREMOS O RESULTADO DA BUSCA NOS BOTÕES
//ENTÃO ESSE UNSET REMOVE VALORES 'INDESEJADOS' E O HTTP_BUILD_QUERY MONTA UMA QUERY STRING PHP COM OS VALORES DESEJADOS PRA PASSAR NO BOTÃO



$paginacao = '';
$paginas = $obPagination->getPages();
foreach($paginas as $key=>$pagina){
  $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
  $paginacao .='<a href="?pagina=' .$pagina['pagina'].'&'.$gets.'">
                                  <button type="button" class ="btn '.$class.'">'.$pagina['pagina'].'</button>
                                  </a>'
                                      ;
}
?>


<main>


<div class=" py-5 bg-light rounded shadow">
        <?=$mensagem?>
        <div class="container">

          <div class="row">
           
             <?=$resultados?>
         
          </div>
          <section>
         
        <?=$paginacao?>           
         
          </section>
        </div>






</main>