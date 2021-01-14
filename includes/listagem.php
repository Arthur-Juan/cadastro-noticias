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

?>


<main>


<div class=" py-5 bg-light rounded shadow">
        <?=$mensagem?>
        <div class="container">

          <div class="row">
           
             <?=$resultados?>
         
          </div>
        </div>






</main>