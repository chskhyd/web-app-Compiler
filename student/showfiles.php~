<?php
session_start();
include("../texteditor/chdir.php");


if(!isset($_SESSION['sess_user']))
{
	header("Location:http://localhost/prefinal/index.html");
}
else
{
 echo "Welcome".$_SESSION['sess_user'];
$dir=opendir(".");
while($entryName=readdir($dir))
{
    $dirArray[]=$entryName;
}
closedir($dir);
$indexCount = count($dirArray);
echo " Total Number of file = ";
echo $indexCount."Files";
echo "<br><br><br>";


for($index=0;$index < $indexCount;$index++)
{
	if( $dirArray[$index]!= "." &&  $dirArray[$index]!= ".." )
	{

    $type=filetype($dirArray[$index]);
    if($type=="dir")
    {
        echo "<img src='folder.png'  >";
    }
    else
    {
        echo "<img src='sig.gif' >";
    }
    echo "<a href = '".$dirArray[$index]."'>".$dirArray[$index]."</a>";
	echo "<br><br>";
	}
}
?>
<html>
<head>
    Your Files 
</head>
<body bgcolor="#eee">

<form action="../texteditor/texteditor.php" method="post">
<p>
Enter the file name to open
<input type="text"  name="File_open" maxlength="30" >
</p>
<input type="submit" value="open" name="studOpen">

</form>
</body>
</html>
<?php
}
?>

