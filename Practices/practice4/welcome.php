<?php
session_start();
?>

<html>
<body>

<?php 

	echo "Weclome".$_COOKIE["name"]."!<br>";
	echo "Your email address is: ".$_COOKIE["email"].".<br>";

	echo "Welcome".$_SESSION["username"]."!<br>";
	echo "Your email address is: ".$_SESSION["emailaddress"].".<br>";
	

?>

</body>
</html>


