<?php
    function csv_json_conversor($csv_text) {
        //$csv_text = $_POST['csv_text_area'];
        //recebeu o texto (string) via POST
        
        $array_text = explode("\n", $csv_text);
        //transformou o texto em array, onde cada linha virou um array
        //print_r($array_text);                                

        $json_index = array_shift($array_text);
        //retirou o primeiro array e transformou em texto (string)
        //$array_text ficou sendo o restante dos arrays, sem a primeira linha
        //echo $json_index."\n";
        //Saida: "Text1","Text2","Text3","Text4","Text5"

        $json_index_array = explode(",", $json_index);
        //transformou o texto (primeira linha) em array
        /*print_r($json_index_array);
        echo "\n";*/
        //Array([0] => "Text1" [1] => "Text2" ... [5] => "Text5")

        /*print_r($array_text);
        echo "\n";*/
        /*Array(
        [0] => "silent","nearby","pure","am","middle"
        [1] => "worry","beginning","worker","life","recall"
        ...
        [N] => ...)*/                                

        for ($i=0; $i < count($array_text); $i++) { 
            $json_values_array[$i] = explode(",", $array_text[$i]);
            //cada linha (array) virou um array independente
            /*print_r($json_values_array[$i]);
            echo "\n";*/
        }

        $json_text = "[";
        foreach ($json_values_array as $value) {
            $array_result = array_combine($json_index_array, $value);
            //associou a primeira linha (que virou array), com os demais arrays (agora independentes)
            //a primeira linha se tornou o índice e os demais arrays, os valores
            //print_r($array_result);
            //echo json_encode($array_result);
            
            $json_text .= json_encode($array_result).",\r";
            //inseridos uma vírgula e uma quebra de linha ao fim de cada json
        }
        
        //removidos os \" do json resultante
        $json_text = str_replace("\\\"", "", $json_text);

        //removidos os \r do json resultante
        $json_text = str_replace("\\r", "", $json_text);

        //removidas a última vírgula e quebra de linha
        $json_text = substr($json_text, 0, -2);
        
        $json_text .= "]";
        echo $json_text;
    }
?>