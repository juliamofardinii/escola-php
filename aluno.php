<?php
$conexao = mysqli_connect("localhost:3306", "root", "root", "escola");
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $datanascimento = $_POST['datanascimento'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO alunos (NOME,DATANASCIMENTO,CPF) VALUES('$nome', '$datanascimento', '$cpf')";

    $result = mysqli_query($conexao, $sql);
}

$sql = "SELECT * FROM alunos";

$alunos = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
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
        <table class="tabela">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($aluno = mysqli_fetch_assoc($alunos)) {
                    echo "<tr>";
                    echo "<td>" . $aluno['id'] . "</td>";
                    echo "<td>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['datanascimento'] . "</td>";
                    echo "<td>" . $aluno['cpf'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br />
        <form action="aluno.php" method="POST">
            <div>
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" value="" autofocus class="form-control" require />
            </div>
            <div>
                <label>Data de Nascimento:</label>
                <input type="date" name="datanascimento" value="" class="form-control" require />
            </div>
            <div>
                <label>CPF: </label>
                <input type="number" name="cpf" value="" class="form-control" require />
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