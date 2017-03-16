<?php

namespace App\Classes;

use Codedge\Fpdf\Fpdf\FPDF;

class BlockchainPDF extends Fpdf{


   // Page footer
   function Footer()
   {
       // Position at 1.5 cm from bottom
       $this->SetY(-15);
       // Arial italic 8
       $this->SetFont('Times', 'B', 8);
       // Page number
       $this->Cell(0, 10, $this->PageNo(), 0, 0, 'C');
   }

   function CoverPage($name = 'Anonymous', $email = NULL, $protocol, $title = NULL){
      $this->SetFont('Times', 'B', 24);
      $this->Cell(0, 18, $protocol . ':', 0, 1, 'C');
      $this->SetFont('Times', 'B', 18);
      $this->MultiCell(0, 9, $title, 0, 'C');
      $this->Ln(9);
      $this->SetFont('Times', '', 15);
      $this->MultiCell(0, 9, $name . "\n" . $email, 0, 'C');
      $this->Ln(24);
   }


}