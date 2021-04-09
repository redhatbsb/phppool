<?php
error_reporting(0);
session_start();
if(getenv("PERGUNTA") != "") { 
	$pergunta = getenv("PERGUNTA");
} else {
	$pergunta = "Café ou Chá?";
}

if(getenv("OPCAO1") != "") { 
	$opcao1 = getenv("OPCAO1");
} else {
	$opcao1 = "Café";
}

if(getenv("OPCAO2") != "") { 
	$opcao2 = getenv("OPCAO2");
} else {
	$opcao2 = "Chá?";
}

?>
<html>
<head>
<style>
* {
        font-family: Arial, "Free Sans";
    }
    #container {
        color: #fff;
  background:#000;
    }
    #container #question {
        display: block;
        padding: 20px;
        font-weight: bold;
        letter-spacing: -3px;
        margin-bottom: 20px;
        padding: 10px;
        font-size: 40px;
    }
    #container div {
        font-weight: bold;
        letter-spacing: -3px;
        background: #0099cc;
        margin-bottom: 15px;
        padding: 10px;
        font-size: 34px;
        color: #ffffff;
        border-left: 20px solid #333;
        width: 400px;
        -webkit-border-radius: 0.5em;
        -moz-border-radius: 0 0.5em 0.5em 0;
        border-radius: 0 1.5em 1.5em 0;
    }
    #container div a {
        border-radius: 0.3em;
        text-decoration: none;
        color: #0099cc;
        padding: 5px 15px;
        background: #333;
        margin: 0 20px;
    }
    #container div a:hover {
        color: #fff;
    }
    body {
        margin: 0;
        padding: 0;
    }
</style>
</head>

<body bgcolor="#000000">
<?php
$filename = "/tmp/poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
if($yes == "") {
$yes = 0;
}
if($no == "") {
$no = 0;
}
?>
<div id="container">
      <span id="question"><?php echo $pergunta;?></span>
      <div id="yes"><span id="yes"><?php echo $yes;?></span><a href="">Votar</a><?php echo $opcao1;?></div>
      <div id="no"><span id="no"><?php echo $no;?></span><a href="">Votar</a><?php echo $opcao2;?></div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
        // Yes
        for (let i = 1; i < <?php echo $yes;?>; i++) {
                setTimeout(function timer() {
                        $("#yes").animate({width: '+=100px'}, 500);
                }, i * 100);
        }

        // No
        for (let i = 1; i < <?php echo $no;?>; i++) {
                setTimeout(function timer() {
                        $("#no").animate({width: '+=100px'}, 500);
                }, i * 100);
        }

    $("#container div a").click(function() {
	<?php
	if(!isset($_SESSION['votou'])) {
?>
        $(this).parent().animate({
           width: '+=100px'
        }, 500);

        $(this).prev().html(parseInt($(this).prev().html()) + 1);

        //alert($(this).prev().attr('id'));
        if($(this).prev().attr('id') == "yes") {
                getVote(0);
        } else {
                getVote(1);
        }
<?php
	}
?>
        return false;
    });

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
});
</script>
</html>
