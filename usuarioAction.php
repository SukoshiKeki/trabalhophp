<?php 
  include "conexao.php";
  include "UsuarioDAO.php";
  include "UsuarioForm.php";
  include "funcoes.php";

  $acao = $_POST['acao'];
  
if($acao=="novo"){

  $nome    = $_POST['nome'];
  $usuario = $_POST['usuario'];
  $senha   = $_POST['senha'];
  $cpf   = $_POST['cpf'];
  $datanascimento   = $_POST['datanascimento'];
  $nomedamae   = $_POST['nomedamae'];
  $nomedopai   = $_POST['nomedopai'];
  $estado   = $_POST['estado'];
  $cidade   = $_POST['cidade'];
  $bairro   = $_POST['bairro'];
  $rua   = $_POST['rua'];
  $ndacasa   = $_POST['ndacasa'];

  $usuarioForm = new UsuarioForm();
  $usuarioDAO  = new UsuarioDAO();
  
  $usuarioForm->setNome($nome);
  $usuarioForm->setUsuario($usuario);
  $usuarioForm->setSenha($senha);
  $usuarioForm->setCpf($cpf);
  $usuarioForm->setDatanascimento($datanascimento);
  $usuarioForm->setNomedamae($nomedamae);
  $usuarioForm->setNomedopai($nomedopai);
  $usuarioForm->setEstado($estado);
  $usuarioForm->setCidade($cidade);
  $usuarioForm->setBairro($bairro);
  $usuarioForm->setRua($rua);
  $usuarioForm->setNdacasa($ndacasa);


  
  
  
  
  
  
  $usuarioDAO->insert($usuarioForm);
  
  header("Location:usuarioPesquisa.php");
  
}





if($acao=="alterar"){

  $usuarioForm = new UsuarioForm();
  $usuarioDAO  = new UsuarioDAO();

  $codusuario = $_POST['codusuario']; 
  $nome       = $_POST['nome'];
  $usuario    = $_POST['usuario'];
  $senha      = $_POST['senha'];
  $cpf       = $_POST['cpf'];
  $datanascimento       = $_POST['datanascimento'];
  $nomedamae       = $_POST['nomedamae'];
  $nomedopai       = $_POST['nomedopai'];
  $estado       = $_POST['estado'];
  $cidade       = $_POST['cidade'];
  $bairro       = $_POST['bairro'];
  $rua       = $_POST['rua'];
  $ndacasa       = $_POST['ndacasa'];
  
  
  
  
  
  $usuarioForm->setCodusuario($codusuario);      
  $usuarioForm->setNome($nome);
  $usuarioForm->setUsuario($usuario);
  $usuarioForm->setSenha($senha);
  $usuarioForm->setCpf($cpf);
  $usuarioForm->setNomedamae($nomedamae);
  $usuarioForm->setNomedopai($nomedopai);
  $usuarioForm->setEstado($estado);
  $usuarioForm->setCidade($cidade);
  $usuarioForm->setBairro($bairro);
  $usuarioForm->setRua($rua);
  $usuarioForm->setNdacasa($ndacasa);






  $usuarioDAO->update($usuarioForm);  
  
  header("Location:usuarioPesquisa.php");
  
}


if($acao=="excluir"){

  $usuarioForm = new UsuarioForm();
  $usuarioDAO = new UsuarioDAO();
  
  $codusuario = $_POST['codusuario'];
  
  $usuarioForm->setCodusuario($codusuario);
  $usuarioDAO->delete($usuarioForm);
  header("Location:usuarioPesquisa.php");
  
}





?>