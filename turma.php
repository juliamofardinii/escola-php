<?php
$conexao = mysqli_connect("localhost:3306", "root", "root", "escola");
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

if (isset($_POST['submit'])) {

    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $vagas = $_POST['vagas'];

    $sql = "INSERT INTO turmas (descricao, ano, vagas) VALUES('$descricao', '$ano', '$vagas')";

    $result = mysqli_query($conexao, $sql);
}

$sql = "SELECT * FROM turmas";

$turmas = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmas</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <header class="cabecalho">
            <nav class="cabecalho__menu">
                <a class="cabecalho__menu__link" href="index.php">Home</a>
                <a class="cabecalho__menu__link" href="aluno.php">Alunos</a>
                <a class="cabecalho__menu__link" href="turma.php">Turmas</a>
            </nav>
    </header>
    <main class="conteudo__formularios">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Ano</th>
                    <th>Vagas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($turma = mysqli_fetch_assoc($turmas)) {
                    echo "<tr>";
                    echo "<td>" . $turma['ID'] . "</td>";
                    echo "<td>" . $turma['descricao'] . "</td>";
                    echo "<td>" . $turma['ano'] . "</td>";
                    echo "<td>" . $turma['vagas'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br />
        <form action="turma.php" method="POST">
            <div>
                <label>Descrição</label>
                <input type="text" id="descricao" name="descricao" value="" autofocus class="form-control" require />
            </div>
            <div>
                <label>Ano</label>
                <input type="number" name="ano" value="" class="form-control" require />
            </div>
            <div>
                <label>Vagas</label>
                <input type="number" name="vagas" value="" class="form-control" require />
            </div>

            <br>
            <div>
                <input class="btn__cadastrar" type="submit" name="submit" value="Cadastrar" />
            </div>
            </div>
        </form>
    </main>
</body>

</html>