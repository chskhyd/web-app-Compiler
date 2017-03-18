<?php

session_start();

if(!isset($_SESSION['sess_user']))
{
	
	header("Location:http://localhost/prefinal/index.html");
}
else
{
    unset($_SESSION['sess_user']);
	session_destroy();

	echo '<html>
<body bgcolor="#eee">';
    echo 'You are successfully logged out';

echo '<br><br><a href="index.html">Click here to login </a>';

echo '</body> </html>';

}
?>


