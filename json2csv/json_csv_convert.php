<?php
    function is_valid_json($json_txt) {
        $csv = json_decode($json_txt, true);
        if (is_null($csv)) return false; //echo "Não é um JSON válido!";
        return true;
    }

    function json_csv_conversor($json_text) {
        $csv = json_decode($json_text, true);

        //Captura os indexes da primeira linha (chaves) e coloca em um array
        $indexes = array();
        $csv_text = "";
        foreach ($csv[0] as $key => $value) {
            $csv_text .= $key.",";
            array_push($indexes, $key);
        }
        $csv_text = substr($csv_text, 0, -1);
        $csv_text .= "\r";

        //Captura os valores (values) do JSON e coloca no mesmo array
        $rows = array();
        for ($i=1; $i<count($csv); $i++) {
            foreach ($csv[$i] as $key => $value) {
                $csv_text .= $value.",";
                array_push($rows, $value);
            }
            //remove a última vírgula e pula uma linha ao final de cada iteração
            $csv_text = substr($csv_text, 0, -1);
            $csv_text .= "\r";
        }

        echo $csv_text;
    }

    function ler_arquivo_json() {
        $nomeTemporario = $_FILES['json_file']['tmp_name'];
        $nomeOriginal = $_FILES['json_file']['name'];
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

        if ($extensao != "json") {
            echo "Arquivo não é JSON!";
        } else {

            // Lê o conteúdo do arquivo
            $conteudo = file_get_contents($nomeTemporario);
            echo $conteudo;
        }
    }
?>