<?php

include("database_connection.php");
if(isset($_COOKIE["user_id"]) && isset($_COOKIE["user_name"]))
{
 header("location:index.html");
}
$message = '';

if(isset($_POST["login"]))
{  
 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 { 
  $query = "
  SELECT * FROM users
  WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'user_email' => $_POST["user_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if(($_POST["user_password"]==$row["user_password"]))
    {
     header("location:index.html");
    }
    else
    {
     	$message = "wrong Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location:login.html");
    }
   }
  }
  else
  {
   $message = "wrong Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location:login.html");
  }
 }
}
?>