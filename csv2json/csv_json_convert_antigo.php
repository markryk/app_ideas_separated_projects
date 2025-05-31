<!DOCTYPE html>
<html>
<head>
	<!--Css p/ Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title> Conversor CSV-JSON </title>
</head>
<body>

    <div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="jumbotron" style="background-color: #54E80C;">
					<ul class="nav nav-pills justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link btn btn-outline-dark" href="index.html"> Início </a>
					  </li>
					</ul>

                    <h2> Conversor CSV p/ JSON </h2>
                    <p class="lead"> Entre com um CSV e ele será convertido para JSON </p>
                    <hr class="my-4">

                    <div class="mb-3">
                        <label for="textarea"> Resultado </label>
                        <textarea class="form-control mb-3" name="csv_text_area" id="textarea" rows="10">
                            <?php
                                $csv_text = $_POST['csv_text_area'];
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

                                $json = "[";
                                foreach ($json_values_array as $value) {
                                    $array_result = array_combine($json_index_array, $value);
                                    //associou a primeira linha (que virou array), com os demais arrays (agora independentes)
                                    //a primeira linha se tornou o índice e os demais arrays, os valores
                                    //print_r($array_result);
                                    //echo json_encode($array_result);
                                    $json .= json_encode($array_result).",\r";
                                    //inseridos uma vírgula e uma quebra de linha ao fim de cada json
                                }
                                
                                //removidos os \" do json resultante
                                $json = str_replace("\\\"", "", $json);

                                //removidos os \r do json resultante
                                $json = str_replace("\\r", "", $json);

                                //removidas a última vírgula e quebra de linha
                                $json = substr($json, 0, -2);
                                
                                $json .= "]";
                                echo $json;
                            ?>
                        </textarea>
                    </div>

                    <a href="https://github.com/markryk" class="MarkRyk" target="_blank"> MarkRyk </a>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

    <!-- JS p/ Bootstrap (os 3, nessa ordem; esse trecho deve vir antes de quaisquer outros scripts)-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>