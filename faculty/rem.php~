
<?php
session_start();
include('name.php');


if(!isset($_SESSION['sess_user']))
{
	
	header("Location:http://localhost/prefinal/index.html");
}
else
{
echo 'Welcome   '.$_SESSION['sess_user'];
	chdir(dirname($_SESSION['cwd']));
 

function ccompile($fileName,$inpfile)
{
	
	$oName="cErrors";
	shell_exec("gcc $fileName -o $oName > $oName.err 2>&1");
 
	$_SESSION['error'] = file_get_contents("$oName.err");
 
	if($_SESSION['error']=='')
    	{
		shell_exec("./$oName < $inpfile > $oName.err 2>&1");

		$_SESSION['output'] = file_get_contents("$oName.err");
	}
	else
        {
		$_SESSION['output']='';
        }
	
}


function cppcompile($fileName,$inpfile)
{
	
	$oName="cppErrors";

	shell_exec("g++ $fileName -o $oName > $oName.err 2>&1");
 
	$_SESSION['error'] = file_get_contents("$oName.err");
 
	if($_SESSION['error']=='')
    	{
		shell_exec("./$oName < $inpfile > $oName.err 2>&1");

		$_SESSION['output'] = file_get_contents("$oName.err");

	}
	else
        {
		$_SESSION['output']='';
        }	
}
function javacompile($fileName,$inpfile)
{
	
	$fil=substr($fileName,0,-5);
	$oName="javaErrors";
 
	shell_exec("javac $fileName > $oName.err 2>&1 ");
 
	$_SESSION['error'] = file_get_contents("$oName.err");
 
	if($_SESSION['error']=='')
    	{
		shell_exec("java $fil < $inpfile > $oName.err 2>&1");

		$_SESSION['output'] = file_get_contents("$oName.err");		
	}
        else
        {
		$_SESSION['output']='';
        }

	
}


			
if(isset($_POST['text']))
{

		if(!empty($_POST['File_Name']) && !empty($data=$_POST['code']))
		{
			$fileName=$_POST['File_Name'];
			$data=$_POST['code'];
			$inp=$_POST['input'];
			$inpfile="inp.txt";
			if($_POST['lang']=="C")
			{
       				$fileName=$fileName.".c";
			}
 			else if($_POST['lang']=="C++")
			{
				$fileName=$fileName.".cpp";
			}
			else
			{
				$fileName=$fileName.".java";
					
			}

			
			$ifp=fopen($inpfile,"w");
			if($ifp==true)
			{
				fwrite($ifp,$inp);
				fclose($ifp);
				echo " input file is created  and written";
			}
			else
			{
				echo"input file is not creatd ";
			}			
			$fp=fopen($fileName,"w");
			if($fp==true)
			{
        
			fwrite($fp,$data);
			fclose($fp);
			echo " file updated successfully ";
				if($_POST['lang']=="C")
				{
					ccompile($fileName,$inpfile);
				}
				else if($_POST['lang']=="C++")
				{
					cppcompile($fileName,$inpfile);
				}
				else if($_POST['lang']=="java")
				{
					javacompile($fileName,$inpfile);
				}
			}
			else
			{
				echo "not created successfully";
		
			}
	
		}
		else
		{
			echo " All Fields are Necessary ";
		}

}


if(isset($_POST['submit']))
{

		if(!empty($_POST['File_Name']) && !empty($data=$_POST['code']))
		{
			$fileName=$_POST['File_Name'];
			$data=$_POST['code'];
			$inp=$_POST['input'];
			$inpfile="inp.txt";



			if(isset($_POST['remark']) && !empty($_POST['remark']))
			{
				$period=strpos($fileName,".");
				$fileExt=substr($fileName,0,$period);
				$remfil=$fileExt."@remark.txt";
				$irp=fopen($remfil,"w");
				if($irp==true)
				{
					fwrite($irp,$_POST['remark']."

          - by".$_SESSION['name']);
					fclose($irp);
					echo " input file is created  and written";
				}
				else
				{
					echo"input file is not creatd ";
				}
			}		



					
			$ifp=fopen($inpfile,"w");
			if($ifp==true)
			{
				fwrite($ifp,$inp);
				fclose($ifp);
				echo " input file is created  and written";
			}
			else
			{
				echo"input file is not creatd ";
			}			
			$fp=fopen($fileName,"w");
			if($fp==true)
			{
        
			fwrite($fp,$data);
			fclose($fp);
			echo " file updated successfully ";
				if($_POST['lang']=="C")
				{
					ccompile($fileName,$inpfile);
				}
				else if($_POST['lang']=="C++")
				{
					cppcompile($fileName,$inpfile);
				}
				else if($_POST['lang']=="java")
				{
					javacompile($fileName,$inpfile);
				}
			}
			else
			{
				echo "not created successfully";
		
			}
	
		}
		else
		{
			echo " All Fields are Necessary ";
		}

}



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Text editor</title>
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="jquery-linedtextarea.js"></script>
	<link href="jquery-linedtextarea.css" type="text/css" rel="stylesheet" />
</head>
<body bgcolor="#eee">
<table cellpadding="0" cellspacing="0" border="0" width="1%">
<tbody><tr>
<td style="vertical-align: top" width="1%">
  
  <form action="" method="post">
  <table cellpadding="10" width="1%">
  
	<input type="button" value="New File" onclick="window.open('texteditor.php')">
	<input type="button" value="Open" onclick="window.open('../student/showfiles.php')">
	<input type="button" value="logout" onclick="parent.location='../logout.php'">
	
	

  <tr>
    <td style="vertical-align: top"><span style="vertical-align:middle" class="label">Language:</span>
   <br>

    <nobr><label><input style="vertical-align:middle" name="lang" value="C" type="radio" <?php if(($_POST['lang'])=="C") echo 'checked="checked"';else 'checked="checked"';?> ><span style="vertical-align:middle" class="label">C</span></label></nobr><br>
    <nobr><label><input style="vertical-align:middle" name="lang" value="C++" type="radio" <?php if(($_POST['lang'])=="C++") echo 'checked="checked"';?> ><span style="vertical-align:middle" class="label">C++</span></label></nobr><br>
    <nobr><label><input style="vertical-align:middle" name="lang" value="java" type="radio" <?php if(($_POST['lang'])=="java") echo 'checked="checked"';?> ><span style="vertical-align:middle" class="label">Java</span></label></nobr><br>
  
    </td>
    <td style="vertical-align: middle">
	  <h3 align="center">Write your code here </h3></br>
	<textarea class="lined"  name="code" cols="100" rows="29" wrap="off" ><?php echo $data;?></textarea></td>
	<td style="vertical-align: right">
	<h3 align="center">Output </h3>
	
	 <textarea name="output" cols="50" rows="32" wrap="off" readonly><?if($_SESSION['output']!='')echo $_SESSION['output'];?>
</textarea></td>
	</tr>

	<?php $_SESSION['output']='';?>
	<tr>
	<td>Standard Input</td>
	<td>
	<textarea name="input" id="input" rows="2" cols="80"></textarea>
	</td>
	<td style="vertical-align: right">
	<h3 align="center">remark </h3>
	
	 <textarea name="remark" cols="50" rows="5" wrap="off" >
</textarea></td>
	</tr>
	</tr>
	<tr>
	<td>Standard Error</td>
	<td>
	<textarea name="error" rows="2" cols="80"><?if(!empty($_SESSION['error']))echo $_SESSION['error'];?></textarea>
	</td>
	</tr>
	<tr>
	<td>FILE NAME </td>
	<td><input name="File_Name" value="<?php echo $fileName;?>" maxlength="30" type="text" readonly>
	</td>
	</tr>
	
	

  <tr>
    <td colspan="2" style="vertical-align: middle; text-align: right">
      <table cellpadding="0" cellspacing="0" width="100%"><tbody><tr>
      <td style="text-align:right">
      <input name="submit" value="Submit" type="submit">
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

<?php
}
?>


