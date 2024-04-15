<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifer</title>
  <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><BR>
	<DIV class="container-fluid">
		<DIV class="row">
			<DIV class="col-md-6 offset-md-3">
				<DIV class="card">
					<FORM method="post" action="actModifier.php">
						<DIV class="card-header"><SPAN class="badge bg-primary">Modifier</SPAN></DIV>
						<DIV class="card-body">
							<DIV class="row">
								<DIV class="col-md-10 offset-md-1">
									<DIV class="row">
										<LABEL class="col-sm-2 col-form-label" for="input-sujet">Titre</LABEL>
										<INPUT type="text" name="id" value="<?= $_POST['modifId'] ?>" hidden="">
										<DIV class="col-sm-10">
											<INPUT type="text" class="form-control" id="imput-sujet" value="<?= $_POST['modifTitre'] ?>" name="titre" required>
										</DIV>
									</DIV><BR>
									<DIV class="row">
										<LABEL class="col-sm-2 col-form-label" for="input-corps">Corps</LABEL>
										<DIV class="col-sm-10">
											<TEXTAREA  class="form-control" id="imput-corps" name="corps" required> <?= $_POST['modifCorps'] ?></TEXTAREA>
										</DIV>
									</DIV>
								</DIV>
							</DIV>
						</DIV>
						<DIV class="card-footer d-flex flex-row-reverse">
							<A href="index.php"><DIV class="btn btn-secondary">retour</DIV></A>&nbsp;&nbsp;
							<INPUT class="btn btn-secondary" type="submit" value="modifier">
						</DIV>
					</FORM>
				</DIV>
			</DIV>
		</DIV>
	</DIV>
<STYLE>
		textarea{
			height: 200px;
		}
</STYLE>
</body>
</html>
