<?php 
 session_start();
 
  if(empty($_SESSION['codusuario_session'])){
    header("Location: index.php?erro=É necessário efetuar login no sistema!");  	 
  }

  //echo $_SESSION['codusuario_session'];
  //echo $_SESSION['nome_session'];

  
?>
<html>
<head>
<title>TelePort E-Sports</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<frameset rows="150,*" cols="*" frameborder="NO" border="0" framespacing="0">
  <frame src="top.php" name="top" scrolling="NO" noresize >
  <frameset rows="*" cols="220,*" framespacing="0" frameborder="NO" border="0">
    <frame src="left.php" name="left" scrolling="NO" noresize>
    <frame src="main.php" name="main">
  </frameset>
</frameset>
<noframes><body background="images/team_graves_2.jpg">
</body></noframes>
</html>
