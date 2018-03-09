<?php 
    $range = range(0,5);
    
    //http://localhost/?name=charlie&age=39
    $name = $_GET['name'] ?? 'Frank'; //this single line replaces the multiple lines below
    $name = htmlentities($name); //to avoid execution of script codes
    //or $name = htmlentities($_GET['name'] ?? 'Frank');
    //if (isset($_GET['name'])){
    //$name = $_GET['name'];
    //} else {
    //    $name = 'Frank'; //default value if none is given
    //}
    $age = $_GET['age'] ?? 'unkown';
    $age = htmlentities($age);
    //if (isset($_GET['age'])){
    //$age = $_GET['age'];
    //} else {
    //    $age = 'unkown';
    //}
    
    //$name2 = $_GET['name2']; 
    //to call with http://localhost/?name2=charlie
    $currentTimeSlot = (new DateTime())->format('H');
        
    if ($currentTimeSlot <12){
        $toDisplay  ='Good morning';
    }else if ($currentTimeSlot <18){
        $toDisplay  ='Good afternoon';
    }else if ($currentTimeSlot <22){
        $toDisplay  ='Good evening';
    }else {
        $toDisplay  ='Please, sleep';
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Server Exercise</title>
	</head>

	<body>
		Today is <?php echo (new DateTime())->format('l'); ?>
		<br/>
		We have the <?php echo (new DateTime())->format('d-m-Y'); ?>
		<br/>
		And the current time is : <?php echo (new DateTime())->format('H:i:s'); ?>
		<br/>
		<br/>
		<?php echo $toDisplay. " " .$name?> 
		<br/>
		<?php echo $name. " is " .$age . " years old."?> 
			<ul>
				<?php foreach($range as $element) { ?>
				<li><?php echo $element; ?></li>
				<?php } ?>
			</ul>

			<ul>
				<?php foreach($range as $element) {
				echo '<li>' . $element . '</li>';				
				} ?>
			</ul>
				
		
		
	</body>

</html>