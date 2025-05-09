<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style3.css">
    <title>Login</title>
</head>

<body>
    </div>
    </section>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Login Page</title>
    </head>

    <body>
        <div class="container" id="container">
            <div class="sign-up">
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <h1>Crie sua conta</h1>
                    <span>ou use o e-mail para registro</span>
                    <form class="form" action="" method="POST">
                        <input type="name" name="nome_usuario" placeholder="Nome">
                        <input type="email" name="email_usuario" placeholder="Email">
                        <input type="password" name="senha_usuario" placeholder="Senha">
                        <input type="date" name="data_usuario">
                        <button class="button" type="submit" name="signup-button">Enviar</button>
                    </form>
            </div>

            <?php
            require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
            require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

            if (isset($_POST["nome_usuario"]) && isset($_POST["email_usuario"]) && isset($_POST["senha_usuario"], $_POST["data_usuario"])) {
                $dispositivoController = new DispositivoController($pdo);

                $dispositivoController->cadastrar($_POST["nome_usuario"], $_POST["email_usuario"], $_POST["senha_usuario"], $_POST["data_usuario"]);

            }
            ?>

            <div class="sign-in">
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <h1>Entrar</h1>
                    <span>ou use a senha do e-mail</span>
                    <input type="email" name="email_usuario" placeholder="Email" required />
                    <input type="password" name="senha_usuario" placeholder="Senha" required />
                    <a href="../verificaremail.php">
                    Esqueceu sua senha</a>
                    <button type="submit" name="login-button">Login</button>
                </form>
            </div>
            <div class="toogle-container">
                <div class="toogle">
                    <div class="toogle-panel toogle-left">
                        <h1>Bem vindo usuário!</h1>
                        <p>Se você já tem uma conta</p>
                        <button class="hidden" id="login">Entrar</button>
                    </div>
                    <div class="toogle-panel toogle-right">
                        <h1>
                        Olá, usuário!</h1>
                        <p>Se você não tem uma conta</p>
                        <button class="hidden" id="register">Inscrever-se
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../script.js"></script>


        <?php
        require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
        require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login-button'])) {
            $dispositivoController = new DispositivoController($pdo);

            if ($dispositivoController->login($_POST["email_usuario"], $_POST["senha_usuario"])) {
                header("Location: ../index2.php");
                exit;
            } else {
                echo "<p class='erro'>Usuário ou senha inválidos.</p>";
            }
        }
        ?>

    </body>

</html>