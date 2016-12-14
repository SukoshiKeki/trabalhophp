<?php  
session_start();
?>

<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;	
	font-size: 24px;



}
-->
<!--
body {
	background-image: url(images/banner.png);
	background-repeat: no-repeat;
  max-width:100%;

}

body,td,th {
	font-family: "Times New Roman", Times, serif;
	font-style: italic;
	font-weight: bold;

}
-->
</style></head>
<div class="style10">
<body>
<span class="style6">
  Bem Vindo <span class="style1"><?php  echo $_SESSION['nome_session']."-".$_SESSION['codusuario_session'];;?></span> a Administra&ccedil;&atilde;o do Site ! 
</span>
</body>
</div>

</body>
</html>

