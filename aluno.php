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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
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
            <label>Nome</label>
            <input type="text" id="nome" name="nome" value="" autofocus class="form-control" require />
        </div>
        <div>
            <label>Data de nascimento</label>
            <input type="date" name="datanascimento" value="" class="form-control" require />
        </div>
        <div>
            <label>Cpf</label>
            <input type="number" name="cpf" value="" class="form-control" require />
        </div>

        <br>
        <div>
            <input type="submit" name="submit" value="cadastrar" />
        </div>
        </div>
    </form>
</body>

</html>