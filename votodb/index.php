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

<body>

<div id="container">
      <span id="question">What is your favorite server side language?</span>
      <div><span>0</span><a href="">Vote</a>PHP</div>
      <div><span>0</span><a href="">Vote</a>Ruby</div>
      <div><span>0</span><a href="">Vote</a>Java</div>
      <div><span>0</span><a href="">Vote</a>ASP</div>
      <div><span>0</span><a href="">Vote</a>Perl</div>
      <div><span>0</span><a href="">Vote</a>ColdFusion</div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#container div a").click(function() {
        $(this).parent().animate({
           width: '+=100px'
        }, 500);

        $(this).prev().html(parseInt($(this).prev().html()) + 1);
        return false;
    });
});
</script>
</html>
