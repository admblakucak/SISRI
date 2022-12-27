<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Title -->
    <title> SISRI - <?= $title; ?></title>
    <style type="text/css">
        p {
            margin: 5px 0 0 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
            display: block;
        }

        .bold {
            font-weight: bold;
        }

        #footer {
            clear: both;
            position: relative;
            height: 40px;
            margin-top: -40px;
        }
    </style>
</head>

<body style="font-size: 12px">
    <table width="100%" style="border: 1px solid black;border-collapse: collapse;">
        <tr>

            <td style="border: 1px solid black;text-align:center;padding: 10px;" rowspan="2">
                <img src="<?= base_url('image/Logo_UTM.png') ?>" style="width: 100px;">
            </td>
            <td style="text-align:center;font-size: 18px;border: 1px solid black;"><b>FORM</b></td>
            <td style="border: 1px solid black;text-align:center;padding: 5px;" colspan="2">No. Dokumen : <b>F.S.JMF.07</b></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;font-size: 18px;border: 1px solid black;"><b>BERITA ACARA SEMINAR PROPOSAL SKRIPSI</b></td>
            <td style="border: 1px solid black;padding: 5px;text-align:center;">Tanggal : <b><?= date('d-m-Y') ?></b></td>
        </tr>
    </table>
    <p><b>Pada,</b></p>
    <p>
    <table>
        <tr>
            <th align="left"> Hari / Tanggal </th>
            <td> : <?= $nama ?></td>
        </tr>
        <tr>
            <th align="left"> Pukul </th>
            <td> : <?= $nim ?></td>
        </tr>
        <tr>
            <th align="left"> Tempat </th>
            <td> : <?= $judul_skripsi ?></td>
        </tr>
    </table>
    </p>
    <p><b>Telah dilaksanakan Sidang Skripsi oleh,</b></p>
    <p>
    <table>
        <tr>
            <th align="left"> Nama </th>
            <td> : <?= $nama ?></td>
        </tr>
        <tr>
            <th align="left"> NIM / NRP </th>
            <td> : <?= $nim ?></td>
        </tr>
        <tr>
            <th align="left"> Judul Skripsi </th>
            <td> : <?= $judul_skripsi ?></td>
        </tr>
    </table>
    </p>
    <br>
    <p>
    <table width="100%" style="border: 1px solid black;border-collapse: collapse;">
        <tr>
            <td align="center" width="20%" style="border: 1px solid black;text-align:center;">
                Diketahui oleh<br>Pembimbing <?= $dosen_pembimbing_1[0]->sebagai ?><br><?= $qr_pembimbing_1 ?><br><u><?= $dosen_pembimbing_1[0]->gelardepan . ' ' . $dosen_pembimbing_1[0]->nama . ', ' . $dosen_pembimbing_1[0]->gelarbelakang ?></u><br>NIP. <?= $dosen_pembimbing_1[0]->nip ?>
            </td>
            <td align="center" width="20%" style="border: 1px solid black;text-align:center;">
                Diketahui oleh<br>Pembimbing <?= $dosen_pembimbing_2[0]->sebagai ?><br><?= $qr_pembimbing_1 ?><br><u><?= $dosen_pembimbing_2[0]->gelardepan . ' ' . $dosen_pembimbing_2[0]->nama . ', ' . $dosen_pembimbing_2[0]->gelarbelakang ?></u><br>NIP. <?= $dosen_pembimbing_2[0]->nip ?>
            </td>
            <td align="center" width="20%" style="border: 1px solid black;text-align:center;">
                Diketahui oleh<br>Penguji <?= $penguji_1[0]->sebagai ?><br><?= $qr_penguji_1 ?><br><u><?= $penguji_1[0]->gelardepan . ' ' . $penguji_1[0]->nama . ', ' . $penguji_1[0]->gelarbelakang ?></u><br>NIP. <?= $penguji_1[0]->nip ?>

            </td>
            <td align="center" width="20%" style="border: 1px solid black;text-align:center;">
                Diketahui oleh<br>Penguji <?= $penguji_2[0]->sebagai ?><br><?= $qr_penguji_2 ?><br><u><?= $penguji_2[0]->gelardepan . ' ' . $penguji_2[0]->nama . ', ' . $penguji_2[0]->gelarbelakang ?></u><br>NIP. <?= $penguji_2[0]->nip ?>

            </td>
            <td align="center" width="20%" style="border: 1px solid black;text-align:center;">
                Diketahui oleh<br>Penguji <?= $penguji_3[0]->sebagai ?><br><?= $qr_penguji_3 ?><br><u><?= $penguji_3[0]->gelardepan . ' ' . $penguji_3[0]->nama . ', ' . $penguji_3[0]->gelarbelakang ?></u><br>NIP. <?= $penguji_3[0]->nip ?>
            </td>
        </tr>
    </table>
    </p>
    <br><br><br>
    <p align='left' style="font-size: 10px">
        <b>
            Catatan :
            <ol style="font-size: 10px">
                <li>Minimal kegiatan monitoring pada Pembimbing I sebanyak 3 kali dan Pembimbing II sebanyak 3 kali (akumulasi 6 kali kegiatan monitoring)</li>
                <li>Form ini harus DITUNJUKKAN ke Koordinator Skripsi pada saat MENDAFTAR SEMINAR USULAN SKRIPSI</li>
                <li>Sudah memprogram Skripsi di KRS, menunjukkan KRS pada saat mendaftar</li>
            </ol>
        </b>
    </p>
    <p class="footer">
    <table width='100%'>
        <tr>
            <td align="left">
                <a style="font-size: 10px">Dibuat rangkap 2, untuk:</a>
                <ol style="font-size: 10px">
                    <li>Koordinator Program Studi (Lembar dengan Tanda Tangan Asli)</li>
                    <li>Mahasiswa yang bersangkutan (Foto Copy)</li>
                </ol>
            </td>
            <td text-align="right" valign='top'>
                <small>Fakultas Teknik - Universitas Trunojoyo Madura</small>
            </td>
        </tr>
    </table>
    </p>
</body>

</html>