function gravardados(){
  if (confirm("Deseja gravar ?","gravar"))
  {
	if (validarForm()){
		formulario.action = "formulario.php";
		formulario.submit();
	}	
  }	
}

// Validar o formulario
function validarForm() {
	if (formulario.nome.value == "") {
    	alert('Informe o campo nome!');
	    formulario.nome.focus();
    	return(false);
	}
	if (formulario.telefone.value == "") {
    	alert('Inform o campo telefone!');
	    formulario.telefone.focus();
    	return(false);
	}
	return(true);
}
