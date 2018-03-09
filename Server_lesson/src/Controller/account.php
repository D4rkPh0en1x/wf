<?php 

include_once __DIR__.'/init.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Server Exercise - Account</title>
	</head>

	<body>

<?php

//$displayAccountId = $_GET['id'] ?? null;
$displayAccountUsername = $_GET['username'] ?? null;

//if (!$displayAccountId || !is_numeric($displayAccountId)){
if (!$displayAccountUsername){
    
?>
<div>
	<p>To be displayed, this page needs a valid numeric id to query the database</p>	
</div>

<?php    
} else {
    
    try{
        $connection = Service\DBConnector::getConnection();
        
    } catch (PDOException $exception) {
        http_response_code(500);
        echo 'Impossible to connect to the DB, contact the support';
        exit(1);
    }
    
    // Avoid SQL injection - Examples
    
    // $sql = 'SELECT username, password FROM user WHERE id = ?';
    // $sql = 'SELECT * FROM user WHERE username = ?';
    // $statement->bindParam(1, $displayAccountId);
    // $statement->bindParam(1, $displayAccountUsername, PDO::PARAM_STR);
    
    $sql = 'SELECT * FROM user WHERE username = :username';
    $statement = $connection->prepare($sql);

    $statement->bindParam('username', $displayAccountUsername, PDO::PARAM_STR);
    $statement->execute();    
    
    
    // $resultall = $connection->query($sql); //pay attention if use exec or query -> unsecure
   
    //case of fetchall
    $resultall = $statement->fetchall();
     
    if (empty($resultall)){
    ?>
	<div>
		<p>To be displayed, this page needs a valid numeric id to query the database</p>	
	</div>

	<?php   
    return;
    }
    
    foreach ($resultall as $row){
        $username=$row['username'];
        $password=$row['password'];
        ?>
        <div>
            <p>Username: <?php echo $username; ?></p>
            <p>Password: <?php echo $password; ?></p>
        </div>
        <?php 
    }
    
    
    //case of fetch
    //$results = $connection->query($sql);
    // while ( ($aLine = $results->fetch()) !== false ){
    //     $aLine['username'];
    //     $aLine['password'];
    // }
    
}
?>

	</body>

</html>