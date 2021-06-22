<?php
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$choice = $_POST['choice'];

		$conn = new mysqli('localhost' , 'root' , '', 'addjob');

		if ($conn->connect_error){
			die('Connection Failed : '.$conn->connect_error);
		}
		else{
			if($choice == "Employee"){
				$sql = "insert into worker(worker_name, worker_email, worker_pass) 
					values('$Username', '$Email', '$Password')";
				$res = mysqli_query($conn, $sql);
			}
			else{
				$sql = "insert into customer(customer_name, customer_email, customer_pass) 
					values('$Username', '$Email', '$Password')";
				$res = mysqli_query($conn, $sql);
			}

			if ($res) {
				echo "Okay!";
			}else {
				echo "nah!";
			}
		}
?>