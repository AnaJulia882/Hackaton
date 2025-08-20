<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EcoQuiz - Início</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao EcoQuiz 🌱</h1>
        <form method="post" action="quiz.php">
            <label>Digite seu nome:</label>
            <input type="text" name="nome" required>
            <button type="submit">Iniciar Quiz</button>
        </form>
    </div>
</body>
</html>
