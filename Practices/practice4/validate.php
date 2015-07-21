<?php
session_start();

$name = "";
$email = "";
$nameError = "";
$emailError = "";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["name"])){
		$nameError="Username is required";
	}
    else{
		$name = test_input($_POST["name"]); 
	}
    if(empty($_POST["email"])){
    	$emailError="email is required";}
    else{
		$email = test_input($_POST["email"]);
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){ 
			$emailError = "The email format must be xxxx@xxxx.xxx";			 
		}
	}

	if($nameError == "" && $emailError == ""){

		setcookie("name", $name, time() + 3600);
		setcookie("email", $email, time() + 3600);

		$_SESSION["username"] = $name;
		$_SESSION["emailaddress"] = $email;

		header('Location: welcome.php');
		echo "valid";
		//exit();	
	}
	else{
		//header('Location: login.html');
		echo "invalid";
		//exit();
	}
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

	

session_write_close();
?>


