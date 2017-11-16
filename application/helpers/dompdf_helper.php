<?php /*if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}*/

 if ( ! function_exists('exportMeAsMPDF'))
{
            function exportMeAsMPDF($htmView,$fileName,$file_path) {

                        $CI =& get_instance();
						 require_once("mpdf/mpdf.php");
						// $mpdf = new mPDF();
                        //$CI->load->library('mpdf/mpdf');
						 ob_end_clean();
                        //$CI->mpdf=new mPDF('','','','',0,0,20,0,0,0,'L');
						//$CI->mpdf=new mPDF('', array(254,210),'','',0,0,0,0);
						$CI->mpdf=new mPDF('', array(200,164),0,'',0,0,0,0,0,0);
                        //$CI->mpdf->AliasNbPages('[pagetotal]');
                        //$CI->mpdf->SetHTMLHeader('{PAGENO}/{nb}', '1',false);
                        $CI->mpdf->SetDisplayMode('fullpage');
                        //$CI->mpdf->pagenumPrefix = 'Page number ';
                        //$CI->mpdf->pagenumSuffix = ' - ';
                        //$CI->mpdf->nbpgPrefix = ' out of ';
                        //$CI->mpdf->nbpgSuffix = ' pages';
                        //$CI->mpdf->SetHeader('{PAGENO}{nbpg}');
                        //$CI->mpdf = new mPDF('', 'A4', 0, '', 12, 12, 10, 10, 5, 5);
                        //$style = 'http://localhost/CodeIgniter_front/theme/css/style.css';
                       // $stylesheet = file_get_contents( $style);
                       // $CI->mpdf->WriteHTML($stylesheet,1);                       
                        $CI->mpdf->WriteHTML($htmView,2);                       
                        $CI->mpdf->Output($file_path.$fileName,'F');
            }
}
?>