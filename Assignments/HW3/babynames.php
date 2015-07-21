<?php
$q = intval($_GET['q']);
$con = mysqli_connect('localhost','root');
if(!$con){
	die('Could not connect:'.mysqli_error($con));
}
mysqli_select_db($con,"csv_db");
$sql1 = "SELECT * FROM babynames WHERE year = '".$q."' AND gender = 'female'";
$result1 = mysqli_query($con, $sql1);
$sql2 = "SELECT * FROM babynames WHERE year = '".$q."' AND gender = 'male'";
$result2 = mysqli_query($con, $sql2);


echo "<table>
<caption>Female</caption>
<tr>
<th>name</th>
<th>year</th>
<th>ranking</th>
<th>gender</th>
</tr>";

while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['ranking']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "</tr>";

}
echo "</table>";
echo "<br/>";

echo "
<table>
<caption>Male</caption>
<tr>
<th>name</th>
<th>year</th>
<th>ranking</th>
<th>gender</th>
</tr>";

while($row = mysqli_fetch_array($result2)){
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['ranking']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "</tr>";

}

echo "</table>";
mysqli_close($con);
?>
