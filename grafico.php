	<?php
session_start();
header("Content-type: image/png");

$acs[0]["nome"] = "Curso de Linux";
$acs[0]["qtd"]  = "50";
$acs[1]["nome"] = "Curso de Windows Server 2003";
$acs[1]["qtd"]  = "25";
$acs[2]["nome"] = "Curso de PHP e MYSQL";
$acs[2]["qtd"]  = "75";
$acs[3]["nome"] = "Curso de Delphi";
$acs[3]["qtd"]  = "15";
$acs[4]["nome"] = "Curso de WebDesign";
$acs[4]["qtd"]  = "35";
$acs[5]["nome"] = "Curso de Hardware";
$acs[5]["qtd"]  = "65";



for($i=0;$i < count($acs);$i++) {
  $vetor[nome][$i] = $acs[$i]["nome"];
  $vetor[qtd][$i]  = $acs[$i]["qtd"];
}
grafico_gui($vetor);
//---------------------------------------------------- //
// --- ------Gerador de grafico 3D dinamico----------- //
// -Otima demonstraçao de uso da biblioteca GD do PHP- //
// --------------------------------------------------- //

// -------------------------------------------------------------------- //
//  Este programa gera um grafico a partir de um vetor multidimensional //
//  * Os parametros  =>    $vetor[nome] ------------------------------- //
//  * As quantidades =>    $vetor[qtd] -------------------------------- //
//  Altura e largura da imagem gerada sao definidos dinamicamente de    //
//  acordo com o numero de parametros passados  ----------------------- //
// -------------------------------------------------------------------- //



