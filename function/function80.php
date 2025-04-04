//Funções com parâmetros nomeados
/*
-- Em PHP (a partir da versão 8.0) permitem passar argumentos especificando o nome do parâmetro, sem precisar seguir a ordem definida na função.  

**Como funciona?**  
- Você pode chamar a função passando os argumentos na ordem que quiser.  
- Torna o código mais legível e flexível.  
- Útil para funções com muitos parâmetros, especialmente os opcionais.  

**Para que serve?**  
- Melhor organização e legibilidade do código.  
- Evita erros ao passar valores na ordem errada.  
- Facilita o uso de valores padrão em funções complexas.
*/

function criarUsuario(string $nome, int $idade, string $email = "sem email") {
    return "Nome: $nome, Idade: $idade, Email: $email";
}

// Chamando com parâmetros nomeados
echo criarUsuario(idade: 30, nome: "Carlos", email: "carlos@email.com");

// Também funciona sem passar todos os parâmetros
echo criarUsuario(nome: "Ana", idade: 25);

______________________________________________________________

