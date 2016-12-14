<?php 
 session_start();
 include ('conexao.php'); 
 
   $usuario = $_POST["usuario"];
   $senha = $_POST["senha"];
    
	
	$sql  = " select * from usuario    ";
    $sql .= " where usuario = '$usuario' and senha = '$senha' ";	 
	//echo $sql;
    $query	 = mysql_query($sql); 
	$resultset  = mysql_fetch_array($query);	 
    if(mysql_num_rows($query)>0)
	{       
	   $_SESSION['codusuario_session'] = $resultset['codusuario'];	  	   
	   $_SESSION['nome_session'] = $resultset['nome'];	  	   
	   
	   header("Location: principal.php");  	 
    }
	else
	{
	   header("Location: index.php?erro=Usuário invalido!");  	 
	}
    
/*	
	 include "UsuarioDAO.php";
 include "UsuarioForm.php";
 
    $usuarioForm = new UsuarioForm();
    $usuarioDAO = new UsuarioDAO();

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
	
	$usuarioForm->setUsuario($usuario);
	$usuarioForm->setSenha($senha);
	
	$query = $usuarioDAO->logar($usuarioForm);		 
	$resultset  = mysql_fetch_array($query);	 
    if(mysql_num_rows($query)>0)
	{       
	   $_SESSION['codusuario_session'] = $resultset['codusuario'];	  	   
	   $_SESSION['nome_session'] = $resultset['nome'];	  	   
	   
	   header("Location: principal.php");  	 
    }
	else
	{
	   header("Location: index.php?erro=Usuário invalido!");  	 
	}

	*/

?>