<?php

   $conexao = mysql_connect("127.0.0.1", "root","vertrigo");
   $bd = mysql_select_db("cepep");    

   $excel .= "Clientes:\n";
    
   $excel .= "Nome\t";
   $excel .= "Email\t";
   $excel .= "Telefone\n";
   
    
   $sql  = " select * from cliente ";
   $query = mysql_query($sql);
  

   while($resultset  = mysql_fetch_array($query))
   {
	  $excel .= $resultset['nome']."\t";
      $excel .= $resultset['email']."\t";
      $excel .= $resultset['telefone']."\n";    
	  
   }
       
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=cliente.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    print "$excel";

?>