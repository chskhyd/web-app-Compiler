<?php

$_SESSION['sess_user']="1215";

$conn = mysql_connect("localhost","root", "");
if(! $conn )
{

    die('Could not connect: ' . mysql_error());
}

$db = mysql_select_db("college2",$conn);

    $query=" SELECT firstname,lastname FROM facultyreg  WHERE ( USERNAME= '".$_SESSION['sess_user']."')";
    $res=mysql_query($query,$conn);
    $count=mysql_num_rows($res);
    if($count==1)
    {
 
   	  while($row=mysql_fetch_array($res,MYSQL_ASSOC))
   	  {
		$_SESSION['name']=$row['firstname'].$row['lastname'];
 	}
    }
    else
    {
		echo "Invalid User";
    }
		

?>

