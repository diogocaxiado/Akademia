
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">

    <title>Akademia</title>
</head>
<body>
    <header>
        <nav>
            <a href="../index.html">Início</a>
            <a href="#servicos">Serviços</a>
            <a href="#">Planos</a>
            <a href="#">Eventos</a>
            <a href="./cadastrar.php">Cadastre-se</a>
        </nav>

        <img id="logo" src="assets/logo.png" alt="">
    </header>


    <main>
        <section class="cadastro">

        <form method="post">
    
        </form>

        <?php
            if (isset($_REQUEST["cadastrar"])) {
                include_once("./class/Usuario.php");

                $u = new Usuario();
                $u->create($_REQUEST["nome"], $_REQUEST["email"], $_REQUEST["dtNascimento"], $_REQUEST["cidade"], $_REQUEST["senha"]);

                echo $u->inserirUsuario() == true ? "<p>Usuário Cadastrado!</p>" : "<p>Ocorreu um erro.</p>";
            }
        ?>
        </section>
    </main>
</body>
</html>