<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Codedge\Fpdf\Facades\Fpdf;
use App\Classes\BlockchainPDF;

class PDFGeneratorController extends Controller
{

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $PROTOCOL = request('protocol');
        $COIN = request('coin');
        $EMAIL = request('email');

        $whitepaper = $this->getWhitepaper($request);


        $name = request('name');
        if (empty(request('name'))) { $name = 'Anonymous'; }

        $title = $this->titleGenerator($request);



        $pdf = new BlockchainPDF();
        $pdf->SetFillColor(243);
        $pdf->setTitle(request('protocol'));
        $pdf->AddPage();

        $pdf->CoverPage($name, $EMAIL, $PROTOCOL, $title);

        $pdf->SetFont('Times', '', 12);

        foreach($whitepaper as $section => $content){
           $pdf->Ln(6); // add spacing above section titles
           $pdf->SetFont('Times', 'B', 14); // make the font bigger and bold
           if(!empty($content)){ $pdf->Cell(0, 6, $this->keywordReplace($section, $PROTOCOL, $COIN), 0, 1, 'L'); } // print section title, ignore sections without content
           $pdf->SetFont('Times', '', 12); // change font back to normal

           foreach($content as $paragraphs => $paragraph){
             if(is_array($paragraph)){ // paragraph is code or img
                if(isset($paragraph['img'])){ // it's an image
                   $pdf->Ln(6); // add spacing
                   $pdf->Image(getcwd().$paragraph['img']);
                   $pdf->Ln(6); // add spacing
                }
                if(isset($paragraph['code'])){
                   $pdf->SetFont('Courier', '', 12); // change the font to courier
                   $pdf->Ln(6); // add spacing above section titles
                   $pdf->MultiCell(0, 6, $this->keywordReplace($paragraph['code'], $PROTOCOL, $COIN), 0, 'L', true);
                   $pdf->Ln(6); // add spacing above section titles
                   $pdf->SetFont('Times', '', 12);
                }
             } else {
                if($section == 'References'){
                   $pdf->MultiCell(0, 6, $paragraph, 0, 'L'); // print the paragraph
                } else {
                   $pdf->MultiCell(0, 6, $this->keywordReplace($paragraph, $PROTOCOL, $COIN), 0, 'J'); // print the paragraph
                }

             }
          }
        }




        $pdf->Output();

    }

    protected function keywordReplace($string, $PROTOCOL, $COIN){
      $search  = array('_PROTOCOL_', '_COIN_');
      $replace = array($PROTOCOL, $COIN);
      return str_replace($search, $replace, $string);
   }

    protected function getWhitepaper(Request $request){

      $whitepaper = include(app_path().'/Whitepapers/template.php');

      if(request('bitcoin')){
         $bitcoin = include(app_path().'/Whitepapers/bitcoin.php');
         $whitepaper = array_merge_recursive($whitepaper, $bitcoin);
      }
      if(request('ripple')){
         $ripple = include(app_path().'/Whitepapers/ripple.php');
         $whitepaper = array_merge_recursive($whitepaper, $ripple);
      }
      if(request('ethereum')){
         $ethereum = include(app_path().'/Whitepapers/ethereum.php');
         $whitepaper = array_merge_recursive($whitepaper, $ethereum);
      }
      if(request('cryptonote')){
         $cryptonote = include(app_path().'/Whitepapers/cryptonote.php');
         $whitepaper = array_merge_recursive($whitepaper, $cryptonote);
      }
      if(request('mimblewimble')){
         $mimblewimble = include(app_path().'/Whitepapers/mimblewimble.php');
         $whitepaper = array_merge_recursive($whitepaper, $mimblewimble);
      }
      if(request('lightning')){
         $lightning = include(app_path().'/Whitepapers/lightning.php');
         $whitepaper = array_merge_recursive($whitepaper, $lightning);
      }
      if(request('tumblebit')){ }

      return $whitepaper;

    }

    protected function titleGenerator(Request $request){
      $defaultTitle = 'Secure Untrusted Anonymous Decentralised Generalised One-time Ring Signature Peer-to-Peer Scalable Off-Chain Untraceable Electronic Instant Cash System and MimbleWimble Transaction Ledger Consensus Algorithm Payment Hub';

      if(empty(request('bitcoin'))){
         $words = array("Peer-to-Peer ", "Electronic ", "Cash ", "System ");
         $defaultTitle = str_replace($words, "", $defaultTitle);
      }
      if(empty(request('ripple'))){
         $words = array("Consensus ", "Algorithm ");
         $defaultTitle = str_replace($words, "", $defaultTitle);
      }
      if(empty(request('ethereum'))){
         $words = array("Secure ", "Decentralised ", "Generalised ", "Transaction ", "Ledger ");
         $defaultTitle = str_replace($words, "", $defaultTitle);
      }
      if(empty(request('cryptonote'))){
         $words = array("Untraceable ", "One-time Ring Signature ");
         $defaultTitle = str_replace($words, "", $defaultTitle);
      }
      if(empty(request('mimblewimble'))){
         $defaultTitle = str_replace("MimbleWimble ", "", $defaultTitle);
      }
      if(empty(request('lightning'))){
         $words = array("Scalable Off-Chain ", "Instant ");
         $defaultTitle = str_replace($words, "", $defaultTitle);
      }
      if(empty(request('tumblebit'))){
         $words = array("Untrusted Anonymous ", "Payment Hub");
         $defaultTitle = str_replace($words, "", $defaultTitle);
      }

      if(empty(request('ripple')) && empty(request('tumblebit')) && empty(request('mimblewimble')) && empty(request('ethereum'))){
         $defaultTitle = str_replace(" and", "", $defaultTitle);
      }
      if(empty(request('bitcoin')) &&
         empty(request('ripple')) &&
         empty(request('cryptonote')) &&
         empty(request('tumblebit')) &&
         empty(request('lightning')) &&
         empty(request('mimblewimble')) &&
         empty(request('ethereum'))){
         $defaultTitle = 'This paper contains my complete knowledge of the Blockchain';
      }

      return $defaultTitle;
   }

}
