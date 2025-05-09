<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="meu-perfil.css">
    <title>Document</title>
</head>

<body>


    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <!-- styles -->
        <!-- scripts -->
        <script src="js.js" defer></script>
        <title>Profile</title>
    </head>

    <body>
        <a class="botao-voltar" href="index2.php"><button>Voltar</button></a>

        <main class="main">
            <?php
            if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
                move_uploaded_file($_FILES['imagem']['tmp_name'], 'img/' . $_FILES['imagem']['name']);
                echo "<script>
                alert('Upload realizado com sucesso')
            </script>";
            }

            ?>


            <div class="w-100 box">
                <form class="box" id="form-form" method="post" enctype="multipart/form-data">
                    <!-- image -->
                    <div class="image-upload box">
                        <img src="img/camera.png" id="camera" class="camera" height="75px" width="75px">
                        <input type="file" name="imagem" id="image-field" accept="image/*">
                        <img id="image-preview" src="" class="aspect-ratio hidden">
                    </div>
                    <button type="submit">Confirmar alterações</button>
                </form>
            </div>

            <div class="campo-sobre-mim">
                <h1 class="name">
                    <?php if (empty($_SESSION['nome_usuario'])) {
                    } else {
                        echo $_SESSION['nome_usuario'];
                    } ?>
                </h1>
                <h2>Campo sobre mim</h2>
                <input type="text">
            </div>
        </main>
    </body>

    </html>
    <style>
        .editar-perfil {
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            position: relative;
            right: 50px;
        }

        a {
            padding: 60px;
        }

        .imagem-usuario-editar {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            left: 50%;
            background-color: rgb(176, 173, 173);
            height: 180px;
            width: 180px;
            border-radius: 100%;
            border: 2px solid black;
            gap: 200px;
        }

        .imagem-usuario-editar img {
            height: 90px;
            width: 90px;
        }

        .name-usuario {}

        .botao-editar {
            position: relative;
            left: 80px;
        }

        .campo-sobre-mim {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        input {}

        button {
            border: none;
        }
    </style>
    </div>
</body>

</html>