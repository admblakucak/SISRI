<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library
use CodeIgniter\Database\Query;
use Dompdf\Dompdf;
use Dompdf\Options;

class Cetak extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function form_bimbingan_proposal($id = NULL)
    {
        if (session()->get('ses_id') == '') {
            return redirect()->to('/');
        }

        $data = [
            'baseurl' => base_url(),
            'judul_skripsi' => $this->db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='$id'")->getResult()[0]->judul_topik
        ];
        return view('template', $data);
        // $option = new Options();
        // $option->set('is');
        $dompdf = new Dompdf();
        $filename = date('y-m-d-H-i-s');
        // load HTML content
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
