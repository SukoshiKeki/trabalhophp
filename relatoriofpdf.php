<?php 
 include('conexao.php');
 require('fpdf/fpdf.php');
  
 $pdf=new FPDF();

 $pdf->Open();
 $pdf->AddPage();

 $pdf->SetFont('arial','b',7);
 $pdf->ln(4);

 $pdf->Cell(80, 5,'' , 0, 0, 'L');
 $pdf->Cell(30, 5, 'Relatório de Usuários', 0, 0, 'L');
 $pdf->Cell(30, 5, '', 0, 1, 'L');  

 $pdf->Cell(10, 5,'' , 0, 0, 'L');
 $pdf->Cell(18, 5,'', 0, 1, 'L'); 
 $pdf->ln(7);
 $pdf->SetFont('arial','b',7);
 
 $pdf->Cell(10, 5,"", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"Nome", 0, 0, 'L');  
 $pdf->Cell(40, 5,"Usuário", 0, 0, 'L');   
 $pdf->Cell(40, 5,"senha", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"cpf", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"datanascimento", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"nomedamae", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"nomedopai", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"estado", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"cidade", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"bairro", 0, 0, 'L'); 
 $pdf->Cell(50, 5,"rua", 0, 0, 'L');
 $pdf->Cell(50, 5,"ndacasa", 0, 0, 'L');  
 $pdf->Cell(20, 5,"", 0, 1, 'L'); 	 
   
 $pdf->SetFont('arial','b',7);
 $pdf->ln(2);  

 $sql =  "SELECT * FROM usuario ";
 $query = mysql_query($sql);  
 while($resultset  = mysql_fetch_array($query)){
     $nome = $resultset['nome'];
	 $usuario = $resultset['usuario'];	 
     $cpf = $resultset['cpf'];
	 $datanascimento = $resultset['datanascimento'];
	 $nomedamae = $resultset['nomedamae'];
	 $nomedopai = $resultset['nomedopai'];
	 $estado = $resultset['estado'];
	 $cidade = $resultset['cidade'];
	 $bairro = $resultset['bairro'];
	 $rua = $resultset['rua'];
	 $ndacasa = $resultset['ndacasa'];
	 
	 
	 
	 
	 
	 $pdf->Cell(10, 5,"", 0, 0, 'L'); 
	 $pdf->Cell(50, 5,$nome, 0, 0, 'L');  
	 $pdf->Cell(40, 5,$usuario, 0, 0, 'L'); 
	 $pdf->Cell(40, 5,'****', 0, 0, 'L'); 
	 $pdf->Cell(40, 5,$cpf, 0, 0, 'L');
     $pdf->Cell(40, 5,$datanascimento, 0, 0, 'L');
	 $pdf->Cell(40, 5,$nomedamae, 0, 0, 'L');
	 $pdf->Cell(40, 5,$nomedopai, 0, 0, 'L');
	 $pdf->Cell(40, 5,$estado, 0, 0, 'L');
	 $pdf->Cell(40, 5,$cidade, 0, 0, 'L');
	 $pdf->Cell(40, 5,$bairro, 0, 0, 'L');
	 $pdf->Cell(40, 5,$rua, 0, 0, 'L');
	 $pdf->Cell(40, 5,$ndacasa, 0, 0, 'L');
     $pdf->Cell(20, 5,'', 0, 1, 'L'); 	   
 }  

 $pdf->ln(8);

 $pdf->Output();
 
?>
