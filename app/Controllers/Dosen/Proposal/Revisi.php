<?php

namespace App\Controllers\Dosen\Proposal;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Revisi extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data_mhs = [];
        // $data_mhs_bimbingan = $this->db->query("SELECT a.*,b.`nama` AS nama_mhs, b.`jk`, c.`namaunit`, d.* FROM tb_pengajuan_pembimbing a LEFT JOIN tb_mahasiswa b ON b.`nim`=a.`nim` LEFT JOIN tb_unit c ON b.`idunit`=c.`idunit` LEFT JOIN tb_profil_tambahan d ON a.`nim`=d.`id` WHERE nip='$id' AND status_pengajuan='diterima'")->getResult();
        // foreach ($data_mhs_bimbingan as $key) {
        //     if ($key->image != NULL) {
        //         $image = $key->image;
        //     } else {
        //         $image = 'Profile_Default.png';
        //     }
        //     $sum_pemberitahuan = $this->db->query("SELECT `from`,COUNT(*) AS sum_pemberitahuan FROM tb_bimbingan WHERE status_baca='belum dibaca' AND `to`=" . session()->get('ses_id') . " AND `from`=" . $key->nim . " AND kategori_bimbingan=2 GROUP BY `from`")->getResult();
        //     if ($sum_pemberitahuan != NULL) {
        //         $sum_pemberitahuan = $sum_pemberitahuan[0]->sum_pemberitahuan;
        //     } else {
        //         $sum_pemberitahuan = 0;
        //     }
        //     $data = [
        //         'nim' => $key->nim,
        //         'nama_mhs' => $key->nama_mhs,
        //         'jk' => $key->jk,
        //         'namaunit' => $key->namaunit,
        //         'image' => $image,
        //         'sum_pemberitahuan' => $sum_pemberitahuan
        //     ];
        //     array_push($data_mhs, $data);
        // }
        $data_mhs_bimbingan_penguji = $this->db->query("SELECT a.*,b.`nama` AS nama_mhs, b.`jk`, c.`namaunit`, d.* FROM tb_penguji a LEFT JOIN tb_mahasiswa b ON b.`nim`=a.`nim` LEFT JOIN tb_unit c ON b.`idunit`=c.`idunit` LEFT JOIN tb_profil_tambahan d ON a.`nim`=d.`id` WHERE nip='$id'  AND a.status='aktif'")->getResult();
        foreach ($data_mhs_bimbingan_penguji as $key) {
            if ($key->image != NULL) {
                $image = $key->image;
            } else {
                $image = 'Profile_Default.png';
            }
            $sum_pemberitahuan = $this->db->query("SELECT `from`,COUNT(*) AS sum_pemberitahuan FROM tb_bimbingan WHERE status_baca='belum dibaca' AND `to`=" . session()->get('ses_id') . " AND `from`=" . $key->nim . " AND kategori_bimbingan=2 GROUP BY `from`")->getResult();
            if ($sum_pemberitahuan != NULL) {
                $sum_pemberitahuan = $sum_pemberitahuan[0]->sum_pemberitahuan;
            } else {
                $sum_pemberitahuan = 0;
            }
            $data = [
                'nim' => $key->nim,
                'nama_mhs' => $key->nama_mhs,
                'jk' => $key->jk,
                'namaunit' => $key->namaunit,
                'image' => $image,
                'sum_pemberitahuan' => $sum_pemberitahuan
            ];
            array_push($data_mhs, $data);
        }
        $data_baru = array_filter($data_mhs, function ($item) {
            return $item['sum_pemberitahuan'] != '0';
        });
        $data_mhs = array_filter($data_mhs, function ($item) {
            return $item['sum_pemberitahuan'] == '0';
        });
        // var_dump($data_mhs);
        $data = [
            'title' => 'Data Mahasiswa Bimbingan Revisi Proposal',
            'db' => $this->db,
            'data_mhs_bimbingan_baru' => $data_baru,
            'data_mhs_bimbingan' => $data_mhs,
        ];
        return view('Dosen/Proposal/data_bimbingan_revisi_proposal', $data);
    }
    public function bimbingan_proposal_dosen($nim)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }

        $id = $nim;
        $pembimbing = $this->db->query("SELECT * FROM tb_pengajuan_pembimbing where nip='" . session()->get('ses_id') . "' AND nim='$nim'")->getResult();
        $penguji = $this->db->query("SELECT * FROM tb_penguji where nip='" . session()->get('ses_id') . "' AND nim='$nim'")->getResult();
        if ($pembimbing != null) {
            $sebagai = 'Pembimbing ' . $pembimbing[0]->sebagai;
        } else {
            $sebagai = 'Penguji ' . $penguji[0]->sebagai;
        }
        $data = [
            'title' => 'Bimbingan Revisi Proposal',
            'db' => $this->db,
            'nim' => $id,
            'sebagai' => $sebagai,
            'data_mhs' => $this->db->query("SELECT * FROM tb_mahasiswa a LEFT JOIN tb_profil_tambahan b ON b.`id` = a.`nim` WHERE a.`nim` = $id")->getResult()[0],
            'progress_bimbingan' => $this->db->query("SELECT * FROM tb_bimbingan a LEFT JOIN tb_profil_tambahan b ON a.`from`=b.`id` WHERE (a.`from` = '" . $id . "' OR a.`to` = '" . $id . "') AND (a.`from` = '" . session()->get('ses_id') . "' OR a.`to` = '" . session()->get('ses_id') . "') AND kategori_bimbingan=2 ORDER BY create_at ASC")->getResult(),
            'status_acc_revisi' => $this->db->query("SELECT * FROM tb_acc_revisi WHERE nim='$id' AND nip='" . session()->get('ses_id') . "' AND jenis_sidang='seminar proposal'")->getResult()
        ];
        $this->db->query("UPDATE tb_bimbingan SET status_baca='dibaca' WHERE `from`=$nim AND status_baca='belum dibaca' AND kategori_bimbingan=2");
        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan Dibaca','Bimbingan $nim dibaca ',now())");
        return view('Dosen/Proposal/bimbingan_revisi_proposal', $data);
    }
    public function acc()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $nim = $this->request->getPost('nim');
        $sebagai = $this->request->getPost('sebagai');
        $this->db->query("INSERT INTO tb_acc_revisi (nip,nim,jenis_sidang,sebagai) VALUES ('" . session()->get('ses_id') . "','$nim','seminar proposal','$sebagai')");
        return redirect()->to("/bimbingan_revisi_proposal_dosen/$nim");
    }
    public function tambah()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $nim = $this->request->getPost('nim');
        $id_bimbingan = $this->request->getPost('id_bimbingan');
        $pokok_bimbingan = $this->request->getPost('pokok_bimbingan');
        $keterangan = $this->request->getPost('keterangan');
        $berkas = $this->request->getFile('berkas');
        $name = $berkas->getRandomName();
        if ($berkas->getName() != '') {
            if ($berkas->move(WRITEPATH . '../public/berkas/', $name)) {
                $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,berkas,pokok_bimbingan,create_at,parent_id_bimbingan,kategori_bimbingan) VALUES('" . session()->get('ses_id') . "','$nim','belum dibaca','$keterangan','$name','$pokok_bimbingan',now(),'$id_bimbingan',2)");
                session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim revisi.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
                $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Revisi bimbingan $id_bimbingan',now())");
            } else {
                session()->setFlashdata("message_bimbingan", '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> kirim revisi.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            }
        } else {
            $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,pokok_bimbingan,create_at,parent_id_bimbingan,kategori_bimbingan) VALUES('" . session()->get('ses_id') . "','$nim','belum dibaca','$keterangan','$pokok_bimbingan',now(),'$id_bimbingan',2)");
            session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Revisi bimbingan $id_bimbingan',now())");
        }
        return redirect()->to("/bimbingan_revisi_proposal_dosen/$nim");
    }
    public function hapus()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $id_bimbingan = $this->request->getPost('id_bimbingan');
        $nim = $this->request->getPost('nim');
        $this->db->query("DELETE FROM tb_bimbingan WHERE id_bimbingan='$id_bimbingan'");
        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan Dihapus','id bimbingan $id_bimbingan dihapus ',now())");
        return redirect()->to("/bimbingan_revisi_proposal_dosen/$nim");
    }
}
