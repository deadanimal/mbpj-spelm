<div>
    <div style="width: 100%" style="">
        <img src="C:\laragon\www\spelm\public\storage\img\mbpj.png" width="100" height="100" style="margin-left: 40%;">
    </div>
    <div>
        <h2 class="h2 text-white d-inline-block mb-0" style="margin-left: 20%;">Sistem Pengurusan Elaun Lebih Masa</h2>
        <h3 class="h2 text-white d-inline-block mb-0" style="margin-left: 15%;">Laporan Permohonan dan Tuntutan Elaun Lebih Masa</h3>

    </div>
    <div style="clear:both;">
        <p style="margin-top: 0pt; margin-bottom: 0pt; text-align: left;">&nbsp;</p>
    </div>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;Nama Kakitangan : {{$getuser->name}}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;NRIC : {{$getuser->nric}}</span></p>
    <p style="margin-top: 0pt; margin-bottom: 9pt; line-height: 110%; font-size: 11pt; text-align: left;"><span style="font-family:'Avenir Next Regular';">&nbsp;No Pekerja : {{$getuser->user_code}}</span></p>

    <table cellpadding="0" cellspacing="0" style="width:100%; margin-left:5.4pt; border-collapse:collapse;">
        <thead>
            <tr style="height:12pt;">
                <td colspan="4" style="width: 371.25pt; border-bottom: 1pt solid rgb(181, 209, 152); padding: 4pt 4pt 3.5pt; vertical-align: top; background-color: rgb(80, 126, 37); text-align: center;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 12pt; text-align: center;"><strong><span style="font-family:'Superclarendon Regular'; color:#fefffe;"> Makluman</span></strong></p><br>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr style="height:14.65pt;">
                <td style="width:100%; border-top:1pt solid #b5d198; padding:3.5pt 4pt 4pt; vertical-align:top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 12pt; text-align: left;">&nbsp;Permohonan </p>
                </td>
                <td style="width:100%; border-top:1pt solid #b5d198; padding:3.5pt 4pt 4pt; vertical-align:top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 12pt; text-align: left;">&nbsp;Pengesahan </p>
                </td>
                <td style="width:100%; border-top:1pt solid #b5d198; padding:3.5pt 4pt 4pt; vertical-align:top;">
                    <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 12pt; text-align: left;">&nbsp;Tuntutan </p>
                </td>
                <td style="width:100%; border-top:1pt solid #b5d198; padding:3.5pt 4pt 4pt; vertical-align:top;">
                
                </td>
            </tr>
        </tbody>

            {{-- @foreach($report_ind as $report_inds)
            <tr style="height:14.65pt;">
                <td style="width:100%; border-top:1pt solid #b5d198; padding:3.5pt 4pt 4pt; vertical-align:top;"> --}}
                    {{-- <p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 12pt; text-align: left;">&nbsp; {{$report_inds->nama_rollcall->tajuk_rollcall}}</p> --}}
                {{-- </td>
                <td style="width:100%; border-top:1pt solid #b5d198; padding:3.5pt 4pt 4pt; vertical-align:top;">
                    
                    @if ($report_inds->lulus===1)
                    <span class="badge badge-pill badge-primary">Hadir</span>
                    @elseif ($report_inds->lulus===0)
                    <span class="badge badge-pill badge-primary">Tidak Hadir</span>
                    @elseif ($report_inds->lulus===null)
                    <span class="badge badge-pill badge-primary">Belum Hadir</span>

                    @endif
                </td>
            </tr>
            @endforeach
        </tbody> --}}
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
