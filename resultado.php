<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Resultado do Teste</title>
  <link rel="stylesheet" href="personalidade.css">
</head>
<body>
  <div class="container">
    <h1>Resultado do Teste de Personalidade</h1>

    <?php
    $respostas = [
      $_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'],
      $_POST['q6'], $_POST['q7'], $_POST['q8'], $_POST['q9'], $_POST['q10']
    ];

    $contagem = [
      "analitico" => 0,
      "criativo" => 0,
      "pratico" => 0,
      "sociavel" => 0
    ];

    foreach ($respostas as $resposta) {
      if (isset($contagem[$resposta])) {
        $contagem[$resposta]++;
      }
    }

    // Descobre qual personalidade teve mais respostas
    $personalidade = array_search(max($contagem), $contagem);

    // Mensagens personalizadas
    $mensagens = [
      "analitico" => "Você é uma pessoa **analítica**. Gosta de pensar, planejar e entender profundamente as situações antes de agir.",
      "criativo" => "Você é uma pessoa **criativa**. Tem uma mente aberta, cheia de ideias e soluções fora do comum.",
      "pratico" => "Você é uma pessoa **prática**. Foca em resultados e prefere agir do que ficar apenas na teoria.",
      "sociavel" => "Você é uma pessoa **sociável**. Valoriza conexões, trabalha bem em grupo e é ótimo(a) com pessoas."
    ];

    echo "<p>" . $mensagens[$personalidade] . "</p>";
    ?>

    <a href="teste-de-personalidade.html"><button>Refazer Teste</button></a>
    <br>
    <a href="index2.php"><button>Voltar</button></a>
  </div>
</body>
</html>
