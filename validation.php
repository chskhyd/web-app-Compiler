
<?php

session_start();
$conn = mysql_connect("localhost","root", "");
if(! $conn )
{

    die('Could not connect: ' . mysql_error());
}
echo 'Connected db successfully';
$db = mysql_selectdb("college2",$conn);

$user=$_POST['user'];
$username=$_POST['login'];
$passwd=$_POST['password'];

if($user=="student")
{

    $query=" SELECT * FROM studreg WHERE( STUDID = '".$username."' AND PASSWD = '".$passwd."')";
    $res=mysql_query($query,$conn) or die('unable to run '.mysql_error());
    $count=mysql_num_rows($res);
    if($count==1)
    {
        echo " Welcome Successful login";
		
		$_SESSION['sess_user']=$username;
		//echo $_SESSION['sess_user'];
	
		 header("Location:./texteditor/texteditor.php");
		
    }
    else
    {
        echo " Invalid username and  password ";
    }



}
else
{
    $query=" SELECT * FROM facultyreg  WHERE ( USERNAME= '".$username."' AND PASSWD ='".$passwd."')";
    $res=mysql_query($query,$conn);
    $count=mysql_num_rows($res);

    if($count==1)
    {
        echo " Welcome Successful login";
	$_SESSION['sess_user']=$username;
      header("Location:http://localhost/prefinal/faculty/faculty.php");
    }
    else
    {
        echo " Invalid username and  password ";
    }
}

?>
