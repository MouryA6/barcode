<?php
		$username = $_POST['user'];
		$password = $_POST['pass'];

		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$username = mysqli_real_escape_string($username);
		$password = mysqli_real_escape_string($password);

		$sql = new mysqli("localhost:3306","pi","qwer4asd3z1","Mini_project");
		if($sql->connect_error){
					die("Connection failed: " . $sql->connect_error);		
		}

		session_start();
		$_SESSION['Uname']='P1';
		
		$result = $sql->query("select * from Admin where name='$username' and Password = '$password'") or die("Failed to querry database ".mysqli_error($sql));
		$row = mysqli_fetch_array($result);
		if($row['name'] == $username && $row['Password'] == $password){
			
						if(!isset($_SESSION['p1'])){
									echo "login successful!!! WELCOME".$row['name'];
   								header('Location:index.php');
   								session_destroy(); 
   								exit;
						}
						else{
							echo "login again!!!";
   								header('Location:login.php');
						}    		
		}
		else{
			echo "Failed to login!!!";
			exit;
		}
?>