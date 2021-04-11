<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>

<link rel="stylesheet" href="assets/css/styles.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
 
<div class="container1">
 <h2 class="headtext">Welcome to my <br>To Do List</h2>
      <form name='form-login' action="index.php" method="POST" class="form2" >
  
<center><h4>LOG IN</h4></center>
  <hr>
  <div class="inputContainer">
          <p class="label">username</p>
          <input type="text" id="user"  name="namee" class=" form-control input" required>
       </div>

  <div class="inputContainer" >
 <p class="label">password</p>
          <input type="password" id="pass"  name="password" class="form-control input" required>
 </div>
 
 <p class="text2">Don't have an account? <a href="registration.php" class="link">Create one</a> </p>

      

        <button type="submit" name="sbmt" class="btn btn-primary LogIn">LOGIN</button>

        
<script type="text/javascript">

<?php  

if(isset($_GET['msg'])){

echo "
$('document').ready(function(){

var div = document.createElement('DIV');
document.body.appendChild(div);
div.innerHTML = 'Incorrect name or password !';
div.setAttribute('class','alert alert-danger');
div.setAttribute('role','alert');
div.style.position = 'fixed';
div.style.float = 'right';
div.style.top= '90%';
div.style.right= '20px';
   $('.alert').fadeIn();

setTimeout(function(){

  $('.alert').fadeOut();
  },2000)

  });

";



}




?>

</script>
</form>

</div>
<?php


$conn = mysqli_connect('localhost', 'root', '', 'todolist');

if ($conn) {

     if (isset($_POST['sbmt'])) {


     	if (empty($_POST["namee"]) || empty($_POST["password"]) ) {

   echo "პაროლის ან სახელის ველი ცარიელია";
            header("location:index.php");



     	}else{
      






            $name  = $_POST["namee"];
        $pass = $_POST["password"];


 $sel  =  "SELECT * FROM users WHERE name = '$name' AND password = '$pass' ";

$query = $conn->query($sel);
$row =  mysqli_num_rows($query);


	
    
if ($row > 0) {
	while ($row = $query->fetch_assoc()) {
		
		$_SESSION['id'] = $row['id'];
      $_SESSION['namee'] = $row['name'];
	}
	header("location:todolist.php");
	
}else{

	
  
  header("location:index.php?msg='error' ");
}

     	} 
     	
     }
}






?>
</body>
</html>


