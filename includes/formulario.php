



<main class='text-light'>
<h2><?=TITLE?></h2>
<section>
    <a href="index.php">
        <button class='btn btn-success'>Voltar</button>    
    </a>
</section>

<form method="post">
    <div class='form-group'>
    <label>Título</label>
    <input type='text'required class='form-control' name='titulo' value=<?=$obNoticia->titulo?>>
    </div>
    
    <div class='form-group'>
    <label>Conteúdo</label>
    <textarea type='text' required class='form-control' rows='5' name='conteudo'><?=$obNoticia->conteudo?></textarea>
    </div>
    
    <div class='form-group'>
    <label>Categoria</label>
    <input type='text' required class='form-control' name='categoria' value=<?=$obNoticia->categoria?>>
    </div>

    <div class='form-group'>
        <button class='btn btn-success'>Enviar</button>
    </div>
</form>
</main>