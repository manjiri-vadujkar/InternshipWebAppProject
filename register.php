<?php
include("database_connection.php");
$name="";
$mobile="";
$email="";
$psw="";
$city="";
$pet="";

if(isset($_POST['submit'])){

	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
	if(isset($_POST['mobile'])){
		$mobile= $_POST['mobile'];
	}
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	if(isset($_POST['psw'])){
		$psw = $_POST['psw'];
	}
	if(isset($_POST['city'])){
		$city = $_POST['city'];
	}
	if(isset($_POST['pet'])){
		$pet = $_POST['pet'];
	} 
echo "hi";
	$sql = "INSERT INTO users ( user_name, mobile, user_email, user_password, city, pet) VALUES(?,?,?,?,?,?)";
	echo "hi";
	$stmtinsert = $connect->prepare($sql);
	echo "hi";
	$result = $stmtinsert->execute([$name, $mobile, $email, $psw, $city, $pet]);
	echo "hi";
		if($result){
			echo "hi";
			header("location:login.html");
		}else{
			echo "hi";
			echo 'There were errors while saving the data.';
		}
}

?>