<?php

 $enviada=false;

if ($btacao=="Enviar e-Mail")
{

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: $rementente\r\n";
	if (mail($destinatario, $titulo, $mensagem, $headers))
	{
		$enviada=true;
	}

}

?>
<html>
<head>
<title>Envio de e-mail</title>
</head>

<body>
<form name="frmmail" method="post" action="" target="_self">
  <table width="64%" border="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <tr valign="top">
      <td colspan="2" bordercolor="#CCCCCC">Enviando Email com PHP </td>
    </tr>
    <tr valign="top">
      <td bordercolor="#CCCCCC"><font size="1" face="ARIAL">DE:</font></td>
      <td bordercolor="#CCCCCC"><font size="1" face="ARIAL">
        <input name="rementente" type="text" id="rementente" value="<?php  echo $rementente; ?>" size="64">
      </font></td>
    </tr>
    <tr valign="top">
      <td width="10%" bordercolor="#CCCCCC"><font size="1" face="ARIAL"> PARA:</font></td>
      <td width="90%" bordercolor="#CCCCCC"><p><font size="1" face="ARIAL">
          <input name="destinatario" type="text" id="destinatario" value="<?php echo $destinatario;?>" size="64">
      </font></p></td>
    </tr>
    <tr valign="top">
      <td bordercolor="#CCCCCC"><font size="1" face="ARIAL">TITULO:</font></td>
      <td bordercolor="#CCCCCC"> <font size="1" face="ARIAL">
        <input name="titulo" type="text" id="titulo" value="<?php echo $titulo;?>" size="64">
      </font></td>
    </tr>
    <tr valign="top">
      <td bordercolor="#CCCCCC"><font size="1" face="ARIAL">MENSAGEM: </font></td>
      <td bordercolor="#CCCCCC">
        <textarea name="mensagem" cols="60" rows="8" id="mensagem"><?php echo $mensagem;?></textarea></td>
    </tr>
    <tr valign="top">
      <td bordercolor="#CCCCCC">&nbsp;</td>
      <td bordercolor="#CCCCCC">
      <?php
      if($enviada)
      {
         echo "Email Enviada com sucesso!";
      }else{
      ?>
        <input name="btacao" type="submit" id="btacao" value="Enviar e-Mail">
      <?php
      }
      ?>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
