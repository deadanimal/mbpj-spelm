<div>
    <div style="width: 100%" style="">
        <img src="C:\laragon\www\spelm\public\storage\img\mbpj.png" width="100" height="100" style="margin-left: 40%;">
    </div>
    <div>
        <h2 class="h2 text-white d-inline-block mb-0" style="margin-left: 20%;">Sistem Pengurusan Elaun Lebih Masa</h2>
        <h3 class="h2 text-white d-inline-block mb-0" style="margin-left: 5%;">Laporan Kenyataan Tuntutan Elaun Lebih Masa dan Elaun Standby </h3>

    </div>
    <div style="clear:both;">
        <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: left;">&nbsp;</p>
    </div>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;Nama Kakitangan :{{$getuser->name}}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;NRIC :{{$getuser->nric}} </span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;No Pekerja :{{$getuser->user_code}}</span></p><br>

    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;Bahagian :{{$getuser->name}}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;Gaji Bersih :{{$getuser->nric}} </span></p>
    {{-- <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;No Pekerja :{{$getuser->user_code}}</span></p><br> --}}


    

{{-- <div>


    <p id="isPasted" style="margin-top: 9pt; margin-bottom: 0pt; line-height: 83%; font-size: 9pt; text-align: center;"><span style="font-family:Tahoma; letter-spacing:0.25pt;">Nama&nbsp;</span><u><span style="font-family:Verdana; letter-spacing:0.25pt;">: {{$getuser->name}}&nbsp;</span></u><span style="width:60.00pt; display:inline-block;">&nbsp;</span><span style="font-family:Tahoma; letter-spacing:0.15pt;">lawatan&nbsp;</span><u><span style="font-family:Verdana; letter-spacing:0.15pt;">: ******** PEGAWAI TEKNOLOGI MAKLUMI</span></u><span style="font-family:Tahoma; letter-spacing:0.15pt;">&nbsp;</span></p>
    <p id="isPasted" style="margin-top: 9pt; margin-bottom: 0pt; line-height: 83%; font-size: 9pt; text-align: center;"><span style="font-family:Tahoma; letter-spacing:0.25pt;">Nama&nbsp;</span><u><span style="font-family:Verdana; letter-spacing:0.25pt;">: {{$getuser->name}}&nbsp;</span></u><span style="width:60.00pt; display:inline-block;">&nbsp;</span><span style="font-family:Tahoma; letter-spacing:0.15pt;">lawatan&nbsp;</span><u><span style="font-family:Verdana; letter-spacing:0.15pt;">: ******** PEGAWAI TEKNOLOGI MAKLUMI</span></u><span style="font-family:Tahoma; letter-spacing:0.15pt;">&nbsp;</span></p>
    <p style="margin-top: 9pt; margin-bottom: 0pt; line-height: 83%; font-size: 9pt; text-align: center;"><br></p>
    <p style="margin-top: 8.5pt; margin-bottom: 0pt; line-height: 1pt; text-align: center;"><br></p>
</div>
<p><br></p>
<p><br></p> --}}

    <table cellpadding="0" cellspacing="0" style="margin-left:4.96pt; border:0.88pt solid #000000; border-collapse:collapse;">
        <tbody>
            <tr style="height:24.5pt;">
                <td rowspan="2" style="width:61.78pt; border-right-style:solid; border-right-width:0.88pt; border-bottom-style:solid; border-bottom-width:0.88pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">WAKTU MULA</span></strong></p>
                </td><br>
                <td rowspan="2" style="width:61.78pt; border-right-style:solid; border-right-width:0.88pt; border-bottom-style:solid; border-bottom-width:0.88pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">WAKTU AKHIR</span></strong></p>
                </td>
                {{-- <td rowspan="2" style="width: 25.2925%; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-left:7.2pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">MASA BEKERJA&nbsp;</span></strong><br><strong><span style="font-family:Arial;">LEBIHMASA</span></strong></p>
                </td> --}}
                <td colspan="2" style="width: 12.6333%; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">HARI BIASA</span></strong></p>
                </td>
                <td colspan="2" style="width: 12.3507%; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">HARI REHAT</span></strong></p>
                </td>
                <td colspan="2" style="width: 13.1442%; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">KELEPASAN&nbsp;</span></strong><br><strong><span style="font-family:Arial;">AM</span></strong></p>
                </td>
                <td rowspan="2" style="width: 7.4949%; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:110%; font-size:9pt;"><strong><span style="font-family:Arial;">JUMLAH&nbsp;</span></strong><br><strong><span style="font-family:Arial;">JAM</span></strong></p>
                </td>
                <td rowspan="2" style="width: 23.5951%; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: top;">
                    <p style="margin: 0pt 16.2pt 0pt 12.6pt; text-indent: -7.2pt; font-size: 9pt; text-align: center;"><strong><span style="font-family:Arial; letter-spacing:-0.35pt;">SEBAB KERJA&nbsp;</span></strong><strong><span style="font-family:Arial; letter-spacing:-0.1pt;">LEBIHMASA</span></strong></p>
                </td>
            </tr>
            <tr style="height:13.65pt;">
                <td style="width: 6.3502%; border-style: solid; border-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top: 0pt; margin-right: 3pt; margin-bottom: 0pt; text-align: center; font-size: 9pt;"><strong><span style="font-family:Arial;">SIANG</span></strong></p>
                </td>
                <td style="width: 6.3399%; border-style: solid; border-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">MALAM</span></strong></p>
                </td>
                <td style="width: 5.7648%; border-style: solid; border-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">SIANG</span></strong></p>
                </td>
                <td style="width: 6.5407%; border-style: solid; border-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">MALAM</span></strong></p>
                </td>
                <td style="width: 6.1041%; border-style: solid; border-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:Arial;">SIANG</span></strong></p>
                </td>
                <td style="width: 7.0094%; border-style: solid; border-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top: 0pt; margin-right: 5.8pt; margin-bottom: 0pt; text-align: center; font-size: 9pt;"><strong><span style="font-family:Arial; letter-spacing:-0.4pt;">MALAM</span></strong></p>
                </td>
            </tr>
            <tbody>
             @foreach($semak_tuntutan as $semak_tuntutans)
                <tr style="height:38.7pt;">
                    <td style="width:61.78pt; border-top-style:solid; border-top-width:0.88pt; border-right-style:solid; border-right-width:0.88pt; border-bottom-style:solid; border-bottom-width:0.88pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["sebenar_mula_kerja"]}}</span></strong></p>
                    </td>
                    <td style="width:61.78pt; border-top-style:solid; border-top-width:0.88pt; border-right-style:solid; border-right-width:0.88pt; border-bottom-style:solid; border-bottom-width:0.88pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["sebenar_akhir_kerja"]}}</span></strong></p>
                    </td>
                    {{-- <td style="width: 25.2925%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><strong><span style="font-family:Tahoma; letter-spacing:-0.3pt;">{{$semak_tuntutans["sebenar_akhir_kerja"]}}</span></strong></p>
                    </td> --}}
                    <td style="width: 6.3502%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jumlah_biasa_siang"]}}</span></strong></p>
                    </td>
                    <td style="width: 6.3399%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jumlah_biasa_malam"]}}</span></strong></p>
                    </td>
                    <td style="width: 5.7648%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jumlah_rehat_siang"]}}</span></strong></p>
                    </td>
                    <td style="width: 6.5407%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jumlah_rehat_malam"]}}</span></strong></p>
                    </td>
                    <td style="width: 6.1041%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jumlah_am_siang"]}}</span></strong></p>
                    </td>
                    <td style="width: 7.0094%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jumlah_am_malam"]}}</span></strong></p>
                    </td>
                    <td style="width: 7.4949%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["jam_tuntutan"]}}</span></strong></p>
                    </td>
                    <td style="width: 23.5951%; border-top-style: solid; border-top-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: bottom;">
                        <p style="margin-top: 7.2pt; margin-bottom: 0pt; font-size: 8pt; text-align: center;"><strong><span style="font-family:Tahoma;">{{$semak_tuntutans["tujuan"]}}</span></strong></p>

                    </td>
                </tr>
            @endforeach
            </tbody>
            <tr style="height:23.2pt;">
                <td style="width:61.78pt; border-top-style:solid; border-top-width:0.88pt; border-right-style:solid; border-right-width:0.88pt; vertical-align:top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 25.2925%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 6.3502%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 6.3399%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 5.7648%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 6.5407%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 6.1041%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 7.0094%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 7.4949%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family:Tahoma;">&nbsp;</span></p>
                </td>
                <td style="width: 23.5951%; border-top-style: solid; border-top-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><br></p>
                </td>
            </tr>
        </tbody>
        
    </table>
    <p><span style="font-size: 12px;"><br></span></p>
    <table cellpadding="0" cellspacing="0" style="margin-left: 4.96pt; border: 0.88pt solid rgb(0, 0, 0); border-collapse: collapse; margin-right: calc(2%); width: 98%;">
        <tbody>
            <tr style="height:24.5pt;">
                <td style="width: 25.8535%; border-right-style: solid; border-right-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><br></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><strong>LEBIH MASA</strong></span></p>
                </td>
                <td style="width: 8.7521%; border-right-style: solid; border-right-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><strong>KADAR</strong></span></p>
                </td>
                <td style="width: 15.7032%; border-right-style: solid; border-right-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><strong>JUMLAH JAM</strong></span></p>
                </td>
                <td style="width: 21.712%;"><span style="font-size: 12px;">&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>PENGIRAAN</strong></span></td>
                <td style="width: 27.8215%;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><br></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-size: 12px;"><strong>PERSAMAAN JAM</strong></span></p>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr style="height:38.7pt;">
                <td style="width: 25.8535%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-bottom-style: solid; border-bottom-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong>HARI &nbsp;BIASA SIANG</strong></span></p>
                </td>
                <td style="width: 8.7521%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>1 &nbsp; &nbsp;1/8</strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                </td>
                <td style="width: 15.7032%; border-style: solid; border-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; (-----------)</strong></span></p>
                </td>
                <td style="width: 21.712%;">
                    <div style="text-align: justify;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp;1.125 x (-------------) JAM</strong></span></div>
                </td>
                <td style="width: 27.8215%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(-----------------) JAM</strong></span></td>
            </tr>
        </tbody>
        <tbody>
            <tr style="height:23.2pt;">
                <td style="width: 25.8535%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family: Tahoma; font-size: 12px;"><strong>&nbsp;</strong></span></p>
                    <p id="isPasted" style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong>HARI BIASA MALAM</strong></span></p>
                </td>
                <td style="width: 8.7521%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family: Tahoma; font-size: 12px;"><strong>&nbsp;</strong></span></p>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>1 &nbsp; &nbsp;1/4</strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                </td>
                <td style="width: 15.7032%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 10pt; text-align: center;"><span style="font-family: Tahoma; font-size: 12px;"><strong>&nbsp;</strong></span></p>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp;(------------)</strong></span></p>
                </td>
                <td style="width: 21.712%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; 1.250 x (-------------) JAM</strong></span></td>
                <td style="width: 27.8215%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(-----------------) JAM</strong></span></td>
            </tr>
            <tr>
                <td style="width: 25.8535%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong>HARI REHAT SIANG</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 8.7521%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>1 &nbsp; &nbsp;1/4</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 15.7032%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp;&nbsp;</strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp;(------------)</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 21.712%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; 1.250 x (-------------) JAM</strong></span></td>
                <td style="width: 27.8215%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (-----------------) JAM</strong></span></td>
            </tr>
            <tr>
                <td style="width: 25.8535%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong>HARI REHAT MALAM</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 8.7521%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>1 &nbsp; &nbsp;1/2</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 15.7032%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp;&nbsp;</strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; (-----------)</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 21.712%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; 1.500 x (-------------) JAM</strong></span></td>
                <td style="width: 27.8215%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (------------------) JAM</strong></span></td>
            </tr>
            <tr>
                <td style="width: 25.8535%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong>HARI KELEPASAN SIANG</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 8.7521%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>1 &nbsp; &nbsp;3/4</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 15.7032%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;">
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp;&nbsp;</strong></span></p>
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp;( -----------)</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 21.712%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; 1.750 x (-------------) JAM</strong></span></td>
                <td style="width: 27.8215%;">
                    <div style="text-align: justify;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (------------------) JAM</strong></span></div>
                </td>
            </tr>
            <tr>
                <td style="width: 25.8535%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; vertical-align: top;"><span style="font-size: 12px;"><strong><br></strong></span>
                    <p id="isPasted" style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong>HARI KELEPASAN MALAM<br class="Apple-interchange-newline"></strong></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                </td>
                <td style="width: 8.7521%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-width: 0.88pt; vertical-align: top;">
                    <p style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong><br></strong></span></p>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>2</strong></span></p><span style="font-size: 12px;"><strong><br></strong></span>
                </td>
                <td style="width: 15.7032%; border-top-style: solid; border-top-width: 0.88pt; border-right-style: solid; border-right-width: 0.88pt; border-left-style: solid; border-left-width: 0.88pt; vertical-align: top;"><span style="font-size: 12px;"><strong><br></strong></span>
                    <p id="isPasted" style="margin-top: 0pt; margin-right: 17.5pt; margin-bottom: 0pt; text-align: center; font-size: 8pt;"><span style="font-size: 12px;"><strong>&nbsp;( -----------)</strong></span></p>
                </td>
                <td style="width: 21.712%;">
                    <div style="text-align: justify;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; 2.000 x (-------------) JAM</strong></span></div>
                </td>
                <td style="width: 27.8215%;"><span style="font-size: 12px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (------------------) JAM</strong></span></td>
            </tr>
        </tbody>
    </table>
    
   
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><br></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;</span><span style="font-family:'Avenir Next Regular';">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: center; line-height: 120%; font-size: 10pt;"><span style="font-family:'Superclarendon Light'; color:#191919;"><div class="copyright text-center  text-lg-left  text-muted">
        &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">Sistem Pengurusan Elaun Lebih Masa</a>
    </div></span></p><br>
    <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: center; line-height: 120%; font-size: 10pt;"><span style="font-family:'Superclarendon Light'; color:#191919;"><div class="copyright text-center  text-lg-left  text-muted">
       <a  class="font-weight-bold ml-1" target="">Tarikh Laporan Dijana - {{$currentdate}}
        </a>
    </div></span></p>
    <div style="clear: both; text-align: center;">
        <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: left;">&nbsp;</p>
    </div>
</div>
<div><br></div>
<p style="text-align: center;"><br></p>
<p style="margin-top: 0pt; margin-bottom: 0pt; text-align: center;"><br></p>
<p><br></p>
<p><br></p>