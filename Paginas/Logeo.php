<?php
if (session_status() == PHP_SESSION_NONE)
	session_start();
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['rol'] == 'admin') {
		header('Location: ../Admin.php');
	} else {
		header('Location: ../index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" href="../Recursos/CSS/EstilosLogin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
	
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form id="register" class="register" method="post" action="../Acciones/Rest.php">
				<label for="chk" aria-hidden="true">REGISTRO</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
				<input type="email" name="email" id="email" placeholder="E-Mail" required>
				<input type="tel" name="telefono" id="telefono" placeholder="Telefono" required>
				<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
				<input type="password" name="rcontrasena" id="rcontrasena" placeholder="Repita su contraseña" required>
				<input type="hidden" name="opcion" value="4">
				<center>
					<p id="msgUserExist" style="color:white"></p>
				</center>
				<button type="submit" id="btnRegister">Registrarse</button>
			</form>
		</div>

		<div class="login">
			<form id="login" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<label for="chk" aria-hidden="true">INGRESO</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
				<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
				<center>
					<p id="msgUserInvalid"></p>
				</center>
				<button id="btnLogin" type="submit">Ingresar</button>
			</form>
		</div>
	</div>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = $_POST['usuario'];
		$password = $_POST['contrasena'];

		include_once("../Patrones/Strategy/AutenticarBD.php");
		include_once("../Patrones/Strategy/Autenticador.php");
		include_once("../Patrones/Strategy/IStrategy.php");

		$authenticator = new Authenticator;
		$authenticateDB = new AuthenticateDatabase;

		$authenticator->setAuthStrategy($authenticateDB);
		$authenticatorUser = $authenticator->authenticateUser($username, $password);

		echo "<meta http-equiv='refresh' content='0'>";
	}
	?>
	<script src="formulario.js"></script>
</body>

</html>