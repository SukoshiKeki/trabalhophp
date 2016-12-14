<?php  
// echo "arquivo incluido";
 

/*
 *	Converter data de (aa-mm-dd) para (dd/mm/aa)
 *	@param $date
 *	return date
*/

 function toDateDMY($date){
	if ($date != ""){
		list ($y, $m, $d) = split ('[-]', $date);
		$dataformatada="$d/$m/$y";
		if ($dataformatada!="//"){
			return "$d/$m/$y";
		}
	}
	
	return "";
}//Fim do metodo toDateDMY 


/*
 *	Converter data de (dd/mm/aa) para (aa-mm-dd)
 *	@param $date
 *	return date
*/
function toDateYMD($date){

	if ($date != ""){
		list ($d, $m, $y) = split ('[/]', $date);
		$dataformatada="$d-$m-$y";
		if ($dataformatada!="--"){
			return "$y-$m-$d";
		}
	}

	return "";
}//Fim do metodo toDateDMY

?>