function grafico_gui($vetor){

//Define a quantidade de parametros
$tamanho = count($vetor[qtd]);

//define o maior parametro
$maior = 1;
$total = 0;
for($i=0;$i<$tamanho;$i++):
  if ($vetor[qtd][$i]>$maior):
    $maior=$vetor[qtd][$i];
	$vetor_maior=$i;
  endif;
  $total = $total+$vetor[qtd][$i];
endfor;

//Calcula a altura e largura ideais
$largura= 50*$tamanho+300;
if ($largura<350)
  $largura=350;
$altura= 20*$tamanho+280;

//Cria a imagem
$img = imagecreate($largura,$altura);

//Define cores
$fundo      = imagecolorallocate($img,230,239,248);
$vermelho   = imagecolorallocate($img,255,0,0);
$branco     = imagecolorallocate($img,255,255,255);
$corret     = imagecolorallocate($img,51,153,255);
$cinza      = imagecolorallocate($img,100,100,100);
$azul       = imagecolorallocate($img,0,0,255);
$verde      = imagecolorallocate($img,0,255,0);
$azulescuro = imagecolorallocate($img,102,153,204);
$preto      = imagecolorallocate($img,0,0,0);
$amarelo    = imagecolorallocate($img,255,255,0);
$laranja    = imagecolorallocate($img,0xFF,0x8C,0x24);
$marrom     = imagecolorallocate($img,0xDC,0x91,0x3D);
$azulclaro  = imagecolorallocate($img,77,190,220);
$verdeclaro = imagecolorallocate($img,105,190,180);
$indef      = imagecolorallocate($img,145,35,320);
$indef2     = imagecolorallocate($img,245,350,120);
$indef3     = imagecolorallocate($img,445,251,328);
$indef4     = imagecolorallocate($img,149,45,228);
$indef5     = imagecolorallocate($img,245,23,237);
$indef6     = imagecolorallocate($img,45,323,139);


$cores[0]  = $amarelo;
$cores[1]  = $vermelho;
$cores[2]  = $corret;
$cores[3]  = $cinza;
$cores[4]  = $azul;
$cores[5]  = $azulescuro;
$cores[6]  = $preto;
$cores[7]  = $verde;
$cores[8]  = $branco;
$cores[9]  = $laranja;
$cores[10] = $marrom;
$cores[11] = $azulclaro;
$cores[12] = $verdeclaro;
$cores[13] = $indef;
$cores[14] = $indef2;
$cores[15] = $indef3;
$cores[16] = $indef4;
$cores[17] = $indef5;
$cores[18] = $indef6;

function getCor($cor) {
   if(!$cor) {
		$cor = $vermelho;
	}
	if($cor == $vermelho) {
		$cor = $branco;
	}
	if($cor == $branco) {
		$cor = $corret;
	}
	if($cor == $corret) {
		$cor = $indef6;
	}
	if($cor == $cinza) {
		$cor = $azul; 
	}
	if($cor == $azul) {
		$cor = $azulescuro;
	}
	if($cor == $azulescuro) {
		$cor = $preto;
	}
	if($cor == $preto) {
		$cor = $verde;
	}
	if($cor == $verde) {
		$cor = $amarelo;
	}
	if($cor == $amarelo) {
		$cor = $laranja;
	}
	if($cor == $laranja) {
		$cor = $marrom;
	}
	if($cor == $marrom) {
		$cor = $azulclaro;
	}
	if($cor == $azulclaro) {
		$cor = $verdeclaro;
	}
	if($cor == $verdeclaro) {
		$cor = $indef;
	}
	if($cor == $indef) {
		$cor = $indef2;
	}
	if($cor == $indef2) {
		$cor = $indef3;
	}
	if($cor == $indef3) {
		$cor = $indef4;
	}
	if($cor == $indef4) {
		$cor = $indef5;
	}
	return $cor;
}

imagestring($img, 3, 85, $alt, "                                 ".$_SESSION["titulo"], $corret);


//Define o numero à esquerda
$numero_esquerda = ($maior/4);


//Define a altura certa para os retangulos
for($i=0;$i<$tamanho;$i++):
  $var[$i] = 180 - (($vetor[qtd][$i]*150)/$maior);
endfor;

//Gera as linhas intermediarias
imagefilledrectangle($img,40,30,$largura-20,31,$azulescuro);
imagefilledrectangle($img,40,68,$largura-20,69,$azulescuro);
imagefilledrectangle($img,40,104,$largura-20,105,$azulescuro);
imagefilledrectangle($img,40,142,$largura-20,143,$azulescuro);

//   Gera os triangulos pequenos que ligam os retangulos principais
// com os retangulos sombreados para formar uma imagem 3D.
$r=60;
$s=65;
for ($i=0;$i<$tamanho;$i++):

if ($vetor[qtd][$i]!=0):
$values_cima = array(
  0  => $r,    			// x1
  1  => $var[$i],    		// y1
  2  => $s,   			// x2
  3  => $var[$i]-5,	     	// y2
  4  => $r+5,    		// x3
  5  => $var[$i],   		// y3
);

$values_baixo = array(
  0  => $r+31,    		// x1
  1  => 181,    		// y1
  2  => $r+31,   		// x2
  3  => 176,    		// y2
  4  => $r+35,    		// x3
  5  => 176,   			// y3
);
$r=$r+50;
$s=$s+50;
imagefilledpolygon($img, $values_baixo, 3, $cinza );
imagefilledpolygon($img, $values_cima, 3, $cinza );
endif;
endfor;

//Gera os retangulos principais e sombreados
$x1=60;
$x2=90;
for ($i=0;$i<$tamanho;$i++):
	  $corAtu = getCor($cores[$i]);
	  if ($vetor[qtd][$i]!=0):
		 imagefilledrectangle($img,$x1+5,$var[$i]-5,$x2+5,176,$cinza);
		 imagefilledrectangle($img,$x1,$var[$i],$x2,180,$corAtu);
	  endif;
	  $x1=$x1+50;
	  $x2=$x2+50;
endfor;

//Gera as linhas principais
imagefilledrectangle($img,20,181,$largura-20,183,$preto);
imagefilledrectangle($img,38,00,40,200,$preto);

//Gera o numero do parametro
$v=72;
for($i=0;$i<$tamanho;$i++):
  imagestring($img, 2, $v, 185, $i+1, $preto);
  $v=$v+50;
endfor;

//Gera os numeros das linhas intermediarias
imagestring($img, 2, 05, 24, $numero_esquerda*4, $preto);
imagestring($img, 2, 05, 61, $numero_esquerda*3, $preto);
imagestring($img, 2, 05, 96, $numero_esquerda*2, $preto);
imagestring($img, 2, 05, 135, $numero_esquerda, $preto);

//Gera o nome dos parametros
$alt=225;
for($i=0;$i<$tamanho;$i++):
  imagestring($img, 3, 05, $alt, ($i+1)."-", $corret);
  imagestring($img, 3, 25, $alt, $vetor[nome][$i] , $preto);
  $alt=$alt+13;
endfor;
imagefilledrectangle($img,20,$alt+10,$largura-20,$alt+11,$cinza);

//Gera resumo embaixo da imagem
imagestring($img, 3, 05, $alt+15, "Total da Votação:", $corret);
imagestring($img, 3, 135, $alt+16, $total, $preto);

//Numero de qtd de cada filme
$num=67;
for($i=0;$i<$tamanho;$i++):
  for($j=0;$j<=9;$j++):
    if ($vetor[qtd][$i]==$j):
      $vetor[qtd][$i]="0".$vetor[qtd][$i];
    endif;
  endfor;
  if ($vetor[qtd][$i]!=0):
    imagestring($img,3,$num,$var[$i]-18,$vetor[qtd][$i],$preto);
    else:
      imagestring($img,3,$num,168,$vetor[qtd][$i],$preto);
  endif;
  $num = $num+50;
endfor;

imagepng($img);
imagedestroy($img);
}
?>
