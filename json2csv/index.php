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
					    <a class="nav-link btn btn-outline-dark" href="../"> Início </a>
					  </li>
					</ul>

                    <h2> Conversor JSON p/ CSV </h2>
                    <p class="lead"> Entre com um JSON e ele será convertido para CSV </p>
                    <hr class="my-4">

					<div class="row">
						<!-- Área esquerda com 3 colunas -->
						<div class="col-6">
							<div class="row">
								<div class="col p-3">
									<form action="#" method="post">
										<div class="card">
											<label for="textarea" class="card-header"> Entre com o JSON aqui </label>
											<div class="card-body">
												<textarea class="form-control mb-3" name="json_text_area" id="textarea" rows="10" required></textarea>
												<input class="btn btn-primary btn-lg" type="submit" value="Converter p/ CSV">
											</div>
										</div>
									</form>
								</div>
							</div>
							<hr>

							<div class="p-2" style="background-color: gray;">
								<div class="row">
									<div class="col p-3">
										<form action="#" method="post" enctype="multipart/form-data">
											<div class="card">
												<label for="jsonfile" class="card-header"> Ou faça upload de um arquivo JSON </label>
												<div class="card-body">
													<input type="file" class="form-control" name="json_file" id="jsonfile">
													<br>
													<input class="btn btn-success btn-lg" type="submit" value="Abrir JSON">
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="row">
									<div class="col p-3">
										<form action="#" method="post">
											<div class="card">
												<label for="textarea" class="card-header"> Resultado do upload </label>

												<div class="card-body">
													<textarea class="form-control mb-3" name="json_result" id="textarea" rows="10">
														<?php
															if (isset($_FILES['json_file'])) {
																//ler_arquivo_csv();
															}
														?>
													</textarea>
													<input class="btn btn-success btn-lg" type="submit" value="Converter p/ CSV">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<!-- Área direita com 1 coluna -->
						<div class="col-6 p-3">
							<div class="card">
								<label for="textarea" class="card-header"> CSV resultante </label>

								<form action="#" method="post">
									<div class="card-body">
										<textarea class="form-control mb-3" name="csv_result" id="csvresult" rows="40" readonly>
											<?php
												if (isset($_POST['json_text_area']) && !empty($_POST['json_text_area'])) {
													json_csv_conversor($_POST['json_text_area']);
												}									

												/*if (isset($_POST['json_text_area']) && !empty($_POST['json_text_area'])) {
													if (!is_csv($_POST['json_text_area'])) echo "Texto não é JSON!";
													else json_csv_conversor($_POST['json_text_area']);
												}

												if (isset($_POST['json_result']) && !empty($_POST['json_result'])) {
													if (!is_json($_POST['json_result'])) echo "Texto não é JSON!";
													else json_csv_conversor($_POST['json_result']);
												}*/
											?>
										</textarea>
										<input type="submit" class="btn btn-dark btn-lg" value="Salvar">
										<!--<a class="btn btn-dark" href="save.php" role="button"> Salvar </a>-->

										<!--<form action="">-->
										<div>
											<?php
												/*if (isset($_POST['csv_result']) && !empty($_POST['csv_result'])) {
													save_csv($_POST['csv_result']);
												}*/
											?>
										</div>
										<!--</form>-->
									</div>
								</form>
							</div>
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



<!--<!DOCTYPE html>
<html>
<head>
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
					    <a class="nav-link btn btn-outline-dark" href="../"> Início </a>
					  </li>
					</ul>

                    <h2> Conversor JSON p/ CSV </h2>
                    <p class="lead"> Entre com um JSON e ele será convertido para CSV </p>
                    <hr class="my-4">

					<div class="row">
						<div class="col">
							<form action="#" method="post">
							
								

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

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>-->