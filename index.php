<?php
 
session_start(); 
 
 if(!isset($_SESSION['p1'])){
$username="pi";
$password="qwer4asd3z1";
$database="Mini_project";
$servername="localhost";
 
$sql = new mysqli($servername,$username,$password,$database);
if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
} 


$querry="SELECT * FROM br_code";
$result=$sql->query($querry);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "date -: " . $row["datestamp"]." Barcode-:". $row["barcode"]."<br>";
    }
} else {
    echo "0 results";
} 
 
$sql->close();
}

else {
	echo "please login again";
}
 
?>
