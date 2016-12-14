<?php 

  include "conexao.php";
  include "UsuarioDAO.php";
  include "UsuarioForm.php";
  include "funcoes.php";
  
  $acao = $_POST['acao'];
  $codusuario = $_POST['codusuario'];
  
  $usuarioForm = new UsuarioForm();
  $usuarioDAO = new UsuarioDAO();
  
if($acao=="alterar")
{  
  $usuarioForm->setCodusuario($codusuario);
  $usuarioForm = $usuarioDAO->getUsuario($usuarioForm);  
}

?>

<html>
<head>
<title></title>

<script language="javascript">
function gravar(){   
   if(validarform()){
       formcadastro.action = "usuarioAction.php";
  	   formcadastro.submit();	
   }
}
function validarform(){
	if (formcadastro.nome.value == "") {
    	alert('Informe o campo nome !');
	    formcadastro.nome.focus();
    	return(false);
	}
	if (formcadastro.usuario.value == "") {
    	alert('Informe o campo usuário !');
	    formcadastro.usuario.focus();
    	return(false);
	}
	if (formcadastro.senha.value =="") {
    	alert('Informe o campo senha  !');
	    formcadastro.senha.focus();
    	return(false);
	}
		if (formcadastro.cpf.value =="") {
    	alert('Informe o campo CPF  !');
	    formcadastro.cpf.focus();
    	return(false);
	}
		if (formcadastro.datanascimento.value =="") {
    	alert('Informe o campo Data de Nascimento  !');
	    formcadastro.datanascimento.focus();
    	return(false);
	}
		if (formcadastro.nomedamae.value =="") {
    	alert('Informe o campo Nome da Mae  !');
	    formcadastro.nomedamae.focus();
    	return(false);
	}
		if (formcadastro.nomedopai.value =="") {
    	alert('Informe o campo Nome do Pai  !');
	    formcadastro.nomedopai.focus();
    	return(false);
	}
		if (formcadastro.estado.value =="") {
    	alert('Informe o campo Estado  !');
	    formcadastro.estado.focus();
    	return(false);
	}
		if (formcadastro.cidade.value =="") {
    	alert('Informe o campo Cidade  !');
	    formcadastro.cidade.focus();
    	return(false);
	}
		if (formcadastro.bairro.value =="") {
    	alert('Informe o campo Bairro  !');
	    formcadastro.bairro.focus();
    	return(false);
	}
		if (formcadastro.rua.value =="") {
    	alert('Informe o campo Rua  !');
	    formcadastro.rua.focus();
    	return(false);
	}
	return(true);
}

function voltar(){   
   formcadastro.acao.value = "";
   formcadastro.action = "usuarioPesquisa.php";
   formcadastro.submit();	  
}

</script>

<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-image: url(images/Screenshot_21.jpg);
}
body,td,th {
	color: #F00;
	font-weight: bold;
	font-style: italic;
}
table{width:100%;margin:0;padding:0;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;color:#1c5d79}table,td,th,tr{border-collapse:collapse}caption{margin:0;padding:0;background:#f3f3f3;height:40px;line-height:40px;text-indent:28px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:left;letter-spacing:3px;border-top:dashed 1px #c2c2c2;border-bottom:dashed 1px #c2c2c2}thead{background-color:#FFF;border:none}thead tr th{height:32px;line-height:32px;text-align:center;color:#1c5d79;background-image:url(col_bg_new.gif);background-repeat:repeat-x;border-left:solid 1px #F90;border-right:solid 1px #F90;border-collapse:collapse}tbody tr{background:#dfedf3;font-size:13px}tbody tr.odd{background:azure}tbody tr.odd:hover,tbody tr:hover{background:#fff}tbody tr td,tbody tr th{padding:6px;border:1px solid #326e87}tbody tr th{background:#1c5d79;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:12px;padding:6px;text-align:center;font-weight:700;color:#FFF;border-bottom:solid 1px #fff}tbody tr th:hover{background:#fff}table a{color:#F60;text-decoration:none;font-size:13px;border-bottom:solid 1px #fff}table a:hover{color:#F90;border-bottom:none}tfoot{background:#f3f3f3;height:24px;line-height:24px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:center;letter-spacing:3px;border-top:solid 2px #326e87;border-bottom:dashed 1px #c2c2c2}tfoot tr th{border-top:solid 1px #326e87}tfoot tr td{text-align:right}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
 
<form name="formcadastro" enctype="multipart/form-data" method="post" action="">
  <input name="acao" type="hidden" value="<?php  echo $_POST['acao']; ?>">
  <input name="codusuario" type="hidden" value="<?php  echo $_POST['codusuario']; ?>">  
      <input type="hidden" name="arquivo" value="">
  <br>
  <table width="100%" border="1" image="Screenshot_21.jpg">
  <tr bgcolor="#CCCCCC">
    <td colspan="3"><span class="style1">Cadastro de Funcion&aacute;rio</span></td>
    </tr>
  <tr>
    <td colspan="3">
	  Nome: <br>      
	  <input name="nome" type="text" id="nome" size="74" value="<?php  echo $usuarioForm->getNome();?>">	</td>
    </tr>
  <tr>
    <td width="24%">CPF: 
      <input name="cpf" type="text" id="cpf" value="<?php echo $usuarioForm->getCpf();?>" size="15"></td>
    <td width="18%" height="50">Usu&aacute;rio: <br>
      <input name="usuario" type="text" id="usuario" size="15" value="<?php  echo $usuarioForm->getUsuario();?>"></td>
    <td width="58%">Senha: <br>
      <input name="senha" type="password" id="senha" size="15" value="<?php  echo $usuarioForm->getSenha();?>"></td>
  </tr>
  <tr>
    <td height="52" colspan="3"><p>Data de Nascimento:   
        <input name="datanascimento" type="text" id="datanascimento" value="<?php echo $usuarioForm->getDatanascimento();?>" size="20">
    </p>
      <p>Nome da M&atilde;e: 
        <input name="nomedamae" type="text" id="nomedamae" value="<?php echo $usuarioForm->getNomedamae();?>" size="50">
      </p>
      <p>Nome do Pai: 
        <input name="nomedopai" type="text" id="nomedopai" value="<?php echo $usuarioForm->getNomedopai();?>" size="50">
      </p></td>
  </tr>
  <tr>
    <td height="47" colspan="3"><p>Estado: 
        <input name="estado" type="text" id="estado" value="<?php echo $usuarioForm->getEstado();?>" size="40">
    </p>
      <p>Cidade: 
        <input name="cidade" type="text" id="cidade" value="<?php echo $usuarioForm->getCidade();?>" size="30">
      </p>
      <p>Bairro: 
        <input name="bairro" type="text" id="bairro" value="<?php echo $usuarioForm->getBairro();?>" size="40">
      </p>
      <p>Rua: 
        <input name="rua" type="text" id="rua" value="<?php echo $usuarioForm->getRua();?>" size="40">
      </p>
      <p>Numero da Casa: 
        <input name="ndacasa" type="text" id="ndacasa" value="<?php echo $usuarioForm->getNdacasa();?>" size="20">
      </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="62" colspan="3">
	<div align="center">  
	  <input name="btvoltar" type="button" value="Voltar" onClick="voltar()">
	  <input name="btgravar" type="button" value="Gravar" onClick="gravar()">
      
	</div></td>
  </tr>  

</table>
</form>
</body>
</html>
