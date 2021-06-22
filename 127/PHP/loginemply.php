<?php 

$Username = $_POST['Username'];
$Password = $_POST['Password'];

		$con = new mysqli('localhost' , 'root' , '', 'addjob');

if($con->connect_error){
	die("Failed to connect: " .$con->connect_error);
}
else{
	$stmt = $con->prepare("select * from worker where worker_email = ?" );
	$stmt->bind_param("s", $Username );
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows>0){
       $data = $stmt_result->fetch_assoc();
       if($data['worker_pass'] === $Password){
       	echo "Success!!";

       }
       else{
       	echo "Invalid email or pass!!";
       }

	}
	else{
		echo "Invalid pass!!";
	}
}

?>