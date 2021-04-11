
<?php

ob_start();

session_start();


?>
<!DOCTYPE html>
<html >
<meta charset="UTF-8">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/styles.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>
		ToDo List
	</title>

</head>
<body>



<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="container"   >


  <form action="index.php" method="post"  class="form">

<center><h3 class="headline">REGISTRATION</h3>
<hr>
     <div class="inputs input-group flex-nowrap">

  
  <input  type="email" name="email"  class=" form-control" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" required>


</div>

<div class="inputs input-group flex-nowrap">

  
  <input  type="text" name="namee" class=" form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"  required>


</div>
<div class="inputs input-group flex-nowrap">

  
  <input  type="password" name="pass" class=" form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping" required>


</div>


  

   <button type="submit" class="btn btnn " name="submite" >REGISTER</button>

   <p class="text">Already Registered ?<a href="index.php" class="link"> Login Here</a>
  </form>

</center>
  
</div>

<?php





require "DBconnect.php";

if ($conn) {


if (isset($_POST["submite"])) {
	


if (empty($_POST["namee"]) || empty($_POST["email"]) || empty($_POST["pass"]) ) {
    
echo "<script> alert('please, fill all the fields')</script>";
header("Location:index.php");
}else{

$name = $_POST["namee"];
$email = $_POST["email"];
$pass = $_POST["pass"];

checkNames( $name, $email,$conn);








$ins = "INSERT INTO users(name,password,email) 
VALUES ('$name','$pass','$email')";
$conn->query($ins);



$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['pass'] = $pass;



header("Location: todolist.php");

}
}else{
	
}


}else{


}


function checkNames( $username, $emaili, $con){
$status = 1;
$selector = "SELECT * FROM users";
$result = $con->query($selector);

$quantity = mysqli_num_rows($result);
if ($quantity > 0) {
 while ($row = mysqli_fetch_assoc($result)) {
  
if ($username == $row['name'] || $emaili == $row['email']) {
 $status = 0;
}

if ($status == 0) {
echo "<script>

$('document').ready(function(){

var div = document.createElement('DIV');
document.body.appendChild(div);
div.innerHTML = 'Username or Email is already used!';
div.setAttribute('class','alert alert-danger');
div.setAttribute('role','alert');
div.style.position = 'fixed';
div.style.float = 'right';
div.style.top= '90%';
div.style.right= '20px';
   $('.alert').fadeIn();

setTimeout(function(){

  $('.alert').fadeOut();
  },2000);

  });

  </script>";

die("");
}


 }
}


}

?>

</body>
</html>



