<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['nova_senha'])) {
        $pdo = new PDO("mysql:host=localhost;dbname=enervision", "root", "");

        $email = $_POST['email'];
        $novaSenha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("UPDATE usuarios SET senha_usuario = ? WHERE email_usuario = ?");
        $stmt->execute([$novaSenha, $email]);

        echo "Senha atualizada com sucesso!";
    } else {
        echo "Erro: campos obrigatórios não preenchidos.";
    }
} else {
    echo "Acesso inválido.";
}
?>
<a href="index2.php"><button>voltar</button></a>

