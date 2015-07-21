<?php

session_start();

?>
<!DOCTYPE html>
<html>
<body>
<?php

echo "Welcome " . $_COOKIE["name"] . "!<br>";
echo "Your email is " . $_COOKIE["email"] . "!<br>";
echo "Welcome " . $_SESSION["namesession"] . "!<br>";
echo "Your email is " . $_SESSION["emailsession"] . "!<br>";
?>

</body>
</html>




