<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){


$username = $_POST['username'] ?? null;
$password_1 = $_POST['password_1'] ?? null;
$password_2 = $_POST['password_2'] ?? null;

echo 'Validating data - Please wait...' . "<br/>";
$usernameError = !(is_string($username) && strlen($username) > 2);
$passwordError = !($password_1 === $password_2 && strlen($password_1) > 7);

if(!($usernameError || $passwordError)) {
    echo 'Data Validation OK -> Storing data to database' . "<br/>";
    return;
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Server Exercise - Register Form</title>
	</head>

	<body>
		<form method="POST">
			<?php if ($usernameError ?? false) {?>
				<div>
					<p>You have an error in the username</p>
				</div>
			<?php }?>
			<label for="username">Your username : </label>
			<input type="text" name="username" value="<?php echo htmlentities($_POST['username'] ?? '') ?>"/>
			<br/>
			<?php if ($passwordError ?? false) {?>
				<div>
					<p>You have an error in your password</p>
				</div>
			<?php }?>
			<label for="password_1">Your password : </label>
			<input type="password" name="password_1"/>
			<br/>
			<label for="password_2">Retype your password : </label>
			<input type="password" name="password_2"/>
			<br/>
			<button type="submit">Send</button>
		</form>
	</body>

</html>