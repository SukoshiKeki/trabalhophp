<?php 
  
  include "conexao.php";
  include "UsuarioDAO.php";
  include "UsuarioForm.php";
  include "funcoes.php";
  
  
  $acao = $_POST['acao'];
  $nometop = $_POST['nometop'];
  
  if($acao==""){ 
     $acao="pesquisar";
  }
  if($acao=="pesquisar")
  {  
   $usuarioForm  = new UsuarioForm();
	 $usuarioDAO   = new UsuarioDAO();
	 if($nometop!="")
	 {	    
		$usuarioForm->setNome($nometop);
	 }
	 $query  = $usuarioDAO->pesquisar($usuarioForm);
  }
  
  
?>

<html>
<head>
<title></title>
<script language="javascript">
function pesquisar(){  
  formlista.acao.value = "pesquisar";
  formlista.action = "usuarioPesquisa.php";
  formlista.submit();
}

function novo(){  
  formlista.acao.value = "novo";
  formlista.action = "usuarioCadastro.php";
  formlista.submit();
}

function abrir($codusuario){  
  formlista.acao.value = "alterar";
  formlista.codusuario.value = $codusuario;
  formlista.action = "usuarioCadastro.php";
  formlista.submit();
}


function excluir($codusuario){
 if(confirm("Deseja realmente excluir este registro","Exclusão"))
 {
   formlista.acao.value = "excluir";
   formlista.codusuario.value = $codusuario;
   formlista.action = "usuarioAction.php";
   formlista.submit();
 }
}
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
body{background-image: url(images/Screenshot_21.jpg);}
table{width:100%;margin:0;padding:0;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;color:#1c5d79}table,td,th,tr{border-collapse:collapse}caption{margin:0;padding:0;background:#f3f3f3;height:40px;line-height:40px;text-indent:28px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:left;letter-spacing:3px;border-top:dashed 1px #c2c2c2;border-bottom:dashed 1px #c2c2c2}thead{background-color:#FFF;border:none}thead tr th{height:32px;line-height:32px;text-align:center;color:#1c5d79;background-image:url(col_bg_new.gif);background-repeat:repeat-x;border-left:solid 1px #F90;border-right:solid 1px #F90;border-collapse:collapse}tbody tr{background:#dfedf3;font-size:13px}tbody tr.odd{background:azure}tbody tr.odd:hover,tbody tr:hover{background:#fff}tbody tr td,tbody tr th{padding:6px;border:1px solid #326e87}tbody tr th{background:#1c5d79;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:12px;padding:6px;text-align:center;font-weight:700;color:#FFF;border-bottom:solid 1px #fff}tbody tr th:hover{background:#fff}table a{color:#F60;text-decoration:none;font-size:13px;border-bottom:solid 1px #fff}table a:hover{color:#F90;border-bottom:none}tfoot{background:#f3f3f3;height:24px;line-height:24px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:center;letter-spacing:3px;border-top:solid 2px #326e87;border-bottom:dashed 1px #c2c2c2}tfoot tr th{border-top:solid 1px #326e87}tfoot tr td{text-align:right}
-->
</style>
</head>
<body>

<form name="formlista" method="post" action="">
  <p>
    <input name="acao" type="hidden" value="<?php  echo $_POST['acao']; ?>">
    <input name="codusuario" type="hidden" value="<?php  echo $_POST['codusuario']; ?>"></p>
  <table width="100%" border="1">
    <tr>
      <td colspan="3"><p><span class="style1">Cadastro de Integrantes</span><br>
  Nome:
  <input name="nometop" type="text" id="nometop" value="<?php //  echo $_POST['nometop']; ?>">
  <input name="img" type="image" src="images/gtk-find.gif" onClick="pesquisar()"  alt="PESQUISAR">
  <input name="img4" type="image" onClick="novo()" src="images/filenew.gif"  alt="NOVO" width="24" height="24">
      </p></td>
    </tr>
  </table>
  <table width="100%" border="1">
  <tr bgcolor="#CCCCCC">
    <td >&nbsp;</td>
    <td  bgcolor="#CCCCCC">Nome</td>
    <td >Usu&aacute;rio</td>
    <td >Senha</td>
    <td >CPF</td>
    <td >Nascimento</td>
    <td >Nome da Mae</td>
     <td >Nome do Pai</td>
      <td >Estado</td>
       <td >Cidade</td>
        <td >Bairro</td>
         <td >Rua</td>
          <td >Numero da Casa</td>
    
    <td width="8%">&nbsp;</td>
  </tr>
<?php  
 if($acao=="pesquisar")
 {  
  
   while($resultset = mysql_fetch_array($query))
   { 
 ?>
  <tr>
    <td><div align="center">
      <input name="img2" type="image" onClick="abrir(<?php  echo $resultset["codusuario"];?>)" src="images/fileopen.gif" width="24" height="24" alt ="EDITAR">
    </div></td>
    <td><?php  echo $resultset["nome"];?></td>
    <td><?php  echo $resultset["usuario"];?></td>
    <td><?php echo $resultset["senha"];?></td>
    <td><?php echo $resultset["cpf"];?></td>
    <td><?php echo $resultset["datanascimento"];?></td>
    <td><?php echo $resultset["nomedamae"];?></td>
    <td><?php echo $resultset["nomedopai"];?></td>
    <td><?php echo $resultset["estado"];?></td>
    <td><?php echo $resultset["cidade"];?></td>
    <td><?php echo $resultset["bairro"];?></td>
    <td><?php echo $resultset["rua"];?></td>
    <td><?php echo $resultset["ndacasa"];?></td>
    <td><div align="center">
      <input name="img3" type="image" onClick="excluir(<?php  echo $resultset["codusuario"];?>)" src="images/delete.gif" width="16" height="16" alt ="EXCLUIR">
    </div></td>
  </tr>  

<?php  
  }//fim while
} //fim acao

?>  
 <tr>
    <td colspan="5">Registros Encontrados [<?php  echo  mysql_num_rows($query); ?>]</td>
 </tr>
<?php 

 $usuarioForm->__destruct();
 $usuarioDAO->__destruct();
 mysql_close($conexao); 

?>
</table>
</form>
</body>
</html>
