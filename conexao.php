<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$conexao = mysql_connect("localhost", "root","");
if (!$conexao) {
	echo "<br>conexao n�o foi aberta";
}else{
  //  echo "conectado!"; 
}
$bd = mysql_select_db("escola");
if (!$bd){
	echo "<br>banco n�o selecionado";
}


?>
