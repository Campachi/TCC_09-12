<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars(trim($_POST['nome'])); // Nome do usuário
    $email = htmlspecialchars(trim($_POST['email'])); // E-mail do usuário
    $mensagem = htmlspecialchars(trim($_POST['mensagem'])); // Mensagem do usuário

    // Valida o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit; // Encerra o script se o e-mail não for válido
    }

    // Define o destinatário e o assunto do e-mail
    $destinatario = "financasfacilofc@gmail.com"; // Substitua pelo seu e-mail
    $assunto = "Novo contato de $nome";

    // Monta o corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Define os cabeçalhos do e-mail
    $cabecalhos = "From: $nome <$email>\r\n";
    $cabecalhos .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($destinatario, $assunto, $corpo, $cabecalhos)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
    }
} else {
    // Se o formulário não foi enviado, redireciona para a página inicial
    header("Location: pagina_inicial.html");
    exit;
}
?>