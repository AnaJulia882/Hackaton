<?php
include "db.php";

$usuario_id = $_POST['usuario_id'];
$respostas = $_POST['resposta'];
$corretas = $_POST['correta'];

$pontos = 0;
foreach ($respostas as $i => $resp) {
    if ($resp == $corretas[$i]) {
        $pontos++;
    }
}

$stmt = $pdo->prepare("INSERT INTO pontuacoes (usuario_id, pontos) VALUES (:usuario_id, :pontos)");
$stmt->execute([':usuario_id' => $usuario_id, ':pontos' => $pontos]);

$ranking = $pdo->query("SELECT u.nome, p.pontos, p.data 
                        FROM pontuacoes p 
                        JOIN usuarios u ON p.usuario_id = u.id 
                        ORDER BY p.pontos DESC, p.data ASC 
                        LIMIT 10")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EcoQuiz - Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>✅ Resultado Final</h1>
        <p style="text-align:center;">Você fez <b><?= $pontos ?></b> pontos!</p>

        <h2>🏆 Ranking dos Melhores</h2>
        <ol>
            <?php foreach ($ranking as $r): ?>
                <li><?= $r['nome'] ?> - <?= $r['pontos'] ?> pontos</li>
            <?php endforeach; ?>
        </ol>

        <div style="margin-top:20px; text-align:center;">
            <a href="index.php"><button>Jogar Novamente</button></a>
        </div>
    </div>
</body>

</html>
