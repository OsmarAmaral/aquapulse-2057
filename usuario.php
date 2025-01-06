<?php
// Certifique-se de passar 'nome' e 'email' pela URL (query string)
// Por exemplo: usuario.php?nome=João&email=joao@email.com
$nome = isset($_GET['nome']) ? addslashes($_GET['nome']) : '';
$email = isset($_GET['email']) ? addslashes($_GET['email']) : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" href="src/css/usuario.css">
    <link rel="stylesheet" href="src/css/header.css">
    <title>AquaPulse 2057</title>
</head>

<body>
    <header>
        <h1 id="titulo-principal">AquaPulse</h1>
        <div>
            <a class="header-links" href="index.html">Inicio</a>
            <a class="header-links" href="#sobre-produto">Produto</a>
            <a class="header-links" href="#footer">Suporte</a>
        </div>
        <div>
            <a href="login.php"><img src="src/image/logo.png" alt="foto de perfil" style="height: 50px;"></a>
        </div>
    </header>
    <div id="container" style="height: 90vh;">
        <main>
            <img src="src/image/logo.png" alt="foto de perfil" style="height: 160px; width: 160px;">
            <p id="nome-usuario"></p>
            <p id="email-usuario"></p>
        </main>
    </div>
</body>
    <script>
        // Dados do usuário vindos do PHP
        const user = {
            nome: "<?php echo $nome; ?>",
            email: "<?php echo $email; ?>"
        };

        // Exibir o nome do usuário na página
        const nomeUsuario = document.querySelector('#nome-usuario');
        nomeUsuario.textContent = `${user.nome}`;

        const emailUsuario = document.querySelector('#email-usuario');
        emailUsuario.textContent = `${user.email}`;

        // Armazenar os dados em uma variável (ou localStorage, se necessário)
        console.log("Dados do usuário armazenados:", user);
    </script>
</html>
