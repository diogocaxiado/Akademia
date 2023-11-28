<?php
    include_once('./class/Usuario.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">

    <title>Akademia</title>
</head>
<body>
    <?php
        include_once('./components/header.php');
    ?>

    <main>
        <section class="formulario">
            
        <div>
            <h2>Área restrita</h2>
            <form method="post" id="formLogin">

                <label for="email">E-mail:</label>
                <input type="email" placeholder="Informe seu email" name="email" required>
                
                <label for="senha">Senha:</label>
                <input type="password" placeholder="Informe uma senha com 8 caracteres ou mais" name="senha" required>

                <?php
                    if (isset($_REQUEST["cadastrar"])) {
            
                        $u = new Usuario();
                        $u->create($_REQUEST["nome"], $_REQUEST["email"], $_REQUEST["dtNascimento"], $_REQUEST["cidade"], $_REQUEST["senha"]);

                        echo $u->inserirUsuario() == true ? "
                        <span class='mensagemSucesso'>Usuário Cadastrado!</span>" : 
                        "<span class='mensagemErro'>Ocorreu um erro.</span>";
                    }
                ?>
                
                <button type="submit" class="formBotao" name="cadastrar">Cadastrar</button>

                <span>Esqueceu a senha? Clique aqui.</span>
                <span>Nao tem cadastro? <a href="./cadastrar.php">Cadastre-se aqui.</a></span>
            </form>
        </div>

            <section class="imagemLateral">
                <img src="./assets/loginImagem.jpg" id="imagemCadastro" alt="">
            </section>
        </section>
    </main>

    <?php
        include_once('./components/footer.php');
    ?>
</body>
</html>