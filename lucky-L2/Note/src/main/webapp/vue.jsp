<%@ page import="note.Note" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vue</title>
  <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><BR>
	<DIV class="container-fluid">
		<DIV class="row">
			<DIV class="col-md-6 offset-md-3">
				<DIV class="card">
					<DIV class="card-header"><SPAN class="badge bg-primary">Titre</SPAN> ${ note.titre }</DIV>
					<DIV class="card-body">
						<DIV><SPAN class="badge bg-primary">Corps</SPAN></DIV><BR>
						<DIV><PRE>${ note.corps }</PRE></DIV>
					</DIV>
					<DIV class="card-footer d-flex flex-row-reverse">
						<A href="index.jsp"><BUTTON class="btn btn-secondary">Retour</BUTTON></A>
					</DIV>
				</DIV>
			</DIV>
		</DIV>
	</DIV>
</body>
</html>