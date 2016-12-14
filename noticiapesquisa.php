<?php  
include ('conexao.php');
include ('funcoes.php');


if ($_POST['acao']=="excluir") 
{
  $sql = " delete from noticias ";
  $sql .= " where codnoticia = ".$_POST['codnoticia'];  
  $querydelete = mysql_query($sql);
  $_POST['acao']="pesquisar";
}

if($_POST['acao']=="" or $_POST['acao']=="voltar")
{
 $_POST['acao']="pesquisar";
}


?>

<html>
<head>
<title></title>
<script language="javascript">
function pesquisar(){  
  formlista.acao.value = "pesquisar";
  formlista.action = "noticiapesquisa.php";
  formlista.submit();
}

function novo(){  
  formlista.acao.value = "novo";
  formlista.action = "noticiacadastro.php";
  formlista.submit();
}

function abrir($codnoticia){  
  formlista.acao.value = "abrir";
  formlista.codnoticia.value = $codnoticia;
  formlista.action = "noticiacadastro.php";
  formlista.submit();
}


function excluir($codnoticia){
 if(confirm("Deseja realmente excluir este registro","Exclusão"))
 {
   formlista.acao.value = "excluir";
   formlista.codnoticia.value = $codnoticia;
   formlista.action = "noticiapesquisa.php";
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
	color: #000000;
}
.style2 {color: #FFFFFF}
.style3 {color: #000000}
body{background-image: url(images/Screenshot_21.jpg);}
table{width:100%;margin:0;padding:0;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;color:#1c5d79}table,td,th,tr{border-collapse:collapse}caption{margin:0;padding:0;background:#f3f3f3;height:40px;line-height:40px;text-indent:28px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:left;letter-spacing:3px;border-top:dashed 1px #c2c2c2;border-bottom:dashed 1px #c2c2c2}thead{background-color:#FFF;border:none}thead tr th{height:32px;line-height:32px;text-align:center;color:#1c5d79;background-image:url(col_bg_new.gif);background-repeat:repeat-x;border-left:solid 1px #F90;border-right:solid 1px #F90;border-collapse:collapse}tbody tr{background:#dfedf3;font-size:13px}tbody tr.odd{background:azure}tbody tr.odd:hover,tbody tr:hover{background:#fff}tbody tr td,tbody tr th{padding:6px;border:1px solid #326e87}tbody tr th{background:#1c5d79;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:12px;padding:6px;text-align:center;font-weight:700;color:#FFF;border-bottom:solid 1px #fff}tbody tr th:hover{background:#fff}table a{color:#F60;text-decoration:none;font-size:13px;border-bottom:solid 1px #fff}table a:hover{color:#F90;border-bottom:none}tfoot{background:#f3f3f3;height:24px;line-height:24px;font-family:"Trebuchet MS",Trebuchet,Arial,sans-serif;font-size:14px;font-weight:700;color:#555d6d;text-align:center;letter-spacing:3px;border-top:solid 2px #326e87;border-bottom:dashed 1px #c2c2c2}tfoot tr th{border-top:solid 1px #326e87}tfoot tr td{text-align:right}
-->
</style>
</head>
<body>

<form name="formlista" method="post" action="">
  <input name="acao" type="hidden" value="<?php  echo $_POST['acao']; ?>">
  <input name="codnoticia" type="hidden" value="<?php  echo $_POST['codnoticia']; ?>">  
  <table width="100%" border="1">
    <tr>
      <td colspan="3"><p><span class="style1">Cadastro Noticia</span> <span class="style3"><br>
        Titulo:
          <input name="noticiapesquisa" type="text" id="noticiapesquisa" value="<?php // echo $_POST['noticiapesquisa']; ?>">
      </span><span class="style2"><input name="img" type="image" src="images/gtk-find.gif" onClick="pesquisar()"  alt="PESQUISAR">
<input name="img4" type="image" onClick="novo()" src="images/filenew.gif"  alt="NOVO" width="24" height="24">
      </span></p>      </td>
    </tr>
  </table>
  <table width="100%" border="1">
  <tr bgcolor="#CCCCCC">
    <td width="6%">&nbsp;</td>
    <td width="18%">Titulo</td>
    <td width="33%" bgcolor="#CCCCCC">Noticia</td>
    <td width="22%">Data</td>
    <td width="16%">Classifica&ccedil;&atilde;o</td>
    <td width="5%">&nbsp;</td>
  </tr>
<?php  

if ($_POST['acao']=="pesquisar") 
{
  $sql = " select noticias.* ,classificacao.classificacao from noticias  ";
  $sql .= " left join classificacao on ";
  $sql .= " noticias.codclassificacao = classificacao.codclassificacao ";

  if ($_POST['noticiapesquisa']!="")
  {
    $sql .= " where titulo like '%".$_POST['noticiapesquisa']."%' ";
  }  
//echo $sql;
  $query  =  mysql_query("$sql");
  while($resultset = mysql_fetch_array($query))
  {
?>    
  <tr>
    <td><div align="center">
      <input name="img2" type="image" onClick="abrir(<?php  echo $resultset["codnoticia"];?>)" src="images/fileopen.gif" width="24" height="24" alt ="EDITAR">
    </div></td>
    <td><?php  echo $resultset["titulo"];?></td>
    <td><?php  echo $resultset["noticia"]." codigo:".$resultset["codnoticia"];?></td>
    <td><?php  echo toDateDMY($resultset["data"]);?></td>
    <td><?php  echo $resultset["classificacao"];?>&nbsp;</td>
    <td><div align="center">
      <input name="img3" type="image" onClick="excluir(<?php  echo $resultset["codnoticia"];?>)" src="images/delete.gif" width="16" height="16" alt ="<?php  echo $resultset["codnoticia"];?>">
    </div></td>
  </tr>  
<?php 
 } 
 
 ?>
 <tr>
    <td colspan="6">registros encontrados [<?php  echo  mysql_num_rows($query); ?>]</td>
    </tr>

<?php  
}
?>  
</table>

</form>
<?php  
  mysql_close($conexao);
?>
</body>
</html>
