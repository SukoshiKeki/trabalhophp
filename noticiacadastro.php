<?php 
include ('conexao.php');
include ('funcoes.php');


if ($_POST['acao']=="gravar") 
{
  $sql  = "insert into noticias ";
  $sql .= "(titulo,noticia,data,codclassificacao)";
  $sql .= "values";  
  $sql .= "('".$_POST['titulo']."','".$_POST['noticia']."','".
  toDateYMD($_POST['data'])."',".$_POST['codclassificacao'].")";  
  $querygravar = mysql_query($sql);
  
  $sql   = " SELECT max(codnoticia) as maior FROM noticias ";
  $queryultimo = mysql_query($sql);
  $resultsetultimo = mysql_fetch_array ($queryultimo);	
  $_POST['codnoticia'] = $resultsetultimo['maior']; 

}

if ($_POST['acao']=="editar") 
{
  $sql  = " update noticias set ";
  $sql .= " titulo = '".$_POST['titulo']."', ";
  $sql .= " noticia = '".$_POST['noticia']."', ";
  $sql .= " codclassificacao = ".$_POST['codclassificacao'].", ";
  $sql .= " data = '".toDateYMD($_POST['data'])."' ";
  $sql .= " where codnoticia =".$_POST['codnoticia'];      
  $querygravar = mysql_query($sql);
  header("Location: noticiapesquisa.php");  
}


if ($_POST['acao']=="novo") 
{
   $_POST['acao']="gravar";
   $_POST['codnoticia']="";  
}

if ($_POST['acao']=="abrir") 
{
   $_POST['acao']="editar";  
}

if($_POST['codnoticia']!="")
{
  $sql = " select * from noticias ";
  $sql .= " where codnoticia = ".$_POST['codnoticia']; 
  $query  =  mysql_query($sql);  
  $resultset = mysql_fetch_array($query);  
  $codclassificacao = $resultset["codclassificacao"];
  
}

if ($_POST['acao']=="uploadpicture")
{

    $arquivo = isset($_FILES['userfile']) ? $_FILES['userfile'] : FALSE; 

	echo "Iniciando Upload de:".$arquivo['name']."<br>";	
	$upfile="C:/Arquivos de programas/VertrigoServ/www/cepep/imagesnoticias/".$_POST['codnoticia']."/".$arquivo['name'];
	
	if (!move_uploaded_file($arquivo['tmp_name'],$upfile)){
			echo $_FILES['userfile']['error'];
			echo "Problema: não pode mover arquivo para o diretorio";
	}else{
			echo "Upload com sucesso!!<br><br>"; 
   }

   $_POST['acao']="editar";
}

if ($_POST['acao']=="deletepicture")
{
        
		$delfile="C:/Arquivos de programas/VertrigoServ/www/cepep/imagesnoticias/".$_POST['codnoticia']."/".$_POST['arquivo'];
		echo "Excluindo arquivo:".$arquivo['name']."<br>";
		unlink($delfile);
    	$_POST['acao']="editar";	
}





?>

<html>
<head>
<title></title>

<script language="javascript">
function gravar(){   
   if(validarform()){
       formcadastro.action = "noticiacadastro.php";
  	   formcadastro.submit();	
   }
}
function validarform(){
	if (formcadastro.titulo.value == "") {
    	alert('Informe o campo titulo !');
	    formcadastro.titulo.focus();
    	return(false);
	}
	if (formcadastro.noticia.value == "") {
    	alert('Informe o campo Noticia !');
	    formcadastro.noticia.focus();
    	return(false);
	}
	if (formcadastro.codclassificacao.value ==0) {
    	alert('Informe a classificação !');
	    formcadastro.codclassificacao.focus();
    	return(false);
	}
	if (formcadastro.data.value == "") {
    	alert('Informe o campo Data !');
	    formcadastro.data.focus();
    	return(false);
	}	
	return(true);
}

function voltar(){   
   formcadastro.acao.value = "voltar";
   formcadastro.action = "noticiapesquisa.php";
   formcadastro.submit();	  
}

function deletepicture($xarquivo){
	 formcadastro.acao.value="deletepicture";
	 formcadastro.arquivo.value=$xarquivo;
	 formcadastro.action="noticiacadastro.php";
}

function uploadpicture(){	 
	 formcadastro.acao.value="uploadpicture";
	 formcadastro.action="noticiacadastro.php";
}




</script>

