<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Ajukan_Topik extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $data_mahasiswa = $this->db->query("SELECT * FROM tb_mahasiswa where nim='" . session()->get('ses_id') . "'")->getResult();
        $idunit = $data_mahasiswa[0]->idunit;
        $data_dosen = $this->db->query("SELECT * FROM tb_dosen a LEFT JOIN tb_unit b ON a.`idunit`=b.`idunit` WHERE a.idunit IN (SELECT idunit FROM tb_unit WHERE parentunit=(SELECT parentunit FROM tb_unit WHERE idunit='$idunit')) AND a.`nip` NOT IN (SELECT nip FROM tb_pengajuan_pembimbing WHERE nim='" . session()->get('ses_id') . "' AND (status_pengajuan='diterima' OR status_pengajuan='menunggu'))")->getResult();
        $data_pengajuan_pembimbing_1 = $this->db->query("SELECT * FROM tb_dosen a LEFT JOIN tb_pengajuan_pembimbing b ON a.`nip`=b.`nip` LEFT JOIN tb_unit c ON a.`idunit`=c.`idunit` WHERE b.nim='" . session()->get('ses_id') . "' AND b.sebagai='1'")->getResult();
        $data_pengajuan_pembimbing_2 = $this->db->query("SELECT * FROM tb_dosen a LEFT JOIN tb_pengajuan_pembimbing b ON a.`nip`=b.`nip` LEFT JOIN tb_unit c ON a.`idunit`=c.`idunit` WHERE b.nim='" . session()->get('ses_id') . "' AND b.sebagai='2'")->getResult();
        $data_topik = $this->db->query("SELECT * FROM tb_topik where idunit='$idunit'")->getResult();
        $ststbl1 = $this->db->query("SELECT count(id_pengajuan_pembimbing) as jumlah FROM tb_pengajuan_pembimbing  where nim='" . session()->get('ses_id') . "' AND sebagai='1' AND (status_pengajuan='menunggu' OR status_pengajuan='diterima')")->getResult()[0]->jumlah;
        $ststbl2 = $this->db->query("SELECT count(id_pengajuan_pembimbing) as jumlah FROM tb_pengajuan_pembimbing  where nim='" . session()->get('ses_id') . "' AND sebagai='2' AND (status_pengajuan='menunggu' OR status_pengajuan='diterima')")->getResult()[0]->jumlah;
        $stsp1 = $this->db->query("SELECT count(id_pengajuan_pembimbing) as jumlah FROM tb_pengajuan_pembimbing  where nim='" . session()->get('ses_id') . "' AND sebagai='1' AND (status_pengajuan='diterima')")->getResult()[0]->jumlah;
        $stsp2 = $this->db->query("SELECT count(id_pengajuan_pembimbing) as jumlah FROM tb_pengajuan_pembimbing  where nim='" . session()->get('ses_id') . "' AND sebagai='2' AND (status_pengajuan='diterima')")->getResult()[0]->jumlah;
        $data_pengajuan_topik = $this->db->query("SELECT * FROM tb_pengajuan_topik where nim='" . session()->get('ses_id') . "'")->getResult();
        $data = [
            'title' => 'Ajukan Topik Skripsi',
            'dosen' => $data_dosen,
            'pengajuan_pem1' => $data_pengajuan_pembimbing_1,
            'pengajuan_pem2' => $data_pengajuan_pembimbing_2,
            'ststbl1' => $ststbl1,
            'ststbl2' => $ststbl2,
            'stsp1' => $stsp1,
            'stsp2' => $stsp2,
            'topik' => $data_topik,
            'data_pengajuan_topik' => $data_pengajuan_topik
        ];
        return view('Mahasiswa/ajukan_topik', $data);
    }
    public function proses_ajukan_topik()
    {
        if (!$this->validate([
            'topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih topik'
                ]
            ],
            'judul_topik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'berkas' => [
                // 'rules' => 'uploaded[berkas]|mime_in[berkas,application/pdf]|max_size[berkas,2048]',
                'rules' => 'mime_in[berkas,application/pdf]|max_size[berkas,2048]',
                'errors' => [
                    // 'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa pdf',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('message_ajukan_topik', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> ' . $this->validator->listErrors() . '</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            return redirect()->back()->withInput();
        }
        $id_topik = $this->request->getPost('topik');
        $judul = $this->request->getPost('judul_topik');
        $berkas = $this->request->getFile('berkas');
        $name = $berkas->getRandomName();
        if ($berkas->getName() != '') {
            if ($berkas->move(WRITEPATH . '../public/berkas/', $name)) {
                $this->db->query("UPDATE tb_pengajuan_topik SET id_topik = '$id_topik', judul_topik = '$judul', berkas='$name' WHERE nim='" . session()->get('ses_id') . "'");
                session()->setFlashdata("message_ajukan_topik", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> update informasi pengajuan topik.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
                $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','update pengajuan topik','Update informasi pengajuan topik & Update berkas',now())");
            } else {
                session()->setFlashdata("message_ajukan_topik", '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> update informasi pengajuan topik.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            }
        } else {
            $this->db->query("UPDATE tb_pengajuan_topik SET id_topik = '$id_topik', judul_topik = '$judul' WHERE nim='" . session()->get('ses_id') . "'");
            session()->setFlashdata("message_ajukan_topik", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> update informasi pengajuan topik.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','update pengajuan topik','Update informasi pengajuan topik',now())");
        }
        return redirect()->to('/ajukan_topik_mahasiswa');
    }
    public function ajukan_dospem_1()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $nip = $this->request->getPost("nip");
        if ($nip == "") {
            session()->setFlashdata('message_pem1', '
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
		<span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
		<span class="alert-inner--text"><strong>Gagal!</strong> Pengajuan dosen pembimbing 1 gagal.</span>
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>');
        } else {
            $this->db->query("INSERT INTO tb_pengajuan_pembimbing (nim,nip,sebagai,create_at) VALUES ('" . session()->get('ses_id') . "','$nip','1',now())");
            session()->setFlashdata('message_pem1', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Pengajuan dosen pembimbing 1 berhasil.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','pengajuan dospem 1','Pengajuan dosen pembimbing 1 ($nip)',now())");
        }
        return redirect()->to('/ajukan_topik_mahasiswa');
    }
    public function ajukan_dospem_2()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $nip = $this->request->getPost("nip");
        if ($nip == "") {
            session()->setFlashdata('message_pem2', '
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
		<span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
		<span class="alert-inner--text"><strong>Gagal!</strong> Pengajuan dosen pembimbing 2 gagal.</span>
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>');
        } else {
            $this->db->query("INSERT INTO tb_pengajuan_pembimbing (nim,nip,sebagai,create_at) VALUES ('" . session()->get('ses_id') . "','$nip','2',now())");
            session()->setFlashdata('message_pem2', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Pengajuan dosen pembimbing 2 berhasil.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','pengajuan dospem 2','Pengajuan dosen pembimbing 2 ($nip)',now())");
        }
        return redirect()->to('/ajukan_topik_mahasiswa');
    }
}
