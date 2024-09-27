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
  $mensagem = "";
  $sucesso = "Cadastro concluído com sucesso!";

  if (empty($nome) || str_word_count($nome) < 2) {
    $erro = true;
    $mensagem .= "O nome deve conter pelo menos dois nomes.\\n";
  }

  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro = true;
    $mensagem .= "O campo 'E-mail' é obrigatório.\\n";
  }
  
  if (empty($nascimento)) {
    $erro = true;
    $mensagem .= "O campo 'Data de Nascimento' é obrigatório.\\n";
  }

  if (empty($genero)) {
    $erro = true;
    $mensagem .= "O campo 'Gênero' é obrigatório.\\n";
  }

  if (empty($biografia)) {
    $erro = true;
    $mensagem .= "O campo 'Biografia' é obrigatório.\\n";
  }

  if ($erro) {
    echo "<script>alert('$mensagem')</script>";
  } else {
    echo "<script>alert('$sucesso')</script>";
  }
}
?>

</body>
</html>