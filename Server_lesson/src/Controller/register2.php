<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

$completename = $_POST['completename'] ?? null;
$phonenumber = $_POST['phonenumber'] ?? null;
$mail = $_POST['mail'] ?? null;

$username = $_POST['username'] ?? null;
$password_1 = $_POST['password_1'] ?? null;
$password_2 = $_POST['password_2'] ?? null;

echo 'Validating data - Please wait...' . "<br/><br/>";

$usernameError = !(is_string($username) && strlen($username) > 2);
$completenameError = !(is_string($completename) && strlen($completename) > 8);
$phoneError = !(is_numeric($phonenumber) && strlen($phonenumber) > 5);
//all posted data will be in string!! So you need to convert it again
$mailError = !(is_string($mail) && strlen($mail) > 5);

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

	<body align="center">
		<form method="POST">
			<?php if ($completenameError ?? false) {?>
				<div>
					<p>You have an error in your complete name</p>
				</div>
			<?php }?>
			<label for="completename">Your full name : </label>
			<input type="text" name="completename" value="<?php echo htmlentities($_POST['completename'] ?? '') ?>"/>
			<br/><br/>
		
		
		
		
			<?php if ($usernameError ?? false) {?>
				<div>
					<p>You have an error in the username</p>
				</div>
			<?php }?>
			<label for="username">Your username : </label>
			<input type="text" name="username" value="<?php echo htmlentities($_POST['username'] ?? '') ?>"/>
			<br/><br/>
			
			
			<?php if ($phoneError ?? false) {?>
				<div>
					<p>You have an error in the phone number</p>
				</div>
			<?php }?>
			<label for="phonenumber">Your phonenumber : </label>
			<input type="number" name="phonenumber" value="<?php echo htmlentities($_POST['phonenumber'] ?? '') ?>"/>
			<br/><br/>
			
			
			<?php if ($mailError ?? false) {?>
				<div>
					<p>You have an error in your mail</p>
				</div>
			<?php }?>
			<label for="mail">Your mail address : </label>
			<input type="email" name="mail" value="<?php echo htmlentities($_POST['mail'] ?? '') ?>"/>
			<br/><br/>
			
			
			
			<?php if ($passwordError ?? false) {?>
				<div>
					<p>You have an error in your password</p>
				</div>
			<?php }?>
			<label for="password_1">Your password : </label>
			<input type="password" name="password_1"/>
			<br/><br/>
			<label for="password_2">Retype your password : </label>
			<input type="password" name="password_2"/>
			<br/><br/>
			<button type="submit">Send</button>
		</form>
	</body>

</html>