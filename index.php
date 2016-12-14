	                                                                                                                                                                                                                                                        <?php 
 //session_start();  
 //session_destroy();
?>
<html>
<head>
<title>TelePort E-Sports</title>

<script language="javascript">
function logar(){   
   if(validarform()){
       formlogin.action = "logar.php";
  	   formlogin.submit();	   
  } 
}
function validarform(){
	if (formlogin.usuario.value == "") {
    	alert('Informe o usuário !');
	    formlogin.usuario.focus();
    	return(false);
	}
	if (formlogin.senha.value == "") {
    	alert('Informe a senha !');
	    formlogin.senha.focus();
    	return(false);
	} 	
	return(true);
}

</script>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	color: #FF0000;
}
.style2 {color: #FFFFFF}
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
}

table{width:20%;height:50%;margin:0;padding:0;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;color:#1c5d79}table,td,th,tr{border-collapse:collapse}caption{margin:0;padding:0;background:#f3f3f3;height:50px;line-height:40px;text-indent:28px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:center;letter-spacing:3px;border-top:dashed 1px #c2c2c2;border-bottom:dashed 1px #c2c2c2}thead{background-color:#FFF;border:none}thead tr th{height:32px;line-height:32px;text-align:center;color:#1c5d79;background-image:url(col_bg_new.gif);background-repeat:repeat-x;border-left:solid 1px #F90;border-right:solid 1px #F90;border-collapse:collapse}tbody tr{background:#dfedf3;font-size:13px}tbody tr.odd{background:azure}tbody tr.odd:hover,tbody tr:hover{background:#fff}tbody tr td,tbody tr th{padding:6px;border:1px solid #326e87}tbody tr th{background:#1c5d79;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:12px;padding:6px;text-align:center;font-weight:700;color:#FFF;border-bottom:solid 1px #fff}tbody tr th:hover{background:#fff}table a{color:#F60;text-decoration:none;font-size:13px;border-bottom:solid 1px #fff}table a:hover{color:#F90;border-bottom:none}tfoot{background:#f3f3f3;height:24px;line-height:24px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:center;letter-spacing:3px;border-top:solid 2px #326e87;border-bottom:dashed 1px #c2c2c2}tfoot tr th{border-top:solid 1px #326e87}tfoot tr td{text-align:right}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body background="images/team_graves_2.jpg">

<form name="formlogin" method="post" action="">
  <br>
  <br>
  <table width="23%" border="1" align="center">
  <tr>
    <td bgcolor="#000099"><span class="style1"><b>Login</b></span> </td>
    </tr>
  <tr>
    <td width="31%"> Usu&aacute;rio: <br>      
	  <input name="usuario" type="text" id="usuario" size="15" value="">	</td>
    </tr>
  <tr>
    <td>
	  Senha:<br>
      <input name="senha" type="password" id="senha" value="" size="15">
      <br>
	  <span class="style2">
	  <div align="center">
	  <?php 
	    $erro = $_GET["erro"];
		echo $erro;
	  ?>
	  </div>
	  </span> </td>
  </tr>
  <tr>
    <td>
	<div align="center">  
	  <input name="btlogin" type="button" value="Logar" onClick="logar()">
	</div></td>	
  </tr>  

</table>
</form>
</body>
</html>
