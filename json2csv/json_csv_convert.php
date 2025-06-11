<?php
    function json_csv_conversor($json_text) {
        $csv = json_decode($json_text, true);
        /*echo count($csv);
        echo "\n";*/

        //Captura os indexes da primeira linha (chaves) e coloca em um array
        $indexes = array();
        $csv_text = "";
        foreach ($csv[0] as $key => $value) {
            $csv_text .= $key.",";
            //echo $key.",";
            array_push($indexes, $key);
        }
        $csv_text = substr($csv_text, 0, -1);
        $csv_text .= "\r";
        //echo "\r";
        //echo "\n";

        $rows = array();
        //$csv_text = "";
        for ($i=1; $i<count($csv); $i++) {
            foreach ($csv[$i] as $key => $value) {
                $csv_text .= $value.",";
                array_push($rows, $value);
                //echo $row_text;
                //$row_text = substr($row_text, 0, -1);
            }
            $csv_text = substr($csv_text, 0, -1);
            $csv_text .= "\r";
            //echo "\r";
        }
        echo "\n";

        echo $csv_text;
        echo "\n";

        //print_r($rows);
        //echo "\n";

        /*for ($i=1; $i<count($csv); $i++) {
            foreach ($csv[$i] as $key => $value) {
                echo $key.",";
                //echo "Igual";*/
                /*if ($csv[$i] != $csv[0]) {
                    echo "Diferente";
                    break;
                }*/
            /*}
            echo "\n";
        }*/

        //Esse trecho agrupa todos os indexes
        /*for ($i=0; $i<count($csv); $i++) {
            foreach ($csv[$i] as $key => $value) {
                echo $key.",";
            }
        }*/
    }
?>