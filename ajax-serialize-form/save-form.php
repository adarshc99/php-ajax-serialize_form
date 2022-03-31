<?php

$conn = mysqli_connect("localhost", "root", "", "ajax-serialize");

$name = $_POST['fullname'];
$age =  $_POST["age"];
$gender = $_POST["gender"];
$country = $_POST["country"];
$sql = "INSERT into ajax_form(Name,Age,Gender,Country)
		values('{$name}','{$age}','{$gender}','{$country}')";
if(mysqli_query($conn,$sql))
{
	echo 1;
}
else
{
	echo 0;
}

mysqli_close($conn);

?>
