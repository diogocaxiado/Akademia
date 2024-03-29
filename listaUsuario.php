<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./utils/confirmar.js"></script>
    <title>Akademia</title>
</head>
<body>
    <?php
        include_once('./components/header.php');
    ?>

    <div class="listaUsuario">
    <h1>Lista de Usuarios</h1>
        
        <?php
            include_once("./class/Usuario.php");

            $u = new Usuario();
            $listaDeUsuario = $u->listarUsuario();

        
            echo "<table class='tabelaUsuario'>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Data de Nascimento</th>
                    <th>Cidade</th>
                </tr>";

            foreach ($listaDeUsuario as $usuario) {
                echo 
                    "<tr class='tabelaInfo'>
                        <td>" . $usuario["nome"] . "</td>
                        <td>" . $usuario["email"] . "</td>
                        <td>" . $usuario["dtNascimento"] . "</td>
                        <td>" . $usuario["cidade"] . "</td>
                        <td> <a href='editarUsuario.php?id=" . $usuario["idUsuario"] . "' class='tabelaBotao'>Editar</a></td>
                        <td> <a href='deletarUsuario.php?id=" . $usuario["idUsuario"] . "'  class='tabelaBotao' onClick='return confirmarAcao()'>Deletar</a></td>
                    </tr>";
                }

            echo "</table>"
        ?>

        <a href="./acesso.php" class="botaoPrimario">Voltar</a>
    </div>
    
    <?php
        include_once('./components/footer.php');
    ?>
</body>
</html>