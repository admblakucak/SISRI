<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library
use App\Libraries\QRcodelib; // Import library
use CodeIgniter\Database\Query;
use Dompdf\Dompdf;
use Dompdf\Options;

class Cetak extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->qr = new QRcodelib();
        $this->db = \Config\Database::connect();
    }
    public function berkas_mhs_proposal()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data = [
            'title' => 'Berkas Proposal',
            'db' => $this->db,
            'dosen_pembimbing_1' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima' AND sebagai='1'")->getResult(),
            'dosen_pembimbing_2' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima' AND sebagai='2'")->getResult(),
            'penguji_1' => $this->db->query("SELECT * from tb_penguji a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` where a.nim='" . session()->get('ses_id') . "' AND a.`status`='aktif' AND a.sebagai='1'")->getResult(),
            'penguji_2' => $this->db->query("SELECT * from tb_penguji a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` where a.nim='" . session()->get('ses_id') . "' AND a.`status`='aktif' AND a.sebagai='2'")->getResult(),
            'penguji_3' => $this->db->query("SELECT * from tb_penguji a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` where a.nim='" . session()->get('ses_id') . "' AND a.`status`='aktif' AND a.sebagai='3'")->getResult(),
        ];
        return view('Mahasiswa/Proposal/berkas_proposal', $data);
    }
    public function berkas_mhs_skripsi()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data = [
            'title' => 'Berkas Skripsi',
            'db' => $this->db,
            'dosen_pembimbing_1' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima' AND sebagai='1'")->getResult(),
            'dosen_pembimbing_2' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima' AND sebagai='2'")->getResult(),
            'penguji_1' => $this->db->query("SELECT * from tb_penguji a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` where a.nim='" . session()->get('ses_id') . "' AND a.`status`='aktif' AND a.sebagai='1'")->getResult(),
            'penguji_2' => $this->db->query("SELECT * from tb_penguji a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` where a.nim='" . session()->get('ses_id') . "' AND a.`status`='aktif' AND a.sebagai='2'")->getResult(),
            'penguji_3' => $this->db->query("SELECT * from tb_penguji a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` where a.nim='" . session()->get('ses_id') . "' AND a.`status`='aktif' AND a.sebagai='3'")->getResult(),
        ];
        return view('Mahasiswa/Skripsi/berkas_sidang', $data);
    }
    public function form_bimbingan_proposal($id, $id_pembimbing)
    {
        if (session()->get('ses_id') == '') {
            return redirect()->to('/');
        }
        if ($id == '') {
            $id = session()->get('ses_id');
        }
        $nama_pembimbing = $this->db->query("SELECT * FROM tb_dosen WHERE nip='$id_pembimbing'")->getResult()[0];
        $disetujui_pada = $this->db->query("SELECT * FROM tb_perizinan_sidang WHERE nip='$id_pembimbing' AND nim='$id' AND jenis_sidang='seminar proposal'")->getResult();
        // ------------------------------------------------------------------
        $data = ['qr' => ''];
        if (!empty($disetujui_pada)) {
            if ($disetujui_pada[0]->status == 'disetujui') {
                $isi = "Disetujui Pada : " . $disetujui_pada[0]->acc_at . " Oleh " . $disetujui_pada[0]->izin_sebagai . " (" . $nama_pembimbing->gelardepan . ' ' . $nama_pembimbing->nama . ', ' . $nama_pembimbing->gelarbelakang . ")";
                $qr = $this->qr->cetakqr($isi);
            } else {
                $qr = '<br>(BELUM DITANDA TANGANI)<br>';
            }
        } else {
            $qr = '<br>(BELUM DITANDA TANGANI)<br>';
        }
        // ------------------------------------------------------------------
        $data = [
            'title' => 'Form Bimbingan Proposal',
            'baseurl' => base_url(),
            'judul_skripsi' => $this->db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='$id'")->getResult()[0]->judul_topik,
            'nim' => $id,
            'nama' => $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim='$id'")->getResult()[0]->nama,
            'pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing WHERE nip='$id_pembimbing' AND nim='$id' AND status_pengajuan='diterima'")->getResult()[0]->sebagai,
            'nama_pembimbing' => $nama_pembimbing,
            'nip' => $id_pembimbing,
            'data' => $this->db->query("SELECT * FROM tb_bimbingan WHERE `from`='$id' AND `to`='$id_pembimbing' AND pokok_bimbingan!=''  AND kategori_bimbingan='1'")->getResult(),
            'qr' => $qr
        ];
        // return view('Cetak/form_bimbingan_proposal', $data);
        $dompdf = new Dompdf();
        $filename = date('y-m-d-H-i-s');
        $dompdf->loadHtml(view('Cetak/form_bimbingan_proposal', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => false));
        exit();
    }
    public function form_bimbingan_skripsi($id, $id_pembimbing)
    {
        if (session()->get('ses_id') == '') {
            return redirect()->to('/');
        }
        if ($id == '') {
            $id = session()->get('ses_id');
        }
        $nama_pembimbing = $this->db->query("SELECT * FROM tb_dosen WHERE nip='$id_pembimbing'")->getResult()[0];
        $disetujui_pada = $this->db->query("SELECT * FROM tb_perizinan_sidang WHERE nip='$id_pembimbing' AND nim='$id' AND jenis_sidang='skripsi'")->getResult();
        // ------------------------------------------------------------------
        if (!empty($disetujui_pada)) {
            if ($disetujui_pada[0]->status == 'disetujui') {
                $isi = "Disetujui Pada : " . $disetujui_pada[0]->acc_at . " Oleh " . $disetujui_pada[0]->izin_sebagai . " (" . $nama_pembimbing->gelardepan . ' ' . $nama_pembimbing->nama . ', ' . $nama_pembimbing->gelarbelakang . ")";
                $qr = $this->qr->cetakqr($isi);
            } else {
                $qr = '<br>(BELUM DITANDA TANGANI)<br>';
            }
        } else {
            $qr = '<br>(BELUM DITANDA TANGANI)<br>';
        }
        // ------------------------------------------------------------------
        $data = [
            'title' => 'Form Bimbingan Skripsi',
            'baseurl' => base_url(),
            'judul_skripsi' => $this->db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='$id'")->getResult()[0]->judul_topik,
            'nim' => $id,
            'nama' => $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim='$id'")->getResult()[0]->nama,
            'pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing WHERE nip='$id_pembimbing' AND nim='$id' AND status_pengajuan='diterima'")->getResult()[0]->sebagai,
            'nama_pembimbing' => $nama_pembimbing,
            'nip' => $id_pembimbing,
            'data' => $this->db->query("SELECT * FROM tb_bimbingan WHERE `from`='$id' AND `to`='$id_pembimbing' AND pokok_bimbingan!='' AND kategori_bimbingan='3'")->getResult(),
            'qr' => $qr,
        ];
        // return view('Cetak/form_bimbingan_skripsi', $data);
        $dompdf = new Dompdf();
        $filename = date('y-m-d-H-i-s');
        $dompdf->loadHtml(view('Cetak/form_bimbingan_skripsi', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => false));
        exit();
    }
    public function cobaqr()
    {
        $isi = "SUKSES";
        return $this->qr->cetakqr($isi);
    }
}
