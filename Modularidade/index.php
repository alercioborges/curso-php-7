/*
A principal diferença entre `include` e `require` no PHP é o comportamento em caso de erro:  

- **`include`**: Exibe um *warning* e continua a execução do script.  
- **`require`**: Exibe um *fatal error* e interrompe a execução do script.  

### Exemplo com `include`:
```php
include 'arquivo.php';
echo "Continua executando...";
```
Se `arquivo.php` não existir, a mensagem ainda será exibida.

### Exemplo com `require`:
```php
require 'arquivo.php';
echo "Isso nunca será exibido se o arquivo não existir.";
```
Se `arquivo.php` não for encontrado, o script será interrompido.
*/

