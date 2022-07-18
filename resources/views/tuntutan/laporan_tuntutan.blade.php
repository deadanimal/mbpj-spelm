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
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;
    }

    p,
    h5 {
        margin: 0%;
        font-size: 12px;
    }
</style>

<div>
    <div style="width: 100%" style="">
        <img src="C:\laragon\www\spelm\public\storage\img\mbpj.png" width="100" height="100" style="margin-left: 40%;">
    </div>
    <div>
        <h2 class="h2 text-white d-inline-block mb-0" style="margin-left: 20%;">Sistem Pengurusan Elaun Lebih Masa
        </h2>
        <h3 class="h2 text-white d-inline-block mb-0" style="margin-left: 5%;">Laporan Kenyataan Tuntutan Elaun
            Lebih
            Masa dan Elaun Standby </h3>

    </div>
    <div style="clear:both;">
        <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: left;">&nbsp;</p>
    </div>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;Nama Kakitangan :{{ $getuser->name }}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;NRIC :{{ $getuser->nric }} </span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;No Pekerja :{{ $getuser->user_code }}</span></p><br>

    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;Bahagian :{{ $bahagian }}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;Gaji Bersih : RM{{ $gaji }} </span></p>


    <table class="div-center center" style="margin-bottom:40px;margin-top:50px;">
        <thead>
            <tr>
                <th>Waktu Mula <br> /Waktu Akhir</th>
                <th>Rekod <br> E-Kedatangan</th>
                <th>Hari Biasa <br> Siang / Malam</th>
                <th>Hari Rehat <br> Siang / Malam</th>
                <th>Pelepasan Am <br> Siang / Malam</th>
                <th>Sebab</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($semak_tuntutan as $permohonan)
                <tr>
                    <td>{{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_mula_kerja)) }}
                        <br>/
                        {{ date('d-m-Y H:i:s', strtotime($permohonan->sebenar_akhir_kerja)) }}
                    </td>
                    <td>
                        <h5> Tarikh : <span style="color: red">{{ $permohonan->tarikh }}</span>
                        </h5>
                        <h5> Mula : <span style="color: red">
                                {{ $permohonan->clockintime }}</span> </h5>
                        <h5> Akhir : <span style="color: red">{{ $permohonan->clockouttime }}</span>
                        </h5>
                        <h5> Status : <span style="color: red">{{ $permohonan->statusdesc }}</span>
                        </h5>
                        <h5> Waktu Anjal : <span style="color: red">{{ $permohonan->waktuanjal }}</span>
                        </h5>
                    </td>
                    <td>
                        {{ $permohonan->jumlah_biasa_siang ?? '0' }}
                        <br><br>
                        {{ $permohonan->jumlah_biasa_malam ?? '0' }}
                    </td>
                    <td>
                        {{ $permohonan->jumlah_rehat_siang ?? '0' }}
                        <br><br>
                        {{ $permohonan->jumlah_rehat_malam ?? '0' }}
                    </td>
                    <td>
                        {{ $permohonan->jumlah_am_siang ?? '0' }}
                        <br><br>
                        {{ $permohonan->jumlah_am_malam ?? '0' }}
                    </td>
                    <td>
                        {{ $permohonan->tujuan }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="div-center center" style="margin-bottom:40px;margin-top:50px;">
        <thead>
            <tr>
                <th colspan="2">LEBIH MASA</th>
                <th>KADAR</th>
                <th>JUMLAH JAM</th>
                <th>PENGIRAAN</th>
                <th>PERSAMAAN JAM</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th rowspan="2">Hari Biasa </th>
                <th>Siang</th>
                <td>1 1/8</td>
                <td> {{ $a = number_format((float) $permohonan->jumlah_biasa_siang, 3, '.', '') ?? '0.000' }}</td>
                <td> {{ '1.125 x ' . $a }} </td>
                <td>{{ 1.125 * $a }} JAM</td>
            </tr>
            <tr>
                <th>Malam</th>
                <td>1 1/4</td>
                <td>{{ $b = number_format((float) $permohonan->jumlah_biasa_malam, 3, '.', '') ?? '0.000' }}</td>
                <td>{{ '1.250 x ' . $b }}</td>
                <td>{{ 1.25 * $b }} JAM</td>
            </tr>
            <tr>
                <th rowspan="2">Hari Rehat </th>
                <th>Siang</th>
                <td>1 1/4</td>
                <td> {{ $c = number_format((float) $permohonan->jumlah_rehat_siang, 3, '.', '') ?? '0.000' }}</td>
                <td>{{ '1.250 x ' . $c }}</td>
                <td>{{ 1.25 * $c }} JAM</td>
            </tr>
            <tr>
                <th>Malam</th>
                <td>1 1/2</td>
                <td>{{ $d = number_format((float) $permohonan->jumlah_rehat_malam, 3, '.', '') ?? '0.000' }}</td>
                <td>{{ '1.500 x ' . $d }}</td>
                <td>{{ 1.5 * $d }} JAM</td>
            </tr>
            <tr>
                <th rowspan="2">Hari Pelepasan Am </th>
                <th>Siang</th>
                <td>1 3/4</td>
                <td> {{ $e = number_format((float) $permohonan->jumlah_am_siang, 3, '.', '') ?? '0.000' }}</td>
                <td>{{ '1.750 x ' . $e }}</td>
                <td>{{ 1.75 * $e }} JAM</td>
            </tr>
            <tr>
                <th>Malam</th>
                <td>2</td>
                <td>{{ $f = number_format((float) $permohonan->jumlaham_malam, 3, '.', '') ?? '0.000' }}</td>
                <td>{{ '2.000 x ' . $f }}</td>
                <td>{{ 2 * $f }} JAM</td>
            </tr>
        </tbody>
    </table>



    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><br></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;</span><span
            style="font-family:'Avenir Next Regular';">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: center; line-height: 120%; font-size: 10pt;"><span
            style="font-family:'Superclarendon Light'; color:#191919;">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan Elaun
                    Lebih Masa</a>
            </div>
        </span></p><br>
    <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: center; line-height: 120%; font-size: 10pt;"><span
            style="font-family:'Superclarendon Light'; color:#191919;">
            <div class="copyright text-center  text-lg-left  text-muted">
                <a class="font-weight-bold ml-1" target="">Tarikh Laporan Dijana - {{ $currentdate }}
                </a>
            </div>
        </span></p>
    <div style="clear: both; text-align: center;">
        <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: left;">&nbsp;</p>
    </div>
</div>
