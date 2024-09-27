<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="form-container">
    <h2>Cadastro</h2>
    <form action="index.php" method="POST">
      <label for="nome">Nome Completo:</label>
      <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required >

      <label for="nascimento">Data de Nascimento:</label>
      <input type="date" id="nascimento" name="nascimento" required>

      <label for="genero">Gênero:</label>
      <select id="genero" name="genero" required>
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
        <option value="outros">Outros</option>
      </select>

      <label for="biografia">Biografia:</label>
      <textarea id="biografia" name="biografia" rows="4" required></textarea>

      <button type="submit" name="enviar">Enviar</button>
    </form>
  </div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);
  $nascimento = trim($_POST['nascimento']);
  $genero = trim($_POST['genero']);
  $biografia = trim($_POST['biografia']);

  $erro = false;
  $mensagemErro = "";
  $sucesso = "Formulário enviado com sucesso!";

  if (empty($nome) || str_word_count($nome) < 2) {
    $erro = true;
    $mensagemErro .= "Insira ao menos dois nomes!\\n";
  }

  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro = true;
    $mensagemErro .= "Email inválido.\\n";
  }
  
  if (empty($nascimento)) {
    $erro = true;
    $mensagemErro .= "Insira a data de nascimento.\\n";
  }

  if (empty($genero)) {
    $erro = true;
    $mensagemErro .= "Insira seu gênero.\\n";
  }

  if (empty($biografia)) {
    $erro = true;
    $mensagemErro .= "Insira a biografia.\\n";
  }

  if ($erro) {
    echo "<script>alert('$mensagemErro')</script>";
  } else {
    echo "<script>alert('$sucesso')</script>";
  }
}
?>

</body>
</html>