<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/EnerVision/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["profile_picture"])) {
  $file = $_FILES["profile_picture"];
  $uploadDir = __DIR__ . "/img/";

  if ($file["error"] !== 0) {
    $errorMessages = [
      1 => "o arquivo excede o tamanho máximo permitido pelo servidor.",
      2 => "o arquivo excede o tamanho máximo permitido pelo formulario.",
      3 => "o upload do arquivo foi feito parcialmente",
      4 => "nenhum arquivo foi enviado",
      6 => "pagina temporária ausente",
      7 => "falha ao escrever arquivo no disco",
      8 => "uma extensão PHP interrompeu o upload do arquivo."
    ];
    $_SESSION['upload_error'] = $errorMessages[$file["error"]] ?? "Erro desconhecido no upload";
  } else {
    $allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
    $fileType = mime_content_type($file["tmp_name"]);

    if (in_array($fileType, $allowedTypes)) {
      if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
      }

      $fileName = uniqid() . "-" . basename($file["name"]);
      $filePath = "img/" . $fileName;

      if (move_uploaded_file($file["tmp_name"], $uploadDir . $fileName)) {
        $stmt = $pdo->prepare("UPDATE usuarios SET profile_picture = ? WHERE id = ?");
        $stmt->execute([$filePath, $id]);
        $_SESSION['success_message'] = "Foto de perfil atualizado com sucesso!";
        header("Location: meu-perfil.php");
        exit();
      } else {
        $_SESSION['upload_error'] = "Erro ao mover o arquivo.";
      }
    } else {
      $_SESSION['upload_error'] = "Formato inválido. Use JPG, PNG, ou GIF.";
    }
  }
  header("Location: meu-perfil.php");
  exit();

  if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
    $imagem = 'img/' . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
  } else {
    $imagem = '';
  }
}

$profilePicture = !empty($usuarios['profile_picture']) ? $usuarios['profile_picture'] : "img/default.png";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <nav class="nav-bar">
    <a href="meu-perfil.php">
      <img src="<?php echo $imagem["imagem"]; ?>" alt="Foto do perfi">
      <label for="file-upload">
        <i class="fas fa-camera"></i>
      </label>
      <form method="POST" enctype="multipart/form-data" style="display: none;">
        <input id="file-upload" type="file" name="profile_picture" onchange="this.form.submit()">
      </form>
    </a>
    <div class="name-usuario">
      <h1><?php
          if (empty($_SESSION['nome_usuario'])) {
          } else {
            echo $_SESSION['nome_usuario'];
          }
          ?></h1>
    </div>
    <div class="buttons-index">
      <?php if (isset($_SESSION['id_usuario'])) {
      } else {
        echo "<a href='teste-de-personalidade.html'><button class='buttons'><strong>Teste de Personalidade</strong></button></a>";
        echo "<a href='oque-quero-ser.html'><button class='buttons'><strong>Veja Sobre Mim</strong></button></a> ";
        echo "<a href='view\login.php'><button class='buttons'><strong>Sair</strong></button></a>";
      } ?>
    </div>

  </nav>
  <div class="texto">
    <p>
      <samp>Por que um Projeto de Vida é Importante ?</samp>
      <br><br>
      Ter um projeto de vida é importante porque nos ajuda a saber o que queremos para o nosso futuro. Ele serve como um plano, mostrando nossos sonhos, objetivos e os caminhos que precisamos seguir para alcançá-los.
      <br>
      Com um projeto de vida, conseguimos tomar decisões melhores, mais alinhadas com aquilo que realmente importa para nós. Isso evita que a gente viva apenas no “automático”, sem saber para onde está indo.
      <br>
      Além disso, quando temos metas claras, nos sentimos mais motivados e preparados para enfrentar os desafios. Mesmo quando as coisas não saem como o esperado, um projeto de vida nos dá forças para continuar, porque temos um propósito.
      <br>
      Vale lembrar que esse projeto pode mudar com o tempo. À medida que a gente cresce, aprende e muda, nossos planos também podem mudar — e tudo bem! O importante é sempre refletir sobre o que queremos e buscar uma vida com mais sentido.
    </p>
  </div>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Projeto de Vida</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f4f8;
      }

      header {
        background-color: #AB3232;
        color: white;
        padding: 20px;
        text-align: center;
      }

      .container {
        max-width: 900px;
        margin: 30px auto;
        background-color: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h2 {
        color: #333;
        margin-bottom: 10px;
      }

      .perfil-section {
        margin-bottom: 30px;
      }

      .perfil-section p {

        color: #555;
        line-height: 1.6;

      }

      .footer {
        text-align: center;
        padding: 20px;
        background-color: #AB3232;
        color: white;
        margin-top: 40px;
      }
    </style>
  </head>

  <body>
    <header>
      <h1>Especificações de um Projeto de Vida</h1>
    </header>

    <div class="container">
      <div class="perfil-section">
        <h2>Missão de Vida (Propósito)</h2>
        <p>Define por que você existe e o que te motiva.
          É o ponto central que orienta todas as escolhas.</p>
      </div>

      <div class="perfil-section">
        <h2>Valores Pessoais</h2>
        <p>São os princípios que guiam seu comportamento e decisões.
          Ex.: honestidade, respeito, responsabilidade.</p>
      </div>

      <div class="perfil-section">
        <h2>Objetivos (Curto, Médio e Longo Prazo)</h2>
        <p>Metas claras que você deseja alcançar.
          Dividi-las por prazos ajuda a organizar o caminho.</p>
      </div>

      <div class="perfil-section">
        <h2>Plano de Ação</h2>
        <p>Planejo seguir uma rotina de estudos, buscar oportunidades de estágio, desenvolver projetos pessoais e manter o foco nas metas traçadas. Estarei sempre aberto(a) ao aprendizado e ao crescimento.</p>
      </div>
    </div>

    <div class="footer">
      <p>&copy; 2025 Meu Projeto de Vida</p>
    </div>

  </body>

  </html>
</body>

</html>