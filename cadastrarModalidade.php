<?php
    include_once('./class/Modalidade.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">

    <title>Akademia - Cadastro de Modalidade</title>
</head>
<body>
    <?php
        include_once('./components/header.php');
    ?>

    <div class="cadastroModalidade">
        <h2>Cadastro de Modalidade</h2>
        <form method="post" id="formModalidade">
        
            <label for="nome">Nome:</label>
            <input type="text" placeholder="Informe o nome da modalidade" name="nome" required>
            
            <label for="descricao">Descrição:</label>
            <textarea rows="5" cols="50" id="descricao" placeholder="Informe a descrição da modalidade" name="descricao" required></textarea>
            
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" required>
            
            <div class="botoesModalidade">
                <button type="submit" name="submit">Cadastrar</button>
                <a href="./acesso.php">Voltar</a>
            </div>
            
            <?php
                if (isset($_REQUEST["imagem"])) {

                    $target_dir = "assets/upload/";
                    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    }
            
                    //
            
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["imagem"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
                
                    $m = new Modalidade();
                    $m->create($_REQUEST["nome"], $_REQUEST["descricao"], $target_file);

                    echo $u->cadastrarModalidade() == true ? "
                    <span class='mensagemSucesso'>Modalidade Cadastrada com sucesso!</span>" : 
                    "<span class='mensagemErro'>Ocorreu um erro inesperado. Tente novamente mais tarde</span>";
                }
            ?>
            
        </form>
    </div>

    <?php
        include_once('./components/footer.php');
    ?>
</body>