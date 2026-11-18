<?php
require "config.php"; //carrega arquivo de configuração/conexão com o banco.

//comando para busca de chamados cadastrados no banco.
//Alterado para exibir de forma ascendente (ASC)
$sql = "SELECT * FROM chamados ORDER by id ASC";

//Executa o comando ("SELECT") e guarda os registros encontrados por ele.
$chamados = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//$pdo é a conexão com o banco criada no arquivo config.php
//->query($sql) executa a instrução/comando SQL criado.
//->fetchAll pega todos os registros encontrados pelo comando SQL.
//PDO::FETCH_ASSOC faz com que cada registro seja organizado usando o nome correto das colunas. 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techdesk - Senac</title>
    <!--Estilização Bootstrap via CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Techdesk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Chamados</a>
                    <a class="nav-link active" aria-current="page" href="novo_chamado.php">Abrir chamado</a>
                    <!-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>

    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Solicitante</th>
                <th scope="col">Setor</th>
                <th scope="col">Prioridade</th>
                <th scope="col">Status</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($chamados as $chamado): ?>

                <tr>
                    <td>
                        <?= $chamado["id"] ?>
                    </td>
                    <td>
                        <?= $chamado["titulo"] ?>
                    </td>
                    <td>
                        <?= $chamado["solicitante"] ?>
                    </td>
                    <td>
                        <?= $chamado["setor"] ?>
                    </td>
                    <td>
                        <?= $chamado["prioridade"] ?>
                    </td>
                    <td>
                        <?= $chamado["estado"] ?>
                    </td>

                    <td style="display:flex; gap:5px;">
                        <a href="visualizar_chamado.php" class="btn btn-outline-secondary">Visualizar</a>
                        <a href="editar_chamado.php" class="btn btn-outline-primary">Editar</a>

                        <form action="excluir_chamado.php" method="post"  
                            onsubmit="return confirm('Deseja excluir esse chamado?')">
                            <input type="hidden" name="id" value="<?= $chamado["id"] ?>">
                            <button type="submit" class="btn btn-outline-danger">Excluir</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
        <!--Estilização (JS) Bootstrap via CDN-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.min.js"
        integrity="sha384-89aa4glufciPv46aKltztWQEmk+Tu9W2RhzXr6VcnUUEub7F8+06RcL2RYLCOHUq"
        crossorigin="anonymous"></script>
</body>

</html>