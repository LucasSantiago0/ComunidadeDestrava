<?php
// salvar.php

// Dados do formulario
$nome    = $_POST['nome']    ?? '';
$cpf     = $_POST['cpf']     ?? '';
$email   = $_POST['email']   ?? '';
$celular = $_POST['celular'] ?? '';

// Conecta no MySQL
$host = '10.129.76.12';
$db   = 'usuarios_formulario';
$user = 'user_lala';
$pass = 'userlala2518.';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die('Erro na conexão com o banco: ' . $conn->connect_error);
}

// Insere no banco
$stmt = $conn->prepare("INSERT INTO sua_tabela (nome, cpf, email, celular) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $cpf, $email, $celular);
$stmt->execute();

$stmt->close();
$conn->close();

// Redireciona para a página com o botão do Mercado Pago
echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head><meta charset='UTF-8'><title>Pagamento</title></head>
<body style='text-align:center;padding-top:80px;'>
<h2>Quase lá, $nome!</h2>
<p>Clique abaixo para concluir seu pagamento e garantir sua vaga:</p>
<div id='mp-button'>
<script src='https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js'
        data-preference-id='195013619-de66a2be-85d5-4e29-944a-2ac37f27f490'
        data-source='button'>
</script>
</div>
</body>
</html>";
?>
