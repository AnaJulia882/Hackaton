<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    // Salvar usuário
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome) VALUES (:nome)");
    $stmt->execute([':nome' => $nome]);
    $usuario_id = $pdo->lastInsertId();
}

// Buscar 5 perguntas da API
$apiUrl = "https://opentdb.com/api.php?amount=5&category=17&type=multiple"; 
$json = file_get_contents($apiUrl);
$dados = json_decode($json, true);
$perguntas = $dados['results'];
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EcoQuiz - Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🌍 Quiz de Sustentabilidade</h1>
        <form method="post" action="resultado.php">
            <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
            
            <?php foreach ($perguntas as $index => $q): ?>
                <div class="quiz-question">
                    <p><b><?= $q['question'] ?></b></p>
                    <?php
                        $opcoes = $q['incorrect_answers'];
                        $opcoes[] = $q['correct_answer'];
                        shuffle($opcoes);
                    ?>
                    <?php foreach ($opcoes as $op): ?>
                        <label>
                            <input type="radio" name="resposta[<?= $index ?>]" value="<?= htmlspecialchars($op) ?>" required>
                            <?= $op ?>
                        </label>
                    <?php endforeach; ?>
                    <input type="hidden" name="correta[<?= $index ?>]" value="<?= $q['correct_answer'] ?>">
                </div>
            <?php endforeach; ?>

            <button type="submit">Finalizar Quiz</button>
        </form>
    </div>
</body>
</html>