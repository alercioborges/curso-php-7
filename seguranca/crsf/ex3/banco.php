<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="http://127.0.0.1/curso-php/modulo3/formularios/csrf/transferir.php" method="GET">
        <label for="conta_destino">Conta Destino:</label>
        <input type="text" name="conta_destino" id="conta_destino" value="12345">
        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" value="1000">
        <button type="submit">Transferir</button>
    </form>
</body>

</html>