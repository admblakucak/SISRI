<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library
use CodeIgniter\Database\Query;
use Dompdf\Dompdf;
use Dompdf\Options;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Cetak extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function form_bimbingan_proposal()
    {
        if (session()->get('ses_id') == '') {
            return redirect()->to('/');
        }
        $id_pembimbing = $this->request->getPost('nip');
        $id = $this->request->getPost('nim');
        $id_pembimbing = '0012129302';
        $id = '170441100055';
        if ($id == '') {
            $id = session()->get('ses_id');
        }
        $nama_pembimbing = $this->db->query("SELECT * FROM tb_dosen WHERE nip='$id_pembimbing'")->getResult()[0];
        $disetujui_pada = $this->db->query("SELECT * FROM tb_perizinan_sidang WHERE nip='$id_pembimbing' AND nim='$id' AND jenis_sidang='seminar proposal'")->getResult();
        // ------------------------------------------------------------------
        if (!empty($disetujui_pada)) {
            if ($disetujui_pada[0]->status == 'disetujui') {
                $writer = new PngWriter();
                $isi = "Disetujui Pada : " . $disetujui_pada[0]->acc_at . " Oleh " . $disetujui_pada[0]->izin_sebagai . " (" . $nama_pembimbing->gelardepan . ' ' . $nama_pembimbing->nama . ', ' . $nama_pembimbing->gelarbelakang . ")";
                $qrCode = QrCode::create($isi)
                    ->setEncoding(new Encoding('UTF-8'))
                    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                    ->setSize(300)
                    ->setMargin(10)
                    ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                    ->setForegroundColor(new Color(0, 0, 0))
                    ->setBackgroundColor(new Color(255, 255, 255));
                $logo = Logo::create(FCPATH . 'image/Logo_UTM.png')
                    ->setResizeToWidth(50);
                $result = $writer->write($qrCode, $logo);
                $dataUri = $result->getDataUri();
                $data = ['qr' => '<img src="' . $dataUri . '" style="width: 60px;">'];
            }
        }
        // ------------------------------------------------------------------
        $data = [
            'baseurl' => base_url(),
            'judul_skripsi' => $this->db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='$id'")->getResult()[0]->judul_topik,
            'nim' => $id,
            'nama' => $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim='$id'")->getResult()[0]->nama,
            'pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing WHERE nip='$id_pembimbing' AND nim='$id' AND status_pengajuan='diterima'")->getResult()[0]->sebagai,
            'nama_pembimbing' => $nama_pembimbing,
            'nip' => $id_pembimbing,
            'data' => $this->db->query("SELECT * FROM tb_bimbingan WHERE `from`='$id' AND `to`='$id_pembimbing' AND pokok_bimbingan!=''  AND kategori_bimbingan='1'")->getResult(),
        ];
        // return view('template', $data);
        $dompdf = new Dompdf();
        $filename = date('y-m-d-H-i-s');
        $dompdf->loadHtml(view('form_bimbingan_proposal', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => false));
        exit();
    }
    public function form_bimbingan_skripsi()
    {
        if (session()->get('ses_id') == '') {
            return redirect()->to('/');
        }
        $id_pembimbing = $this->request->getPost('nip');
        $id = $this->request->getPost('nim');
        $id_pembimbing = '0012129302';
        $id = '170441100055';
        if ($id == '') {
            $id = session()->get('ses_id');
        }
        $nama_pembimbing = $this->db->query("SELECT * FROM tb_dosen WHERE nip='$id_pembimbing'")->getResult()[0];
        $disetujui_pada = $this->db->query("SELECT * FROM tb_perizinan_sidang WHERE nip='$id_pembimbing' AND nim='$id' AND jenis_sidang='skripsi'")->getResult();
        // ------------------------------------------------------------------
        if (!empty($disetujui_pada)) {
            if ($disetujui_pada[0]->status == 'disetujui') {
                $writer = new PngWriter();
                $isi = "Disetujui Pada : " . $disetujui_pada[0]->acc_at . " Oleh " . $disetujui_pada[0]->izin_sebagai . " (" . $nama_pembimbing->gelardepan . ' ' . $nama_pembimbing->nama . ', ' . $nama_pembimbing->gelarbelakang . ")";
                $qrCode = QrCode::create($isi)
                    ->setEncoding(new Encoding('UTF-8'))
                    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                    ->setSize(300)
                    ->setMargin(10)
                    ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                    ->setForegroundColor(new Color(0, 0, 0))
                    ->setBackgroundColor(new Color(255, 255, 255));
                $logo = Logo::create(FCPATH . 'image/Logo_UTM.png')
                    ->setResizeToWidth(50);
                $result = $writer->write($qrCode, $logo);
                $dataUri = $result->getDataUri();
                $data = ['qr' => '<img src="' . $dataUri . '" style="width: 60px;">'];
            }
        }
        // ------------------------------------------------------------------
        $data = [
            'baseurl' => base_url(),
            'judul_skripsi' => $this->db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='$id'")->getResult()[0]->judul_topik,
            'nim' => $id,
            'nama' => $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim='$id'")->getResult()[0]->nama,
            'pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing WHERE nip='$id_pembimbing' AND nim='$id' AND status_pengajuan='diterima'")->getResult()[0]->sebagai,
            'nama_pembimbing' => $nama_pembimbing,
            'nip' => $id_pembimbing,
            'data' => $this->db->query("SELECT * FROM tb_bimbingan WHERE `from`='$id' AND `to`='$id_pembimbing' AND pokok_bimbingan!='' AND kategori_bimbingan='3'")->getResult(),
        ];
        // return view('template', $data);
        $dompdf = new Dompdf();
        $filename = date('y-m-d-H-i-s');
        $dompdf->loadHtml(view('form_bimbingan_skripsi', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => false));
        exit();
    }
}
