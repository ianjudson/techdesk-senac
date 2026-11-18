<?php
require "config.php";

//verificacao do envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $solicitante = $_POST["solicitante"];
    $setor = $_POST["setor"];
    $prioridade = $_POST["prioridade"];
    $estado = $_POST["status"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO chamados
    (titulo, solicitante, setor, prioridade, estado, descricao)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $titulo,
        $solicitante,
        $setor,
        $prioridade,
        $estado,
        $descricao
    ]);

    header("Location: index.php");
    exit; //encerra a execução do php
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo chamado - Techdesk</title>
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

    <!-- FORMULÁRIO DE INSERÇÃO -->

    <h2 class="text-center">Novo chamado</h2>
    <form class="container text-start" method="post">
        <div class="row align-items-start">

            <div class="col-12">
                <label for="titulo" class="form-label">Título</label>
                <input class="form-control" id="titulo" name="titulo" type="text" required>
            </div>

            <div class="col-3">
                <label for="solicitante" class="form-label">Solicitante</label>
                <input class="form-control" name="solicitante" type="text" id="solicitante" required>
            </div>
            <div class="col-3">
                <label for="setor" class="form-label">Setor</label>
                <input class="form-control" name="setor" type="text" id="setor" required>
            </div>

            <div class="col-3">
                <div class="form-field">
                    <label for="prioridade" class="form-label">Prioridade</label>
                    <select name="prioridade" class="form-control" id="prioridade" required>
                        <option>Baixa</option>
                        <option selected>Média</option>
                        <option>Alta</option>
                    </select>
                </div>
            </div>

            <div class="col-3">
                <div class="form-field">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" id="status" required>
                        <option selected>Aberto</option>
                        <option>Em andamento</option>
                        <option>Concluído</option>
                    </select>
                </div>
            </div>

            <div class="form-field">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="8" required></textarea>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        <a href="index.php" class="btn btn-outline-danger">Voltar</a>
    </form>






    <!--Estilização (JS) Bootstrap via CDN-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.min.js"
        integrity="sha384-89aa4glufciPv46aKltztWQEmk+Tu9W2RhzXr6VcnUUEub7F8+06RcL2RYLCOHUq"
        crossorigin="anonymous"></script>
</body>

</html>