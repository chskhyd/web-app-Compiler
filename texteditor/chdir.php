<?php
//session_start();

$username=$_SESSION['sess_user'];

if(file_exists("../contents/2 IT/$username"))
{
	chdir("../contents/2 IT/$username");
	
}
else if(file_exists("../contents/3 IT/$username"))
{
	chdir("../contents/3 IT/$username");
	
	
} 

else if(file_exists("../contents/4 IT/$username"))
{	
	
	chdir("../contents/4 IT/$username");

} 
else
      echo "Invalid Login";


?>
