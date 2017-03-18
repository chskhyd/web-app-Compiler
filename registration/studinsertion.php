
<?php

$conn = mysql_connect("localhost","root", "");
if(! $conn )

{

    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$db = mysql_selectdb("college2",$conn);
$firstName=$_POST['First_Name'];
$secondName=$_POST['Last_Name'];
$userName=$_POST['stud_id'];
$year=$_POST['year'];
$passwd=$_POST['passwd'];
$email=$_POST['Email_Id'];
    $query=" INSERT INTO studreg VALUES('$firstName','$secondName','$userName','$passwd','$email')";
    $res=mysql_query($query,$conn);
    if(!$res)
    {
        die('could not insert data ');

    }
    echo " Inserted ";
	
	if($year=="2nd_Year")
	{
		$di=mkdir("../contents/2 IT/$userName",0777);
		if($di)
		{
			echo " <br> Directry created successfully 2nd IT";
		}
		else
		{
			echo "<br> Directory not created ";
		}
	}
	if($year=="3rd_Year")
	{
		$di=mkdir("../contents/3 IT/$userName",0777);
		if($di)
		{
			echo " <br> Directry created successfully 3 rd IT";
		}
		else
		{
			echo "<br> Directory not created ";
		}
	}
	if($year=="4th_Year")
	{
		$di=mkdir("../contents/4 IT/$userName",0777);
		if($di)
		{
			echo " <br> Directry created successfully in 4 th IT ";
		}
		else
		{
			echo "<br> Directory not created ";
		}
	}
	
	
	
	
	
	echo "<a href ='../index.html' > Click here to Login</a>";
mysql_close($conn);
?>
