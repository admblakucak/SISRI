<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
            <td style="border: 1px solid black;text-align:center;" rowspan="2">
                <img src="<?= base_url('image/Logo_UTM.png') ?>" style="width: 100px;">
            </td>
            <td style="text-align:center;font-size: 18px;border: 1px solid black;"><b>FORM</b></td>
            <td style="border: 1px solid black;" colspan="2" style="text-align:center;">No. Dokumen : <b>F.S.JMF.05</b></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;font-size: 18px;border: 1px solid black;"><b>MONITORING KEGIATAN PEMBIMBINGAN</b></td>
            <td style="border: 1px solid black;">Tanggal : -</td>
        </tr>
    </table>

    <p>
    <table>
        <tr>
            <th align="left"> Nama </th>
            <td> : <?= session()->get('ses_nama') == '' ?></td>
        </tr>
        <tr>
            <th align="left"> NIM / NRP </th>
            <td> : <?= session()->get('ses_id') == '' ?></td>
        </tr>
        <tr>
            <th align="left"> Judul Skripsi </th>
            <td> : NOMOR/BERITA/ACARA</td>
        </tr>
    </table>
    </p>

    <p>
    <table style="border: 1px solid black;border-collapse: collapse;font-size: 11px" rules="cols" width="100%">
        <tr style="margin: 5px">
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">Tanggal</th>
            <th style="border: 1px solid black;">Topik Bimbingan</th>
            <th style="border: 1px solid black;">Status</th>
        </tr>
        <tr style="margin: 5px">
            <td>1</td>
            <td>Alat 1</td>
            <td>Merek 1</td>
            <td>asdasd</td>
        </tr>
        <tr style="margin: 5px">
            <td>1</td>
            <td>Alat 1</td>
            <td>Merek 1</td>
            <td>asdasd</td>
        </tr>
    </table>


    </p>

    <br>

    <p>
        Demikian Berita Acara inl dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.
    </p>

    <p>
    <table width="100%">
        <tr>
            <td align="center" width="50%"></td>
            <td align="center">Diketahui oleh<br><br><br><br><br><u>Nama Diketahui</u><br>Manajer</td>
        </tr>
    </table>
    </p>

    <p class="footer">
        <small>Fakultas Teknik - Universitas Trunojoyo Madura</small>
    </p>

</body>

</html>