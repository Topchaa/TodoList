<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'todolist');

$status = "";
$msg = "";
$state = "";

if(isset($_POST['id'])) {


$updNumber = $_POST['id'];


	if ($conn) {
	
$sql = "SELECT * FROM posts WHERE id = ".$updNumber;
$query = $conn->query($sql);
$num = mysqli_num_rows($query);
if ($num > 0 ) {
	while ($row = mysqli_fetch_assoc($query)) {
		
        if ($row['usernum'] == $_SESSION['id']) {
        	$status = "success";

            if ($row['type'] == "done") {
            	$state = 'undone';
            }elseif ($row['type'] == 'undone') {
            	$state = 'done';
            }


        }else{
        	$status = "error";
        }

	}


}


if ($status == "success") {
	
if ( $state == 'undone' ) {
	 
	
$update = "UPDATE posts SET type = 'undone'  WHERE id =".$updNumber;
   $queryy = $conn->query($update);

 
}elseif (  $state == 'done' ) {
	
   $update = "UPDATE posts SET type = 'done'  WHERE id =".$updNumber;
   $queryy = $conn->query($update);

}
	
} else if ($status == "error") {
	$msg = "something went wrong.";
}




	}else{
		$status  = "error";
	}

exit(json_encode(array("status" => $status, "response" => $msg)));

}
























  ?>