<?php
    require '../config.php';
    include '../src/Artigo.php';
    include '../src/redireciona.php';


    $artigo = new Artigo($mysql);
    $obj_artigo = $artigo->exibirArtigo($_GET['id']);

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $artigo->editar($_POST['titulo'],$_POST['conteudo'],$_POST['id']);        
        redireciona('index.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php?id=<?php echo $obj_artigo['id']?>" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $obj_artigo['titulo']?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo nl2br($obj_artigo['conteudo'])?></textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $obj_artigo['id']?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>