<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
}
body{
	background-image: url(images/Screenshot_21.jpg);
}
table{width:100%;margin:0;padding:0;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;color:#1c5d79}table,td,th,tr{border-collapse:collapse}caption{margin:0;padding:0;background:#f3f3f3;height:40px;line-height:40px;text-indent:28px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:left;letter-spacing:3px;border-top:dashed 1px #c2c2c2;border-bottom:dashed 1px #c2c2c2}thead{background-color:#FFF;border:none}thead tr th{height:32px;line-height:32px;text-align:center;color:#1c5d79;background-image:url(col_bg_new.gif);background-repeat:repeat-x;border-left:solid 1px #F90;border-right:solid 1px #F90;border-collapse:collapse}tbody tr{background:#dfedf3;font-size:13px}tbody tr.odd{background:azure}tbody tr.odd:hover,tbody tr:hover{background:#fff}tbody tr td,tbody tr th{padding:6px;border:1px solid #326e87}tbody tr th{background:#1c5d79;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:12px;padding:6px;text-align:center;font-weight:700;color:#FFF;border-bottom:solid 1px #fff}tbody tr th:hover{background:#fff}table a{color:#F60;text-decoration:none;font-size:13px;border-bottom:solid 1px #fff}table a:hover{color:#F90;border-bottom:none}tfoot{background:#f3f3f3;height:24px;line-height:24px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:center;letter-spacing:3px;border-top:solid 2px #326e87;border-bottom:dashed 1px #c2c2c2}tfoot tr th{border-top:solid 1px #326e87}tfoot tr td{text-align:right}
-->
</style>
</head>
<body>
 
<form name="formcadastro" enctype="multipart/form-data" method="post" action="">
  <input name="acao" type="hidden" value="<?php  echo $_POST['acao']; ?>">
  <input name="codnoticia" type="hidden" value="<?php  echo $_POST['codnoticia']; ?>">  
      <input type="hidden" name="arquivo" value="">
  <br>
  <table width="100%" border="1">
  <tr>
    <td bgcolor="#CCCCCC"><span class="style1">Cadastro Noticia</span> </td>
    </tr>
  <tr>
    <td width="31%">
	  Titulo: <br>      
	  <input name="titulo" type="text" id="titulo" size="74" value="<?php  echo $resultset["titulo"];?>">
	</td>
    </tr>
  <tr>
    <td>
	  noticia:<br>
      <textarea name="noticia" cols="70" rows="5" id="noticia" ><?php  echo $resultset["noticia"];?></textarea>
	</td>
  </tr>
  <tr>
    <td>
	<select name="codclassificacao"  id="codclassificacao"  >
	<option selected value="0">Selecione uma Classificação</option>
	<?php  	
	  $sql = "select * from classificacao order by classificacao";
	  $queryclassificacao = mysql_query($sql);
	  while ($rsclassificacao = mysql_fetch_array($queryclassificacao)){
			if ($rsclassificacao['codclassificacao']== $codclassificacao)
				echo "<option selected value='$rsclassificacao[0]'>".$rsclassificacao[1]."</option>";
			else
				echo "<option value='$rsclassificacao[0]'>".$rsclassificacao[1]."</option>";
		}
	?>
    </select>
	</td>
  </tr>
  <tr>
    <td>Data: <br>
      <input name="data" type="text" id="data" size="15" value="<?php  echo toDateDMY($resultset["data"]); ?>"></td>
  </tr>
  <tr>
    <td>
	
	<?php  
	
	if($_POST['codnoticia']!=""){
	
	?>
	
	<table width="100%">
      <tr bgcolor="#EBEBEB">
        <td colspan="2" bgcolor="#EBEBEB"><font size="1" face="arial">NEW PICTURE
              <input name="userfile" type="file" id="userfile"  style="font-family: Arial; font-size: 10 px;" size="20">
              <input name="imageField" type="image" src="images/fileopen.gif" alt="UPLOAD DA IMAGEM" align="middle" width="24" height="24" border="0" onClick="uploadpicture()">
        </font></td>
      </tr>
      <tr>
        <td colspan="2"> <font size="1" face="arial">
          <?php
							$codnoticia = $_POST['codnoticia'];
		
							$filepath="imagesnoticias/";
							$filepath.=$codnoticia;								
							if (!file_exists($filepath)) {								
								mkdir($filepath); 		
							}
				
							$d = dir($filepath);
							$i=0;
							while (false !== ($entry = $d->read())) 
							{
										$i=$i+1;
							}
							$fotos= array($i);
							$d->rewind();
							$i=0;
							while (false !== ($entry = $d->read())) 
							{
								if ($entry != "." && $entry != "..") 
								{ 
											$i=$i+1;
											$fotos[$i]=$entry;
								}
							}
							sort($fotos);
							reset($fotos);

						    $i=0;
						    $k=0;
						    while (list ($key, $val) = each ($fotos))
						    {
								$k = $k + 1;
								$i = $i + 1;
								if ($i==1){
?>
          </font>
            <table width="100%" border=0 align="center" cellspacing="0">
              <tr>
                <?php 
										}//if
										$arquivo="./imagesnoticias/".$codnoticia."/".$val;
?>
                <td align="center"> <font size="1" face="arial">
                  <?php
												  if (strlen(strstr($val,"."))>0){
													if (strtoupper(substr($val,strlen($val)-4))==".AVI" or strtoupper(substr($val,strlen($val)-4))==".MPG"){
														echo "<embed src='$arquivo'></embed><br>";
													}else{
														echo "<img src='$arquivo' width=200 alt='$arquivo' ><br>";
													}
?>
                  </font>
                    <table width="200" border="1" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="94%"><div align="left"><font size="1" face="arial"><?php echo substr($val, 0);?></font></div></td>
                        <td width="6%"><div align="right"><font size="1" face="arial"><font color="#000000"><strong>
                            <input name="imageField25234" type="image" onClick="deletepicture('<?php echo substr($val, 0);?>')" src="images/delete.gif" alt="EXCLUIR A IMAGEM" align="middle" width="16" height="16" border="0">
                        </strong></font></font></div></td>
                      </tr>
                    </table>
                    <font size="1" face="arial">
                    <?php 
								   }
						
				   ?>
                  </font></td>
                <?php 
						
				if ($i==2) 
				{
			  	   $i=0;
						
				?>
              </tr>
            </table>
            <font size="1" face="arial">
<?php 
				}//if
				
			}//while
	
			$d->close();						

	
?>
          </font></td>
      </tr>
    </table>
<?php  
     }		

?>	
	
	</td>
  </tr>
  <tr>
    <td>
	<div align="center">  
	  <input name="btvoltar" type="button" value="Voltar" onClick="voltar()">
	  <input name="btgravar" type="button" value="Gravar" onClick="gravar()">
      
	</div></td>
  </tr>  

</table>
</form>
<?php 
  mysql_close($conexao);
?>
</body>
</html>
