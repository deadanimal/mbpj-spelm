<style>
    @page {
        margin: 100px 25px;
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
        <h2 class="h2 text-white d-inline-block mb-0" style="margin-left: 20%;">Sistem Pengurusan Elaun Lebih Masa</h2>
        <h3 class="h2 text-white d-inline-block mb-0" style="margin-left: 15%;">Laporan Permohonan dan Tuntutan Elaun
            Lebih Masa</h3>

    </div>
    <div style="clear:both;">
        <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: left;">&nbsp;</p>
    </div>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;Nama Kakitangan : {{ $getuser->name }}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;NRIC : {{ $getuser->nric }}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span
            style="font-family:'Avenir Next Regular';">&nbsp;No Pekerja : {{ $getuser->user_code }}</span></p>

    <h3 style="margin-top: 50px;">Tuntutan</h3>
    <table class="center div-center">
        <thead>
            <th style="width: 20%">No.</th>
            <th>
                Pegawai Sokong
                <br>
                Pegawai Lulus
            </th>

            <th>
                Jumlah Jam
            </th>
            <th>
                Dapatan (RM)
            </th>
        </thead>
        <tbody>
            @foreach ($tuntutans as $tuntutan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tuntutan->pegawaiSokong }} <br> <br> {{ $tuntutan->pegawaiLulus }}</td>
                    <td>{{ $tuntutan->jumlah_jam }}</td>
                    <td>RM {{ round($tuntutan->dapatan, 2) }}</td>
                </tr>
            @endforeach
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
                &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan Elaun Lebih
                    Masa</a>
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
