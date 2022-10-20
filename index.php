<?php
	require_once('Users.php');
	$user = new Users;
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css">
	<script src="script.js"></script>
</head>

<body>
	<div class="container">
		<form method="post">
			<div>
				<label for="name">Nome completo:</label>
				<input type="text" id="name" name="name">
			</div>
			<div>
				<label for="userName">Nome de login:</label>
				<input type="text" id="userName" name="userName">
			</div>
			<div>
				<label for="zipCode">CEP:</label>
				<input type="text" id="zipCode" name="zipCode">
			</div>
			<div>
				<label for="email">Email:</label>
				<input type="text" id="email" name="email">
			</div>
			<div>
				<label for="password">Senha: (8 caracteres mínimo, contendo pelo menos 1 letra
					e 1 número)</label>
				<input type="password" id="password" name="password">
			</div>
			<input type="submit" value="Cadastrar">
		</form>
		<?php
		if ($_POST) {
			$result = $user->insert($_POST);
			
			if ($result) {
				echo '<div class="alert alert-success center">Usuário cadastrado com sucesso.</div>';
			}else{
				echo '<div class="alert alert-danger center">E-mail já registrado.</div>';
			}
		}
		?>
	</div>
</body>
<script>
	var labelPassword = $("label[for=password]").text().split(':').slice(0)[0]
	$("label[for=password]").text(labelPassword)
</script>