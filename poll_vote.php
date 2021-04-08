<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['votou'])) {
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "/tmp/poll_result.txt";
if(!file_exists($filename)) {
	touch($filename);
}
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}

//insert votes to txt file
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
$_SESSION['votou'] = "S";
} 
?>

<h2>Resultado:</h2>
<table>
<tr>
<td>Sim:</td>
<td><img src="poll.gif"
width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes),2)); ?>%
</td>
</tr>
<tr>
<td>Nao:</td>
<td><img src="poll.gif"
width='<?php echo(100*round($no/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($no/($no+$yes),2)); ?>%
</td>
</tr>
</table>
<a href=index.php>Voltar</a>
