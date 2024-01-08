<?php 
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $this->SetFont('helvetica', 6);
        $image_file = K_PATH_IMAGES.'../images/ubheadt.png';
        $image = $this->Image($image_file, '', '', 45, '', 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);
        $html = <<<EOD
        <div style="font-size:10pt;">
        $image <br><br><br><br>
        <table>
        <tr><td style="text-align:center;"> <b>ADMISSION AND RECORD CENTER</b><br> General Luna Rd., Baguio City, Philippines 2600</td></tr>
        </table><hr style="margin-top:0; margin-bottom:0;">
        <table style="font-size:8pt;">
        <tr>
        <td style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefax No.: (074) 442-3071</td>
        <td style="text-align:center;">Website:www.ubaguio.edu</td>
        <td style="text-align:right;">Email Address: registrar@ubaguio.edu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </table>
        </div>
        EOD;
        $html = <<<EOD
        <table border="0.1" cellspacing="0" cellpadding="9">
            <tr>
                <td rowspan="2" style="width:28%;">&nbsp;&nbsp;$image</td>
                <td style="width:26%; text-align:center;">Reference No.: QF-ARC-003</td>
                <td style="width:16%;  text-align:center;">Revision No: 01</td>
                <td style="width:30%;  text-align:center;">Effectivity Date: December 1, 2020</td>
            </tr>
            <tr>
                <td colspan="3" style="padding:10px; text-align:center; font-size:11"><b>C L E A R A N C E &nbsp;&nbsp; F O R M</b></td>
            </tr>
        </table>
        EOD;
        $this->writeHTML($html, true, 0, true);
    }
  
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica','B', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
  }
?>