<?php include_once 'json_csv_convert.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<!--Css p/ Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title> Conversor JSON-CSV </title>
</head>
<body>

    <div class="container">
		<div class="row">
			<div class="col">
				<div class="jumbotron" style="background-color: #54E80C;">
					<ul class="nav nav-pills justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link btn btn-outline-dark" href="../index.php"> Início </a>
					  </li>
					</ul>

                    <h2> Conversor JSON p/ CSV </h2>
                    <p class="lead"> Entre com um JSON e ele será convertido para CSV </p>
                    <hr class="my-4">

					<div class="row">
						<div class="col">
							<form action="#" method="post">
							<!--<form action="#" method="POST">-->
								<!--<input type="hidden" value="convert" name="action">-->

								<div class="">
									<label for="textarea"> Entre com o JSON aqui </label>
									<textarea class="form-control mb-3" name="json_text_area" id="textarea" rows="10" required></textarea>
									
									<input class="btn btn-primary btn-lg" type="submit" value="Converter">
								</div>
							</form>
						</div>

						<div class="col">
							<label for="textarea"> Resultado </label>
							<textarea class="form-control" name="json_text_area" id="textarea" rows="10">
								<?php
									if (isset($_POST['json_text_area']) && !empty($_POST['json_text_area'])) {
										json_csv_conversor($_POST['json_text_area']);
									}									
								?>
							</textarea>
						</div>
					</div>

                    <a href="https://github.com/markryk" class="MarkRyk" target="_blank"> MarkRyk </a>
				</div>
			</div>
		</div>
	</div>

    <!-- JS p/ Bootstrap (os 3, nessa ordem; esse trecho deve vir antes de quaisquer outros scripts)-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>