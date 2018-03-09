<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Server Exercise - Account</title>
	</head>

	<body>

<?php

$displayAccountId = $_GET['id'] ?? null;

if (!$displayAccountId || !is_numeric($displayAccountId)){

?>
<div>
	<p>To be displayed, this page needs a valid numeric id to query the database</p>	
</div>

<?php    
} else {
    
    try{
        $connection = new PDO('mysql:dbname=register;host=localhost', 'root', 'tx77ztfu*');
        
    } catch (\PDOException $exception) {
        http_response_code(500);
        echo 'Impossible to connect to the DB, contact the support';
        exit(1);
    }
    
    $sql = "SELECT username, password FROM user WHERE id = ".$displayAccountId;
    
    $resultall = $connection->query($sql); //pay attention if use exec or query
   
    //case of fetchall
    $resultall = $resultall->fetchall();
     
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