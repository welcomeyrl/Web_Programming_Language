<?php
session_start();
$name = $email="";
$flag1 = FALSE;
$flag2 = FALSE;


function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["name"]))
	{$nameErr="Username is required";}
    else{
		$name = test_input($_POST["name"]); 
		$flag1 = TRUE;
	}
    if(empty($_POST["email"]))
	{$emailErr="email is required";}
    else{
		$email = test_input($_POST["email"]);
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{ $emailErr = "Invalid email format";			 
		}
	    else{
			$flag2 = TRUE;
		}
	}
	if($flag1==TRUE&&$flag2==TRUE){
		header('Location: welcome.php');	
	}
	else{
		header('Location: login.html');
		exit();
	}
setcookie("name", $name, time() + (86400 * 30), "/");//whether it is NULL
setcookie("email", $email, time() + (86400 * 30), "/");

$_SESSION["namesession"] = $name;
$_SESSION["emailsession"] = $email;

}	
?>