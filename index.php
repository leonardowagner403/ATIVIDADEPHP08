<?php

require_once 'model.php';
require_once 'controllers.php';

$instrutor = new Instrutor();

$instrutor->id = 1;
$instrutor->nome = "Carlos";
$instrutor->email = "carlos@email.com";
$instrutor->tipo = "instrutor";
$instrutor->materias_leciona = ["PHP", "HTML", "CSS"];
$instrutor->definirSenha("12345678");

$aluno = new Aluno();

$aluno->id = 2;
$aluno->nome = "João";
$aluno->email = "joao@email.com";
$aluno->tipo = "aluno";
$aluno->xp_total = 150;
$aluno->definirSenha("abcdefgh");

$usuarios = [$instrutor, $aluno];

$resultadoInstrutor = validar_login(
    "carlos@email.com",
    "12345678",
    $usuarios
);

$resultadoAluno = validar_login(
    "joao@email.com",
    "senhaerrada",
    $usuarios
);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Atividade 08 - POO</title>

    <style>
        body {
            background: black;
            color: white;
            font-family: Arial;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .usuarios {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .usuario {
            border: 1px solid white;
            padding: 20px;
            width: 400px;
        }

        h2 {
            text-align: center;
            background: #333;
            padding: 10px;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background: #555;
        }

        .mensagem {
            margin-top: 15px;
            padding: 10px;
            text-align: center;
            background: #222;
        }

        .rodape {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <h1>Atividade 08 - POO</h1>

    <div class="usuarios">

        <div class="usuario">

            <h2>Instrutor</h2>

            <table>

                <tr>
                    <th>ID</th>
                    <td><?= $instrutor->id ?></td>
                </tr>

                <tr>
                    <th>Nome</th>
                    <td><?= $instrutor->nome ?></td>
                </tr>

                <tr>
                    <th>E-mail</th>
                    <td><?= $instrutor->email ?></td>
                </tr>

                <tr>
                    <th>Tipo</th>
                    <td><?= $instrutor->tipo_formatado() ?></td>
                </tr>

                <tr>
                    <th>Matérias</th>
                    <td><?= implode(", ", $instrutor->materias_leciona) ?></td>
                </tr>

            </table>

            <div class="mensagem">
                <?= $instrutor->saudacao() ?>
            </div>

            <div class="mensagem">
                <?= $resultadoInstrutor['mensagem'] ?>
            </div>

        </div>


        <div class="usuario">

            <h2>Aluno</h2>

            <table>

                <tr>
                    <th>ID</th>
                    <td><?= $aluno->id ?></td>
                </tr>

                <tr>
                    <th>Nome</th>
                    <td><?= $aluno->nome ?></td>
                </tr>

                <tr>
                    <th>E-mail</th>
                    <td><?= $aluno->email ?></td>
                </tr>

                <tr>
                    <th>Tipo</th>
                    <td><?= $aluno->tipo_formatado() ?></td>
                </tr>

                <tr>
                    <th>XP</th>
                    <td><?= $aluno->xp_total ?></td>
                </tr>

            </table>

            <div class="mensagem">
                <?= $aluno->saudacao() ?>
            </div>

            <div class="mensagem">
                <?= $resultadoAluno['mensagem'] ?>
            </div>

        </div>

    </div>

    <div class="rodape">
        Atividade 08 - Programação Web
    </div>

</body>

</html>


