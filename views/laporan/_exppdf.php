<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Laporan DPA</title>
        <style type="text/css">
            @page {
                margin-top: 2.5cm;
                margin-bottom: 2cm;
                margin-left: 2.5cm;
                margin-right: 2cm;
            }
            table{border-spacing: 0;border-collapse: collapse; width: 100%;}
            table td, table th{border: 1px solid #ccc;}
        </style>
    </head>
    <body>
        <div class="page">
            <h1>Laporan DPA</h1>
            <table border="0">
                <tr>
                    <th>No</th>
                    <th>No Def</th>
                    <th>Kd Masalah</th>
                    <th>Pemilik</th>
                    <th>Uraian</th>
                    <th>Tahun</th>
                    <th>Pengolah</th>
                    <th>Rak</th>
                    <th>Box</th>
                    <th>Ket. DPA</th>
                </tr>
                <?php
                $no = 1;
                foreach ($dataProvider->getModels() as $arsip) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $arsip->no_def ?></td>
                    <td><?= $arsip->kd_masalah ?></td>
                    <td><?= $arsip->pemilik->nama_instansi ?></td>
                    <td><?= $arsip->uraian ?></td>
                    <td><?= $arsip->kurun_waktu ?></td>
                    <td><?= $arsip->pengolah->nama_pengolah ?></td>
                    <td><?= $arsip->rak->nama_rak ?></td>
                    <td><?= $arsip->no_box ?></td>
                    <td><?= $arsip->dpa->keterangan ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        
    </body>
</html>
