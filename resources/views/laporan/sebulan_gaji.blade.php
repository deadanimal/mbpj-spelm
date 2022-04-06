<html>

<head>
    <style>
        @page {
            margin: 50px 25px;
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
            <h5 style="margin: 0px 0px;">BORANG TUNTUTAN KERJA LEBIH MASA MELEBIHI SEBULAN GAJI
            </h5>
        </div>
        <h5 class="borang-c2">BORANG C2</h5>
    </header>
    <main>
        <p style="margin-top: 30px;">Jabatan/Unit : {{ $jabatan->GE_KETERANGAN_JABATAN }} </p>
        <p style="margin-top: 5px;display:inline-block;margin-right:250px;">Bahagian / Seksyen :
            {{ $bahagian->GE_KETERANGAN }}
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
    </main>

</body>


</html>
