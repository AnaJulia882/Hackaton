EcoQuiz – Plataforma Educacional sobre Sustentabilidade

📌 Sobre o Projeto

O EcoQuiz é uma plataforma web gamificada que promove a educação ambiental por meio de quizzes interativos.
O projeto foi desenvolvido para o Hackathon “Dados pelo Clima” (ODS 13 – Ação Contra a Mudança Global do Clima), com o objetivo de conscientizar a população sobre sustentabilidade de forma divertida e acessível.

⸻

⚡ Funcionalidades
	•	Login simples com nome do jogador.
	•	Perguntas automáticas vindas da API Open Trivia DB(Inglês).
	•	Cálculo automático de pontuação.
	•	Ranking dos melhores jogadores.
	•	Interface web simples e funcional.

⸻

🛠️ Tecnologias Utilizadas
	•	Backend: PHP 
	•	Banco de Dados: MySQL
	•	Frontend: HTML, CSS, JavaScript
	•	API: Open Trivia DB

⸻

📂 Estrutura de Arquivos


│── db.php           # Conexão Banco
│── index.php        # Tela inicial 
│── quiz.php         # Página do quiz (perguntas da API)
│── resultado.php    # Resultado final + ranking

⚙️ Como Rodar o Projeto

1️⃣ Clonar o Repositório

git clone https://github.com/AnaJulia882/Hackathon.git

cd Hackathon

2️⃣ Configurar o Banco de Dados

No MySQL, execute:

CREATE DATABASE ecoquiz;

USE ecoquiz;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pontuacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    pontos INT NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

3️⃣ Configurar Conexão

Edite o arquivo db.php com suas credenciais MySQL:

$host = "localhost";
$user = "root";   // usuário do MySQL
$pass = "";       // senha do MySQL
$dbname = "ecoquiz";

4️⃣ Rodar Localmente
	•	Copie os arquivos para a pasta do seu servidor local (ex: htdocs no XAMPP ou www no WAMP).
	•	Acesse no navegador:

http://localhost/index.php


⸻

📊 Exemplo de Fluxo
	1.	Jogador acessa index.php e insere o nome.
	2.	O sistema busca 5 perguntas da Open Trivia DB.
	3.	O usuário responde e a pontuação é calculada.
	4.	O resultado aparece junto ao ranking dos melhores.

⸻

🌍 Contribuição para a ODS 13

O projeto contribui para a ODS 13 (Ação Contra a Mudança Global do Clima) ao:
	•	Promover educação ambiental de forma lúdica.
	•	Engajar pessoas em temas de sustentabilidade.
	•	Facilitar o aprendizado com perguntas dinâmicas de API externa.

⸻

📜 Licença

Este projeto é de código aberto e pode ser utilizado para fins educacionais e sociais.
