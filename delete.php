<?php  
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'todolist');

$status = "";
$msg = "";
if(isset($_POST['id'])) {
$delNumber = $_POST['id'];


	if ($conn) {
	
$sql = "SELECT * FROM posts WHERE id = ".$delNumber;
$query = $conn->query($sql);
$num = mysqli_num_rows($query);
if ($num > 0 ) {
	while ($row = mysqli_fetch_assoc($query)) {
		
        if ($row['usernum'] == $_SESSION['id']) {
        	$status = "success";
        }else{
        	$status = "error";
        }

	}


}


if ($status == "success") {
	
$delete = "DELETE FROM posts WHERE id = ".$delNumber;
$quer = $conn->query($delete);
$msg = "record successfully deleted";
	
} else if ($status == "error") {
	$msg = "something went wrong.";
}




	}else{
		$status  = "error";
	}

exit(json_encode(array("status" => $status, "response" => $msg)));

}










?>