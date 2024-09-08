<?php
$con = mysqli_connect('localhost','root','');
	if(!$con)
	{
		echo 'Not connected to server';
	}
	if(!mysqli_select_db($con,'groceryn'))
	{
		echo 'Database Not Selected';
	}
?>