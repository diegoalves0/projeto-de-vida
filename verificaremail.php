<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=enervision", "root", "");

$email = $_POST['email'] ?? null;
$erro = '';
$mostrarFormularioSenha = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !isset($_POST['nova_senha'])) {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email_usuario = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        $mostrarFormularioSenha = true;
    } else {
        $erro = "E-mail não encontrado.";
    }
}
?>

<!-- Formulário de verificação de e-mail -->
<form method="POST" action="">
    <label>Digite seu e-mail:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
    <button type="submit">Verificar</button>
</form>

<?php if ($erro): ?>
    <p style="color:red"><?= $erro ?></p>
<?php endif; ?>

<!-- Formulário de nova senha (aparece só se e-mail for válido) -->
<?php if ($mostrarFormularioSenha): ?>
    <form method="POST" action="atualizarsenha.php">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <label>Nova senha:</label>
        <input type="password" name="nova_senha" required>
        <button type="submit">Salvar nova senha</button>
    </form>
<?php endif; ?>

</body>
</html>
