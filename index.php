<?php
require "config.php"; //carrega arquivo de configuração/conexão com o banco.

//comando para busca de chamados cadastrados no banco.
$sql = "SELECT * FROM chamados ORDER by id DESC";

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
</head>

<body>
    <h1>Central de Chamados</h1>
    <a href="novo.php">Novo Chamado</a>
    <br><br>

    <table border="1">
        <!-- borda simples -->

        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Solicitante</th>
            <th>Setor</th>
            <th>Prioridade</th>
            <th>Status</th>
            <th>Opções</th>
        </tr>


        <?php foreach ($chamados as $chamado): ?>

            <tr>
                <td><?= $chamado["id"] ?></td>
                <td><?= $chamado["titulo"] ?></td>
                <td><?= $chamado["solicitante"] ?></td>
                <td><?= $chamado["setor"] ?></td>
                <td><?= $chamado["prioridade"] ?></td>
                <td><?= $chamado["estado"] ?></td>
                <td><a href="visualizar_chamado.php">Visualizar</a>
                    <a href="editar_chamado.php">Editar</a>

                    <form action="excluir_chamado.php" method="post" onsubmit="return confirm('Deseja excluir esse chamado?')">
                        <input type="hidden" name="id"
                            value="<?= $chamado["id"] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
</body>

</html>