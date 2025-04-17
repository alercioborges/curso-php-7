<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parameter Tempering</title>
</head>
<body>

    <?php
    
    $techs = [
        "jaca" => "Java",
        "php" => "PHP",
        "ruby" => "Ruby"    ];

    ?>
    <form action="#" method="POST">
    <select name="techs" id="techs">

    <?php foreach ($techs as $key => $value) : ?>
        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
    <?php endforeach ?>
    
        
    </select>
    <br>
    <input type="submit" value="enviar">
    </form>

    <?php

    if (!array_key_exists($_POST['techs'], $techs)) {
         echo "Opção invalilida";
        }

        echo "<br>";

    if (isset($_POST)) {
        print_r($_POST);
    }
    ?>
    
</body>
</html>