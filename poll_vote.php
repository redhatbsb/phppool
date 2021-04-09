<?php
start_session();
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
$filename = "/tmp/poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
?>
