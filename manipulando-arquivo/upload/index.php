
<!--obrigatório para upload de arquivo   enctype="multipart/form-data" -->
<form method="POST" enctype="multipart/form-data">

    <input type="file" name="fileUpload">

    <button type="submit">Send</button>

</form>

<?php
        //guarda o tipo solicitado (get, post...)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

                //array super-global
        $file = $_FILES["fileUpload"]; //'fileUpload' = 'name' do input

        if ($file["error"]) { //Tratando erro no envio do arquivo

            throw new Excaption("Error: ".$file["error"]);

        }

        $dirUploads = "uploads"; //Dir. para armazqnar os arquivos 

        if (!is_dir($dirUploads)) { 

            mkdir($dirUploads); //criando o Dir. para armazqnar os arquivos--
                                //--se este ñ existir

        }

        //Enviando o arquivo temp. gerado no processo de upload do arquivo--
        //--para o dir. criado (upload)
        if (move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])) {

            echo "Upload realizado com sucesso!";

        } else {
            //tratamdo o erro caso o upload ñ ocorra
            throw new Exception("Não foi possível reaizar o upload.");

        }

    }

?>