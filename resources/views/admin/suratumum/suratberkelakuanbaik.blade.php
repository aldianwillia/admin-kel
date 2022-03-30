<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    
    </style>
    <title>Surat Keterangan Berkelakuan Baik</title>
</head>
<body>
    <table style="text-align:center; width:100% ">
        <tr>
            <td><img src="{{ asset('images/logo_Bukittinggi.png') }}" style="width: 90px;"><hr> </td>
            <td  style="text-align: center;">
                <p style="line-height: 2px; font-size:18px">PEMERINTAHAN KOTA BUKITTINGGI</p>
                <p style="line-height: 2px; font-size:18px ">KECAMATAN MANDIANGIN KOTO SELAYAN</p>
                <p style="line-height: 2px; font-size:33px " >KELURAHAN MANGGIS GANTING</p>
                <p style="line-height: 2px; font-size:14px">Jalan Sanjai Dalam Kode Pos 26129 Bukittinggi</p>
                <hr>
            </td>
        </tr>
    </table>
    <h3 style="text-align: center; text-decoration:underline">SURAT KETERANGAN BERKELAKUAN BAIK</h3>
    <p style="text-align: center;line-height: 1px ">Nomor:300/.../KEL-MG/VII-2020</p><br>

    <p style="text-indent: 0.5in">Yang bertanda tangan dibawah ini Lurah Manggis Ganting Kecamatan Mandiangin Koto Selayan Kota Bukittinggi dengan ini menerangkan bahwa:</p><br>

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
    <p style="text-indent: 0.5in; line-height: 130%" >Nama tersebut diatas adalah penduduk Kelurahan {{ $item->penduduk->kelurahan }} Kecamatan
   {{$item->penduduk->kecamatan}} Kota {{ $item->penduduk->kotakab }}. Sesuai dengan pernyataan diatas materai 6000 tanggal 10 Juli 2020
    dan diketahui oleh ketua RT.{{ $item->penduduk->rt }} RW.{{ $item->penduduk->rw }} Kel.{{ $item->penduduk->kelurahan  }}
    yang bersangkutan selama berada di Kelurahan ini berkelakuan baik dan tidak terikan oleh minuman keras dan
    belum pernah dihukum karna kejahatan.</p>
    <p style="text-indent: 0.5in; line-height: 130%">Demikianlah surat keterangan ini di keuarkan sebagai persyaratan Mengurus 
    Surat Berkelakuan Baik di Polres {{ $item->penduduk->kotakab  }} Guna Melamar Pekerjaan.</p>

    <div style="margin-left: 450px; margin-top:50px; text-align:center" >
        <p style="line-height: 10%">{{ $item->penduduk->kotakab}}, {{ $item->created_at }}</p>
        <p  style="line-height: 10%">a.n.LURAH MANGGIS GANTING</p>
        <p  style="line-height: 50%">Sekretaris</p><br>
        <p style=" text-decoration:underline;  margin-top:50px"> YEDRI, S.Sog</p>
        <p style="line-height: 10%">NIP:196 0109 1983030 2 004</p>
    </div>
    

    @endforeach

</body>
</html>