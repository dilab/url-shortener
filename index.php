<!-- 
/**
*@author  XuDing
*@email   hello@startutorial.com
*@website http://www.startutorial.com
**/
 -->
<html>
<head>
<style>
body{
	width:100%;
	margin:0px;
	padding:0px;
}

#container{
	font-family: Arial, serif; 
	font-size:12px;	
	padding-top:20px;
	width:700px;
	margin: auto;	
}

form{
 	width:100%;
 	padding: 0px;
 	margin: 0px;
}

form fieldset{
	padding:20px;
}

form input{
	padding:5px;
	font-size:14px;
}

form input[type=text]{
	float:left;
 	width:80%;
 	border: 1px solid #CCCCCC;
}

form input[type=submit]{
	width:10%;
	margin-left:5px;
	float:left;
	border: 1px solid #CCCCCC;
    background: #DDDDDD;
    cursor: pointer;
}

div.loading{
	display:none;
	margin:5px;
	float:left;
	width:16px;
	height:16px;
	background-image: url("load.gif");
	background-repeat: no-repeat;
	background-position: top left;
	background-color: transparent;
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#form').submit(function(){			
			$.ajax({
			   type: "POST",
			   url: "gen.php",
			   data: $(this).serialize(),
			   beforeSend: function(){
				 $('.loading').show(1);
			   },
			   complete: function(){
				 $('.loading').hide(1);
			   },
			   success: function(data){
				 $('#short').val(data);
			   }
			 });
			return false;
		});
	});
</script>
</head>

<body>
<div id="container">
	<h1>Google URL Shortener</h1>
	<div id="generator">
		<form id="form" action="#" method="post">		  
		  <fieldset>		  
		    <input type="text" name="url" id="short">	
		    <input type="submit" value="Shorten"></input>    
		    <div class="loading"></div>    
		  </fieldset>
		</form>
	</div>
</div>
</body>
</html>