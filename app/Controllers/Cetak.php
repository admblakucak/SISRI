<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library
use Dompdf\Dompdf;
use Dompdf\Options;

class Cetak extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function template()
    {
        // return view('template');
        // $option = new Options();
        // $option->set('is');
        $dompdf = new Dompdf();
        $filename = date('y-m-d-H-i-s');
        // load HTML content
        $data = [
            'baseurl' => base_url()
        ];
        $dompdf->loadHtml(view('template', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array('Attachment' => false));
        exit();
    }
}
