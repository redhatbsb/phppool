<?php
session_start();
?>
<html>
<head>
<script>
function getVote(int) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<?php
if(!isset($_SESSION["votou"])) {
?>
<div id="poll">
<h3><?php echo getenv("PERGUNTA");?></h3>
<form>
Sim: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
Não: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>
<?php
} else {
echo "Ja votou?<a href=\"poll_vote.php\">Ver resultados</a>";
}
?>
</body>
</html>
