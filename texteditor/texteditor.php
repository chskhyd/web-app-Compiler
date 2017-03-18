

<?php 
session_start();
include('chdir.php');

if(!isset($_SESSION['sess_user']))
{
	header("Location:http://localhost/prefinal/index.html");
	
}
else
{
	echo 'Welcome   '.$_SESSION['sess_user'];

if(isset($_POST['studOpen']))
{
 if ($_POST['studOpen'] == "open" )
{
	$fil=$_POST['File_open'];
	 if(substr($fil,strpos($fil,".")+1)=="txt")
	{	

		$myfile = fopen($fil, "r") or die("Unable to open file!");
		if(filesize($fil)==0)
		{
			echo " File size is empty";
			$data=' ';
		}
		else
		{
		$_SESSION['rem'] = fread($myfile, filesize($fil));
		header("Location:http://localhost/prefinal/texteditor/remark.php");
		}
        }
	else
	{

		$file=$_POST['File_open'];
		$period=strpos($file,".");
		$fileExt=substr($file,0,$period);
		$fileRem=$fileExt."@remark.txt";
		if(file_exists($fileRem))
		{
				$myfile = fopen($fileRem, "r") or die("Unable to open file!");

			if(filesize($fileRem)==0)
			{
				
				$remark=' ';
			}
			else
			
			{	
				$remark = fread($myfile, filesize($fileRem));
			}
			fclose($myfile);


		}else
		{
                        $remark='';
		}

	

	$myfile = fopen($fil, "r") or die("Unable to open file!");
	if(filesize($fil)==0)
	{
		echo " File size is empty";
		$data=' ';
	}
	else
	{	$check=substr($fil,strpos($fil,".")+1);
		$data = fread($myfile, filesize($fil));
	}
fclose($myfile);
}
}
}

if(isset($_POST['facOpen']))
{
 if ($_POST['facOpen'] == "open" )
{
	$fil=$_POST['File_open'];

       
		$myfile = fopen($fil, "r") or die("Unable to open file!");



		if(filesize($fil)==0)
		{
			echo " File size is empty";
			$data=' ';
		}
		else
		{
			$data = fread($myfile, filesize($fil));
		}
	fclose($myfile);
	
}
}

?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Text Editor</title>
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="jquery-linedtextarea.js"></script>
	<link href="jquery-linedtextarea.css" type="text/css" rel="stylesheet" />
</head>
<body bgcolor="#eee">
<table cellpadding="0" cellspacing="0" border="0" width="1%">
<tbody><tr>
<td style="vertical-align: top" width="1%">

	<input type="button" value="New File" onclick="window.open('texteditor.php')">
	<input type="button" value="Open" onclick="window.open('../student/showfiles.php')">
	<input type="button" value="logout" onclick="parent.location='../logout.php'">
	
  
  <form action="compile.php" method="post">
  <table cellpadding="10" width="1%">

  <tr>
    <td style="vertical-align: top"><span style="vertical-align:middle" class="label">Language:</span>
   <br>

    <nobr><label><input style="vertical-align:middle" name="lang" value="C" <?if(isset($_POST['studOpen']) && $check=="c") echo 'checked="checked"'; else echo 'checked="checked"' ?> type="radio"><span style="vertical-align:middle" class="label">C</span></label></nobr><br>
    <nobr><label><input style="vertical-align:middle" name="lang" value="C++"<?if(isset($_POST['studOpen']) &&$check=="cpp") echo 'checked="checked"'; ?>type="radio"><span style="vertical-align:middle" class="label">C++</span></label></nobr><br>
    <nobr><label><input style="vertical-align:middle" name="lang" value="java"<?if(isset($_POST['studOpen']) &&$check=="java") echo 'checked="checked"'; ?> type="radio"><span style="vertical-align:middle" class="label">Java</span></label></nobr><br>
  
    </td>

	


    <td style="vertical-align: middle">
	
	<textarea class="lined"  name="code" cols="100" rows="29" wrap="off" <?if(isset($_POST['File_open'])&&isset($_POST['facOpen']))
 echo "readonly";?> ><?if(isset($_POST['File_open'])) echo $data;?></textarea></td>

		<?php if(isset($_POST['studOpen'])){
	echo '<td style="vertical-align: right">
	<h3 align="center">remark </h3>
<textarea name="remark" cols="50" rows="20" wrap="off" readonly>'?> <?php if(!empty($remark))echo $remark;?>
<?php echo '</textarea></td> ';
	} ?>

	</tr>

	<tr>
	<td>Standard Input</td>
	<td>
	<textarea name="input" id="input" rows="2" cols="80"></textarea>
	</td>
	</tr>

  <tr>
<td>FILE NAME </td>
<td><input name="File_Name" <?php if(isset($_POST['facOpen']) || isset($_POST['studOpen'])) echo "readonly";?> maxlength="30" value="<?php if(isset($_POST['facOpen']) || isset($_POST['studOpen'])){$file=$_POST['File_open'];$period=strpos($file,".");
$fileExt=substr($file,0,$period);

echo $fileExt;}?>" type="text" >
</td>
</tr>

  <tr>
    <td colspan="2" style="vertical-align: middle; text-align: right">
      <table cellpadding="0" cellspacing="0" width="100%"><tbody><tr>
      <td style="text-align:right">
      <input name="first" value="Submit" type="submit">
      </td>
      </tr></tbody></table>
      </div>
      </td></tr></tbody></table>
    </td>
  </tr>
  </tbody></table>
<script>
$(function() {
	$(".lined").linedtextarea(
		{selectedLine: 1}
	);


});
</script>
</body>
</html>
<?
}
?>
