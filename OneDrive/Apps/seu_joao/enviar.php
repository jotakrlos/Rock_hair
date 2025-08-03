<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar os dados
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    // Validar campos obrigatórios
    if (empty($nome) || empty($email) || empty($mensagem)) {
        die("Por favor, preencha todos os campos.");
    }

    // Validar formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido.");
    }

    // Dados do e-mail
    $para = "laisramona14@gmail.com";  // Substitua pelo seu e-mail
    $assunto = "Mensagem de $nome via site";
    $conteudo = "Nome: $nome\n";
    $conteudo .= "E-mail: $email\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";

    $headers = "From: no-reply@seudominio.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar e-mail
    if (mail($para, $assunto, $conteudo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar. Tente novamente mais tarde.";
    }
}
?>