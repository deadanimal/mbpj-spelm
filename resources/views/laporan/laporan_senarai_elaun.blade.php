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

        p {
            margin: 0%;
            font-size: 12px;
        }

    </style>
</head>

<body>
    <script type="text/php">
        if ( isset($pdf) ) {
                $x = 790;
                $y = 53;
                $text = " Muka: {PAGE_NUM}";
                $font = $fontMetrics->get_font("times");
                $size = 9;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>
    <header>
        <div class="center">
            <h5 style="margin: 0px 2px;">MAJLIS BANDARAYA PETALING JAYA</h5>
            <h5 style="margin: 0px 0px;font-size:11px;">SENARAI ELAUN LEBIH MASA BULANAN BAGI BULAN MAC DAN TAHUN 2022
            </h5>
            <h5 style="margin-top: 6px; font-size:11px;">KAKITANGAN</h5>
        </div>
        <div style="text-align: right; margin-top:-100px;">

            {{-- <p>Tarikh: 31-Mar-2022</p> --}}
            <p>Tarikh: {{ now()->format('d-F-Y') }}</p>
            <p>Masa: {{ now()->format('H:i:s') }}</p>

        </div>
    </header>
    <main>
        @foreach ($jabatan as $j)
            @isset($j->bahagians)
                @foreach ($j->bahagians as $b)
                    @isset($b->tuntutans_data)
                        <h6 style="margin: 0px 4px;">JABATAN: &nbsp;&nbsp;&nbsp;&nbsp; {{ $j->ge_keterangan_jabatan }}
                        </h6>
                        <h6 style="margin: 4px 4px;">BAHAGIAN: &nbsp;&nbsp;&nbsp;&nbsp; {{ $b->ge_keterangan }}
                        </h6>
                        <h6 style="margin: 8px 3px 0px;"> UNIT: &nbsp;&nbsp;&nbsp;&nbsp; {{ $loop->iteration }}
                        </h6>
                        <div>
                            <table class="div-center center" style="margin: 4px 4px; margin-bottom:40px;">
                                <tr style="background-color:lightgray;">
                                    <th>BIL</th>
                                    <th>NAMA</th>
                                    <th>NO. K/P <br>/ NO. SIRI</th>
                                    <th>NO PEKERJA</th>
                                    <th>KOD ELAUN</th>
                                    <th>JENIS ELAUN LEBIH MASA</th>
                                    <th>VOT ELAUN</th>
                                    <th>JUMLAH MASA</th>
                                    <th>JUMLAH <br>(RM)</th>
                                </tr>
                                @foreach ($b->tuntutans_data as $tuntutan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tuntutan->user->name }}</td>
                                        <td>{{ $tuntutan->user->nric }}</td>
                                        <td>{{ $tuntutan->user->user_code }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endisset
                @endforeach
            @endisset
        @endforeach

    </main>

</body>


</html>
