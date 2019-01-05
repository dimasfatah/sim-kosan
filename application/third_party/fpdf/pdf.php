<?php
require"fpdf.php";

class Mypdf extends FPDF{
    function mycell($w,$h,$x,$t,$a){
        $height=$h/3;
        $first=$height+2;
        $second=$height+$height+$height+3;
        $len=strlen($t);
        if($len>25){
            $txt=str_split($t,25);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','',$a);
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','',$a);
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB',0,$a,0);
        }else{
            $this->setX($x);
            $this->Cell($w,$h,$t,'LTRB',0,$a,'0');
        }
    }
}
?>