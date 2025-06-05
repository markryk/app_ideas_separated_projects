<?php
    function is_csv($csv_text) {
        //Essa função diz se o texto inserido é um CSV válido;
        //se for válido retorna true, do contrário, retorna false
        $return_is_csv = true;

        /*1*/ $array_text = explode("\n", $csv_text);
        //transforma o texto em array, onde cada linha vira um array
        //print_r($array_text);

        /*2*/ $json_index = array_shift($array_text);
        //retira a primeira linha e transforma em texto (string)
        //$array_text fica sendo o restante dos arrays, sem a primeira linha
        //echo "Primeiro array transformado em texto: ".$json_index."\n\n";
        //Saida: "Text1","Text2","Text3","Text4","Text5"

        /*3*/ $json_index_array = explode(",", $json_index);
        //transforma o texto (primeira linha) em array
        /*echo "Texto da primeira linha transformado em array: ";
        print_r($json_index_array);
        echo "\nTotal de campos: ".count($json_index_array)."\n";*/
        //Array([0] => "Text1" [1] => "Text2" ... [5] => "Text5")

        /*print_r($array_text);
        echo "\n";*/
        /*Array(
        [0] => "silent","nearby","pure","am","middle"
        [1] => "worry","beginning","worker","life","recall"
        ...
        [N] => ...)*/

        /*4*/ for ($i=0; $i < count($array_text); $i++) {
            $json_values_array[$i] = explode(",", $array_text[$i]);
            //if (is_null($json_values_array[$i])) $return_is_csv = false;
            //cada linha (array, exceto a primeira) vira um array independente
            //print_r($json_values_array[$i]);
            //echo "\n";
            //echo "Total de campos: ".count($json_values_array[$i])."\n\n";
            if (count($json_values_array[$i]) != count($json_index_array)) {
                //echo "Saiu após o ".($i+1)." teste! \n";
                $return_is_csv = false;
                break;
            }
        }

        if (!isset($json_values_array)) $return_is_csv = false;

        return $return_is_csv;
    }

    function csv_json_conversor($csv_text) {
        /*1*/ $array_text = explode("\n", $csv_text);

        /*2*/ $json_index = array_shift($array_text);

        /*3*/ $json_index_array = explode(",", $json_index);

        /*4*/ for ($i=0; $i < count($array_text); $i++) { 
            $json_values_array[$i] = explode(",", $array_text[$i]);
        }
        
        /*5*/ $json_text = "[";
        foreach ($json_values_array as $value) {
            $array_result = array_combine($json_index_array, $value);
            //associa a primeira linha (que virou array), com as demais linhas (agora arrays e independentes)
            //a primeira linha se torna as chaves do JSON e os demais arrays, os valores
            //print_r($array_result);
            //echo json_encode($array_result);
            
            $json_text .= json_encode($array_result).",\r";
            //insere uma vírgula e uma quebra de linha ao fim de cada JSON
        }
        
        //remove os \" do json resultante
        $json_text = str_replace("\\\"", "", $json_text);

        //remove os \r do json resultante
        $json_text = str_replace("\\r", "", $json_text);

        //remove os \t do json resultante (se houver)
        $json_text = str_replace("\\t", "", $json_text);

        //remove a última vírgula e a última quebra de linha
        $json_text = substr($json_text, 0, -2);
        
        $json_text .= "]";
        echo $json_text;
        //$conteudo = str_replace("\r\n", "", $json_text);
        //echo $conteudo;
    }

    function ler_arquivo_csv() {
        $nomeTemporario = $_FILES['csv_file']['tmp_name'];
        $nomeOriginal = $_FILES['csv_file']['name'];
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

        if ($extensao != "csv") {
            echo "Arquivo não é CSV!";
        } else {

            // Lê o conteúdo do arquivo
            $conteudo = file_get_contents($nomeTemporario);
            echo $conteudo;
        }
    }

    function save_json($json_text) {
        // Gera o arquivo CSV
        $csvFile = fopen("json_file.json", "w");

        $conteudo = $json_text;
        file_put_contents('json_file.json', $conteudo);

        fclose($csvFile);

        echo "<p> Arquivo gerado com sucesso! <a href='json_file.json' download> Clique aqui para baixar </a></p>";
    }
?>