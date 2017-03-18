
<?php

$conn = mysql_connect("localhost","root", "");
echo " Connected successfully";
if(! $conn )

{

  die('Could not connect: ' . mysql_error());
}

$db = mysql_selectdb("college2",$conn);
$firstName=$_POST['First_Name'];
$secondName=$_POST['Last_Name'];
$userName=$_POST['username'];
$passwd=$_POST['passwd'];
$email=$_POST['Email_Id'];
$query=" INSERT INTO facultyreg VALUES('$firstName','$secondName','$userName','$passwd','$email')";
$res=mysql_query($query,$conn);
if(!$res)
{
  die('could not insert data ');

}
echo " Inserted ";

echo "<a href ='../index.html'> Click here to Login</a>";
mysql_close($conn);
?>
