//Sanitização em PHP 8.3
/*
A sanitização no PHP é o processo de limpeza e validação de dados de entrada para prevenir vulnerabilidades como injeção SQL, XSS (Cross-Site Scripting) e outros tipos de ataques. Na versão 8.3 do PHP, foram mantidas e aprimoradas várias funções para sanitização de dados.

## Como funciona

O PHP oferece funções nativas que removem ou escapam caracteres potencialmente perigosos, dependendo do contexto em que os dados serão utilizados.

## Para que serve

Serve para garantir que os dados de entrada (de formulários, APIs, etc.) sejam seguros antes de:
- Armazenar em banco de dados
- Exibir no navegador
- Processar em operações do sistema

No PHP 8.3, recomenda-se usar os filtros apropriados para cada tipo de dado e combinar com práticas como prepared statements para consultas SQL e validação adequada de entradas.
*/

// Sanitizando entrada para HTML
$nome = htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES);

// Filtros para sanitização
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$url = filter_var($_POST['website'], FILTER_SANITIZE_URL);

// Sanitizando números
$idade = filter_var($_POST['idade'], FILTER_SANITIZE_NUMBER_INT);

// Validação e sanitização combinadas
$email_valido = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email_valido) {
    echo "Email válido: $email_valido";
}

// Uso do filter_input para sanitização direta
$comentario = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_SPECIAL_CHARS);