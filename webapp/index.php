<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>accueil</title>
  <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><BR>
	<DIV class="container-fluid">
		<DIV class="row">
			<DIV class="col-md-8 offset-md-2">
				<DIV class="card">
					<DIV class="card-header">
						<UL class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
							<LI class="nav-item" role="presentation">
					        	<a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
					      	</LI>
					    	<LI class="nav-item" role="presentation">
					        	<a class="nav-link" id="ajouter-tab" data-bs-toggle="tab" href="#nouveauSondage" role="tab" aria-controls="nouveauSondage" aria-selected="false">Ajouter</a>
					      	</LI>
					      </UL>
					</DIV>
					<DIV class="card-body">
						<DIV class="tab-content" id="contenu">
							<DIV class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<TABLE class="table">
									<THEAD>
										<TR>
											<TH scope="col">#</TH>
											<TH scope="col">Titre</TH>
											<TH scope="col">Action</TH>
										</TR>
									</THEAD>
									<TBODY>
										<?php
											include('dbinfo.php');
											
											try{
												$PDO = new PDO($DSN, $USER, $PASSWORD);
												$request = $PDO->query('SELECT id, titre, corps FROM liste');
												
												$id;
												$titre = "";
												$corps = "";
												$i = 0;
												
												while($data = $request->fetch(PDO::FETCH_ASSOC)){
													$id = $data['id'];
													$titre = $data['titre'];
													$corps = $data['corps'];
													$i++;
												
										?>
										<TR>
											<TH class="col-md-2" scope="row"><?= $i ?></TH>
											<TD class="col-md-5"><?=$titre  ?></TD>
											<TD class="col-md-5">
												<DIV class="row">
													<DIV class="col-md-3">
														<FORM method="post" action="supprimer.php">
															<INPUT type="text" name="supprId" value="<?= $id ?>" hidden>
															<INPUT class="btn btn-outline-danger" type="submit" value="supprimer">
														</FORM>
													</DIV>
													<DIV class="col-md-3 offset-md-1">
														<FORM method="post" action="modifier.php">
															<INPUT type="text" name="modifId" value="<?= $id ?>" hidden>
															<INPUT type="text" name="modifTitre" value="<?= $titre ?>" hidden>
															<INPUT type="text" name="modifCorps" value="<?= $corps ?>" hidden>
															<INPUT class="btn btn-outline-secondary" type="submit" value="modifier">
														</FORM>
													</DIV>
													<DIV class="col-md-3 offset-md-1">
														<FORM method="post" action="vue.php">
															<INPUT type="text" name="voirTitre" value="<?= $titre ?>" hidden>
															<INPUT type="text" name="voirCorps" value="<?= $corps ?>" hidden>
															<INPUT class="btn btn-outline-primary" type="submit" value="voir">
														</FORM>
													</DIV>
												</DIV>
											</TD>
										</TR>
										<?php
												}
											} catch (PDOException $pe){
												
												
										?>
											<TR>
												<TD>
													<DIV class="alert alert-danger" role="alert">
													  Erreur lors de la connexion à la base de données
													</DIV>
												</TD>
											</TR>
										<?php } ?>
									</TBODY>
								</TABLE>
							</DIV><BR>
							<DIV class="tab-pane fade" id="nouveauSondage" role="tabpanel" aria-labelledby="ajouter-tab">
								<FORM method="post" action="ajouter.php">
								<DIV class="row">
									<DIV class="col-md-10 offset-md-1">
										<DIV class="row">
											<LABEL class="col-sm-2 col-form-label" for="input-sujet">Titre</LABEL>
											<DIV class="col-sm-10">
												<INPUT type="text" class="form-control" id="imput-sujet" name="titre" maxlength="50" required>
											</DIV>
										</DIV><BR>
										<DIV class="row">
											<LABEL class="col-sm-2 col-form-label" for="input-corps">Corps</LABEL>
											<DIV class="col-sm-10">
												<TEXTAREA  class="form-control" id="imput-corps" name="corps" required></TEXTAREA>
											</DIV>
										</DIV><BR>
										<DIV class="row">
											<DIV class="d-flex flex-row-reverse">
												<INPUT class="btn btn-primary" type="submit" value="Enregistrer">
											</DIV>
										</DIV>
									</DIV>
								</DIV>
								</FORM>
							</DIV>
						</DIV>
					</DIV>
				</DIV>
			</DIV>
		</DIV>
	</DIV>
	<SCRIPT src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></SCRIPT>
	<STYLE>
		textarea{
			height: 200px;
		}
	</STYLE>
</body>
</html>
