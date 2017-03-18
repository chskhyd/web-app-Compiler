<?php
session_start();



if(!isset($_SESSION['sess_user']))
{ 
	header("Location:http://localhost/prefinal/index.html");
}
else
{
?>
<html>
<head>
      <title> Remark</title>
</head>
<body bgcolor="#eee">
<div align="center">
<h3>Remark </h3>
<br>
<textarea rows=30 cols=50 readonly > <?php echo $_SESSION['rem'];?> 
    </textarea>

</div>
</body>
</html>
<?php
}
?>
