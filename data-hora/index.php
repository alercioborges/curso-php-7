<?php

//Função nativas do PHP para data e hora
echo "Data e hora <br><br>";

//Exibindo a data
//O parametro desta função é o formato da data
echo "Função date <br>";
echo date("d/m/Y H:i:s"); //data atual do servidor
echo "<br>";
echo date("d/m/Y H:i:s", 1680784393); //data atual de um timestamp espec[ifico]
echo "<br><br>";

//Função time que exibe a data e hora em formato timestamp atual
echo "Função time <br>";
echo time();
echo "<br><br>";

//Função strtotime converte uma string para timestamp
echo "Função strtotime <br>";
echo strtotime("l, 1989-04-21"); //parametro string de data no formato americano
$dataniver = strtotime("1989-04-21"); 
echo "<br>";
echo date("l, d/m/Y", $dataniver);
echo "<br><br>";

echo "Opções da função strtotime <br>";
$now = strtotime("now"); echo date("d/m/Y H:i:s", $now)."<br>";
$cincodias = strtotime("+5 day"); echo date("d/m/Y H:i:s", $cincodias)."<br>";
$umasemana = strtotime("+1 week"); echo date("d/m/Y H:i:s", $umasemana)."<br>";
$ummes = strtotime("+1 month"); echo date("d/m/Y H:i:s", $ummes)."<br>";
$umano = strtotime("+1 year"); echo date("d/m/Y H:i:s", $umano)."<br>";
$proxquinta = strtotime("next Thursday"); echo date("d/m/Y H:i:s", $proxquinta)."<br>";
$ultsegunda = strtotime("last Monday"); echo date("d/m/Y H:i:s", $ultsegunda)."<br>";
$prazo = strtotime("+1 week 2 days 4 hours 2 seconds"); echo date("d/m/Y H:i:s", $prazo)."<br><br>";

//Função 'setlocale'
echo "Função setlocale <br>";

//Definindo o idioma de ixibição dos textos de data--
//--para porrtugues no Linux e no windows
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");

echo strftime("%A - %B - %C"); //Exibindo as informações das datas 

?>