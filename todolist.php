
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		toDoList
	</title>
<link rel="stylesheet" href="assets/css/main-page.css">

<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/400bf1c037.js" crossorigin="anonymous"></script>
            

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</head>
<body>

<div class="container">
<div class="upper-side">
	<h1 class="heading" >To do List</h1>
	<p class="sub-heading">write down what's important</p>
<form method="POST" action="todolist.php" class="input-form">

	<br>
	<input type="text" name="texts" class = "text-input"  placeholder="Add Notes" > 
   <button type="submit" name="sbmtt" class="add-btn"><i class="fas fa-plus"></i></button>

</form>
</div>


<div class="lower-side">

<center><div class="overlay">
	
<p>your notes</p>

</div></center>






<?php


$number = $_SESSION['id'];
$name = $_SESSION["namee"];

$conn = mysqli_connect('localhost', 'root', '', 'todolist');
$idd = "";





date_default_timezone_set("Asia/Tbilisi");
$time = date("h:i");


if (isset($_POST['sbmtt'])) {


if ( empty($_POST['texts']) ) {
	
echo "<script>

alert('write something !');

</script>";

} else {
$txt = $_POST['texts'];
	$upl = "INSERT INTO posts(usernum,texts,timee,type) 
VALUES ('$number','$txt','$time','undone')";


$queryy = $conn ->query($upl);

header('location: todolist.php');
}




}



if (empty($number)  || empty($name) ) {

header("location:index.php");

}elseif (isset($_SESSION['id'])) {
   
	

	$sel = "SELECT * FROM posts WHERE usernum = $number";
  

	$query = $conn->query($sel);

	 $num = mysqli_num_rows($query);
     

	 if ($num > 0) {
	 	while ($row = mysqli_fetch_assoc($query)) {

if ($row['type'] == 'done') {
	$label = "<i class='fas fa-undo'></i>";
}else{
	$label= "<i class='fas fa-check'></i>";
}

		echo "

<div class = 'parentContainer'>
<i class='fas fa-circle'></i>
		<div class='listContainer'>

		<li class='listItem'> <p class = ".$row["type"].">".$row['texts']." </p> <button class ='updBtn' id=".$row['id']." >".$label."</button>&ensp; <button class = 'delBtn' id=".$row['id']." ><i class='fas fa-times'></i></button>&ensp;</li>
		<p class='time'><i class='far fa-clock'></i>  <b> " .$row['timee']." </b> </p> </div>

		</div>
<hr>
		";
			
			


	
		}

        }





	 
}else{
echo "<br>";
	echo "there are no records add some";
}

	




?>




</div>

</div>



<script type="text/javascript" src="assets/js/modify.js"></script>

</body>
</html>

















  









