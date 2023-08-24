<html>

<head>
    <style>
        @page {
            margin: 50px 50px;
        }


        .center {
            text-align: center;
        }

        .div-center {
            margin: auto;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        p {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0%;
            font-size: 12px;
        }

        .borang-c2 {
            position: absolute;
            left: 650px;
            top: -50px;
        }

        .page-break {
            page-break-after: always;
        }

    </style>
</head>

<body>

    <header>
        <div class="center">
            <img style="width: 55px; height:55px;" src="{{ url('/assets/img/logo_laporan_pekerja_tetap.jpg') }}"
                alt="">
            <h5 style="margin: 0px 2px;">MAJLIS BANDARAYA PETALING JAYA</h5>
            <h5 style="margin: 0px 0px;">BORANG TUNTUTAN KERJA LEBIH MASA MELEBIHI 1/3 GAJI
            </h5>
        </div>
        <h5 class="borang-c2">BORANG C2</h5>
    </header>
    <main>
        <p style="margin-top: 30px;">Jabatan/Unit : {{ $jabatan->ge_keterangan_jabatan }} </p>
        <p style="margin-top: 5px;display:inline-block;margin-right:250px;">Bahagian / Seksyen :
            {{ $bahagian->ge_keterangan }}
        </p>
        <p style="margin-top: 5px;display:inline-block;">Tarikh : 01.01.2022</p>
        <p style="margin-top: 15px;">Y.Bhg. Datuk Bandar,</p>
        <p style="margin-top: 5px;">Permohonan kelulusan kerja lebih masa melebihi daripada satu (1) bulan gaji :</p>

        <table class="div-center center" style="margin: 4px 4px; margin-bottom:40px;">
            <tr style="background-color:lightgray;">
                <th>BIL</th>
                <th>Nama Kakitangan/ <br> Bahagian/Unit </th>
                <th>Tempoh <br> Kerja Lebih <br> Masa <br> Dilakukan <br>(jam)</th>
                <th>Jumlah <br> (RM) </th>
                <th>Jenis-jenis Kerja Dilakukan</th>
            </tr>
            @foreach ($tuntutans as $tuntutan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tuntutan->user->name }}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            @endforeach
        </table>

        <div class="page-break"></div>
        <p style="margin-top: 100px;">Implikasi Kewangan :</p>
        <table class="div-center center" style="margin: 4px 4px; margin-bottom:40px;">
            <tr>
                <th>VOT Peruntukan</th>
                <th>Peruntukan <br> Dilulus <br> (RM)</th>
                <th>Baki Peruntukan <br> (RM)</th>
                <th>Peruntukan <br> Diperlukan <br> (RM)</th>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td colspan="3">
                    <h5 style="margin: 0%;">Jumlah RM diperlukan</h5>
                </td>
                <td></td>
            </tr>
        </table>

        <div class="page-break"></div>

        <p style="margin-top: 50px; font-weight: bold;">Saya mengesahkan tuntutan yang dibuat oleh kakitangan yang
            disenaraikan di atas
            adalah diakui benar dan saya berpuashati tuntutan ini dibuat mengikut Pekeliling Majlis Bil.3 Tahun 2020.
            Adalah mustahak bagi pegawai ini bekerja lebihmasa dan dibayar kerana cuti rehat tidak dapat diluluskan</p>

        <p style="margin-top: 50px;">____________________</p>
        <p style="margin-top: 5px;font-weight: bold;">(AZHAR BIN ZAKARIA)</p>
        <p style="margin-top: 5px;">Penolong Pengarah Kanan, <br> Bahagian Mekanikal dan Elektrikal, <br> Jabatan
            Kejuruteraan, <br> Majlis Bandaraya Petaling Jaya</p>
        <p style="margin-top: 10px;">Tarikh : </p>

        <p style="margin-top: 20px;font-weight: bold;">Ketua Bahagian/Seksyen, </p>
        <p style="margin-top: 10px;">Permohonan elaun lebih masa melebihi daripada 1/3 gaji tersebut adalah diluluskan /
            tidak diluluskan. </p>

        <p style="margin-top: 50px;">____________________</p>
        <p style="margin-top: 5px;font-weight: bold;">(AZHAR BIN ZAKARIA)</p>
        <p style="margin-top: 5px;">Penolong Pengarah Kanan, <br> Bahagian Mekanikal dan Elektrikal, <br> Jabatan
            Kejuruteraan, <br> Majlis Bandaraya Petaling Jaya</p>
        <p style="margin-top: 10px;">Tarikh : </p>
        <p style="margin-top: 50px;">Catatan : </p>
        <p style="margin-top: 20px;">Sila isi dua (2) salinan. Setelah diluluskan oleh Ketua Jabatan, sila kemukakan
            salinan asal kepada Bendahari dan salinan kedua disimpan oleh Ketua Jabatan/Unit berkenaan. </p>
        <p style="margin-top: 20px;">Kerja lebih masa tidak dibenarkan pada cuti am atau hujung minggu kecuali
            kerja-kerja yang bersifat kecemasan. </p>
        <p style="margin-top: 20px;">s.k. : BEP </p>

    </main>

</body>


</html>
