<?php 

/*
 * Classe DAO do Usuário
*/
class UsuarioDAO{

	/*
	* Buscando os usuarios 
	*/
	
       public function pesquisar($usuarioForm)
	   {

		    $sql  = " select codusuario, nome, usuario , senha  from usuario                    ";
		    $sql .= " where 1 = 1                                                               ";
		    // Verificando criterios de selecao
            if ($usuarioForm->getCodusuario() != ""){
			$sql .= " and codusuario in (".$usuarioForm->getCodusuario().")                     ";
		    }
		    if ($usuarioForm->getNome() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getNome()."%')                      ";
		    }
			if ($usuarioForm->getUsuario() != ""){
			$sql .= " and usuario = '".$usuarioForm->getUsuario()."'                            ";
		    }
			if ($usuarioForm->getSenha() != ""){
			$sql .= " and senha = '".$usuarioForm->getSenha()."'                                ";
		    }
			
			if ($usuarioForm->getCpf() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getCpf()."%')                      ";	  
			}
				if ($usuarioForm->getNomedamae() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getNomedamae()."%')                      ";	  
			}
			 	if ($usuarioForm->getNomedopai() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getNomedopai()."%')                      ";	  
			} 				
				if ($usuarioForm->getEstado() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getEstado()."%')                      ";	  
			}
				if ($usuarioForm->getCidade() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getCidade()."%')                      ";	  
			}
				if ($usuarioForm->getBairro() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getBairro()."%')                      ";	  
			}
				if ($usuarioForm->getRua() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getRua()."%')                      ";	  
			}
				if ($usuarioForm->getNdacasa() != ""){
			$sql .= " and nome like upper('%".$usuarioForm->getNdacasa()."%')                      ";	  
			}
		    $sql .= " order by nome                                                             ";
			
			return mysql_query("$sql"); 

	}// Fim do metodo pesquisar()


	/*
	* Inserindo um usuário
	*/
	public function insert($usuarioForm)
	{
		
        $sql  = " insert into usuario                       ";
		$sql .= " (nome,                                    ";
		$sql .= " usuario,                                  ";
		$sql .= " senha,                                     ";
		$sql .= " datanascimento,                                  ";
		$sql .= " nomedamae,                                  ";
		$sql .= " nomedopai,                                  ";
		$sql .= " estado,                                  ";
		$sql .= " cidade,                                  ";
		$sql .= " bairro,                                  ";
		$sql .= " rua,                                  ";
		$sql .= " ndacasa,                                  ";
		$sql .= " ) values(                                 ";
		$sql .= "  '".$usuarioForm->getNome()."',           ";
		$sql .= "  '".$usuarioForm->getUsuario()."',        ";
		$sql .=	"  '".$usuarioForm->getSenha()."'           ";	
		$sql .=	"  '".$usuarioForm->getCpf()."'           ";
		$sql .=	"  '".$usuarioForm->getDatanascimento()."'           ";
		$sql .=	"  '".$usuarioForm->getNomedamae()."'           ";
		$sql .=	"  '".$usuarioForm->getNomedopai()."'           ";
		$sql .=	"  '".$usuarioForm->getEstado()."'           ";
		$sql .=	"  '".$usuarioForm->getCidade()."'           ";
		$sql .=	"  '".$usuarioForm->getBairro()."'           ";
		$sql .=	"  '".$usuarioForm->getRua()."'           ";
		$sql .=	"  '".$usuarioForm->getNdacasa()."'           ";
        $sql .= " )                                         ";

		mysql_query($sql);		
		
	}// Fim do metodo insert()


	/*
	* Alterando um usuário
	*/
	public function update($usuarioForm)
	{
		
        $sql  = " update usuario set                               ";
		$sql .= " nome = '".$usuarioForm->getNome()."',            ";
		$sql .= " usuario = '".$usuarioForm->getUsuario()."',      ";
		$sql .= " senha = '".$usuarioForm->getSenha()."'           ";
		$sql .= " cpf = '".$usuarioForm->getCpf()."',            ";
		$sql .= " datanascimento = '".$usuarioForm->getDatanascimento()."',            ";
		$sql .= " nomedamae = '".$usuarioForm->getNomedamae()."',            ";
		$sql .= " nomedopai = '".$usuarioForm->getNomedopai()."',            ";
		$sql .= " estado = '".$usuarioForm->getEstado()."',            ";
		$sql .= " cidade = '".$usuarioForm->getCidade()."',            ";
		$sql .= " bairro = '".$usuarioForm->getBairro()."',            ";
		$sql .= " rua = '".$usuarioForm->getRua()."',            ";
		$sql .= " ndacasa = '".$usuarioForm->getNdacasa()."',            ";
		$sql .= " where codusuario = ".$usuarioForm->getCodusuario();
       
		mysql_query($sql);
	}// Fim do metodo update()


	/*
	* Excluindo Usuário
    */
	
    public function delete($usuarioForm)
	{
		
        $sql  = " delete from usuario     ";
		$sql .= " where codusuario = ".$usuarioForm->getCodusuario();		
        
		mysql_query($sql);
	}// Fim do metodo delete()


	/*
	* Pegando os dados de um Usuário
           */
	public function getUsuario($usuarioForm)
	{
		$query = $this->pesquisar($usuarioForm);
		
		// Pegando a Noticia
		while ($lista = mysql_fetch_array($query)){
			$usuarioForm->setNome($lista['nome']);
			$usuarioForm->setUsuario($lista['usuario']);
			$usuarioForm->setSenha($lista['senha']);
			$usuarioForm->setCpf($lista['cpf']);
			$usuarioForm->setDatanascimento($lista['datanascimento']);
			$usuarioForm->setNomedamae($lista['nomedamae']);
			$usuarioForm->setNomedopai($lista['nomedopai']);
			$usuarioForm->setEstado($lista['estado']);
			$usuarioForm->setCidade($lista['cidade']);
			$usuarioForm->setBairro($lista['bairro']);
			$usuarioForm->setRua($lista['rua']);
			$usuarioForm->setndacasa($lista['ndacasa']);
			
		
		}

		return $usuarioForm;
	}// Fim do metodo getUsuario()
	
	public function logar($usuarioForm){
	  $query = $this->pesquisar($usuarioForm);
	  return $query;
    }
	
	//Destrutor da Classe
	public function __destruct()
	{ 

	}
	
}// Fim da classe

?>
