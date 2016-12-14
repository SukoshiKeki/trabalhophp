	<?php 

/* 
 * Classe que representa Usuário
 *
 */
class UsuarioForm {
 
 	private $codusuario;
	private $nome;
	private $usuario;
	private $senha;
	private $datanascimento;
	private $nomedamae;
	private $nomedopai;
	private $estado;
	private $cidade;
	private $bairro;
	private $rua;
	private $ndacasa;
	private $cpf;
	//Construtor da Classe
	public function __construct()
	{ 
	 	
	}
			
	public function setCodusuario($codusuario)
	{
		$this->codusuario = $codusuario;
	}
	
	public function getCodusuario()
	{
		return $this->codusuario;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	public function getNome() 
	{
		return $this->nome;
	}
	
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}
	
	public function getUsuario()
	{
		return $this->usuario;
	}
	
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}
	
	public function getSenha()
	{
		return $this->senha;
	}
	public function setDatanascimento($datanascimento){
	$this->datanascimento = $datanascimento;
	}
	public function getDatanascimento(){
	return $this->datanascimento;
	}
	public function setNomedamae($nomedamae){
	$this->nomedamae = $nomedamae;
	}
	public function getNomedamae(){
	return $this->nomedamae;
	}
	public function setNomedopai($nomedopai){
	$this->nomedopai = $nomedopai;	
	}
	public function getNomedopai(){
	return $this->nomedopai;	
	}
	public function setEstado($estado){
	$this->estado = $estado;	
	}
	public function getEstado(){
	return $this->estado;	
	}
	public function setCidade($cidade){
	$this->cidade =$cidade;	
	}
	public function getCidade(){
	return $this->cidade;	
	}
	public function setBairro($bairro){
	$this->bairro = $bairro;	
	}
	public function getBairro(){
		return $this->bairro;
	}
	public function setRua($rua){
		$this->rua=$rua;
	}
	public function getRua(){
	return $this->rua;	
	}
	public function setNdacasa($ndacasa){
	$this->ndacasa=$ndacasa;	
	}
	public function getNdacasa(){
		return  $this->ndacasa;
	}
	public function setCpf($cpf){
	$this->cpf=$cpf;	
	}
	public function getCpf(){
	return $this->cpf;	
	}
	
	
	
	
	//Destrutor da Classe
	public function __destruct()
	{ 

	}

}// Fim da classe

?>
