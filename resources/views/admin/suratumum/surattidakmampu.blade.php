<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    
    </style>
    <title>Surat Keterangan Tidak Mampu</title>
</head>
<body>
    <table style="text-align:center; width:100% ">
        @foreach ($data as $item)
        <tr>
            <td><img src="{{ asset('images/logo_Bukittinggi.png') }}" style="width: 90px;"><hr> </td>
            <td  style="text-align: center;">
                <p style="line-height: 2px; font-size:18px">PEMERINTAHAN KOTA BUKITTINGGI</p>
                <p style="line-height: 2px; font-size:18px ">KECAMATAN {{ $item->penduduk->kecamatan }}</p>
                <p style="line-height: 2px; font-size:33px " >KELURAHAN {{ $item->penduduk->kelurahan }}</p>
                <p style="line-height: 2px; font-size:14px">Jalan Sanjai Dalam Kode Pos 26129 Bukittinggi</p>
                <hr>
            </td>
        </tr>
        @endforeach 
    </table>

    @foreach ($data as $item)
        <h3 style="text-align: center; text-decoration:underline">SURAT KETERANGAN TIDAK MAMPU</h3>
        <p style="text-align: center;line-height: 1px ">Nomor:420/.../KEL-MG/XII-2021</p><br>

        <p style="text-indent: 0.5in">Yang bertanda tangan dibawah ini Lurah {{ $item->penduduk->kelurahan }} Kecamatan {{ $item->penduduk->kecamatan }} Kota Bukittinggi dengan ini menerangkan bahwa:</p><br>
    @endforeach
    
    <table style="margin-left: 130px; margin-right:auto; " cellpadding="3" >
            @foreach ($data as $item)
            <tr>
                <td>Nama</td>
                <td>:{{ $item->penduduk->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:{{ $item->nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tgl.Lahir</td>
                <td>:{{ $item->penduduk->tmp_lahir }},{{ $item->penduduk->tgl_lahir }}</td>
            </tr>
            <tr>
                <td>Agama/Kewarganegaraan</td>
                <td>:{{ $item->penduduk->agama }}/Indonesia</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:{{ $item->penduduk->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:{{ $item->penduduk->alamat }}/RT.{{ $item->penduduk->rt }}/RW{{ $item->penduduk->rw }}<br>
                     Kelurahan:{{ $item->penduduk->kelurahan }}<br>
                     Kecamatan:{{ $item->penduduk->kecamatan }}<br>
                     Kota/Kab:{{ $item->penduduk->kotakab }}
                </td>
            </tr>
            @endforeach
    </table>
    
    @foreach ($data as $item)
    <p style="text-indent: 0.5in; line-height: 100%" >Nama tersebut diatas adalah penduduk Kelurahan {{ $item->penduduk->kelurahan }} Kecamatan
   {{$item->penduduk->kecamatan}} Kota Bukittinggi. Sesuai dengan data base yang ada di kelurahan termasuk KELUARGA TIDAK MAMPU,
   dengan tanggungan sebagai berikut:</p>
   @endforeach

   <table style="margin-left: 130px; margin-right:auto; " border="1">
       <thead>
           <tr>
               <th>No</th>
               <th>Nama</th>
               <th>Pekerjaan</th>
               <th>ket</th>
           </tr>
       </thead>
       <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
       </tbody>
   </table>

   <P style="text-indent: 0.5in; line-height: 130%">Demikianlah Surat Keterangan ini dikeluarkan untuk dapat dipergunakan sebagai {{ $item->tujuan }}
   </P>

   @foreach ($data as $item)
    <div style="margin-left: 450px; margin-top:10px; text-align:center" >
        <p style="line-height: 10%">Bukittinggi, {{ $item->created_at }}</p>
        <p  style="line-height: 10%">a.n.LURAH {{ $item->penduduk->kelurahan }}</p>
        <p  style="line-height: 50%">Kasi Agsosbud</p><br>
        <p style=" text-decoration:underline;  margin-top:30px"> WENNY KELDA, S.Sog</p>
        <p style="line-height: 10%">NIP:196 0109 1983030 2 004</p>
    </div>
    @endforeach

</body>
</html>