<html>

<head>
    <style>
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
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

        p,
        h5 {
            margin: 0%;
            font-size: 12px;
        }

    </style>
</head>

<body>

    <header>
        <div class="center">
            <h5 style="margin-top: 5px;">SENARAI NAMA TUNTUTAN KERJA LEBIH MASA</h5>
            <h5 style="margin-top: 5px;">JABATAN KEJURUTERAAN</h5>
            <h5 style="margin-top: 5px;">BULAN {{ $bulan }} TAHUN {{ $tahun }}</h5>
        </div>
        <div style="margin-left:570px;margin-top:38px;">
            <p style="display: inline-block; margin-right:30px;">{{ now()->format('d-m-Y') }}</p>
            <p style="display: inline-block; font-weight:bold">K/TANGAN 01</p>

        </div>
    </header>
    <main>
        <table class="div-center center" style="margin-bottom:40px;margin-top:50px;">
            <tr>
                <th>BIL</th>
                <th>NAMA</th>
                <th>NO <br> PEKERJA</th>
                <th>BULAN</th>
                <th>JUMLAH <br> JAM</th>
                <th style="width: 50px;"></th>
                <th style="width: 40px;"></th>
            </tr>
            @foreach ($tuntutans as $tuntutan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tuntutan->user->name }}</td>
                    <td>{{ $tuntutan->user->user_code }}</td>
                    <td>{{ $tuntutan->created_at->format('m') }}</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            @endforeach

        </table>

    </main>

</body>


</html>
