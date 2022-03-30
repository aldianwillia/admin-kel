@extends('layout.main')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

<!-- Table Data Pengajuan Surat Nikah -->
@section('container')
<table class="table display mt-2" id="suratnikahTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Calon</th>
        <th scope="col">Pasangan</th>  
        <th scope="col" style="text-align: center">Jenis Surat </th>
        <th scope="col" style="text-align: center">kawin Ke</th>
        <th scope="col" style="text-align: center">Tgl Nikah</th>
        <th scope="col" style="text-align: center">Tmp Nikah</th>
        <th scope="col" style="text-align: center">Mahar Nikah</th>
        <th scope="col" style="text-align: center">Status</th>
        <th scope="col" style="text-align: center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $index => $item  )
      <tr>
        <td scope="row">{{ $index + 1}}</td>
        <td>{{ $item->penduduk->nama }}</td>
        <td>{{ $item->penduduk_pasangan->nama }}</td>
        <td>{{ $item->KlasifikasiSurat->uraian }}</td>
        <td style="text-align: center">{{ $item->kawin_ke }}</td>
        <td style="text-align: center">{{ $item->tgl_nikah }}</td>
        <td style="text-align: center">{{ $item->tempat_nikah }}</td>
        <td style="text-align: center">{{ $item->mahar_nikah }}</td>
        <td style="text-align: center">@if ($item->status_surat == 0)
            <span class="badge rounded-pill bg-warning text-dark">Dalam proses</span>
            @endif
            @if ($item->status_surat == 1)
                <span class="badge rounded-pill bg-success">Di Setujui</span>
            @endif</td>
        <td>
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailsuratnikah-{{ $item->nik_calon }}">Detail</button>
          <button type="button" class="btn btn-danger btn-sm" >Tolak</button>
        </td>
      </tr>
    @endforeach   
  </tbody>
</table>
<!-- End Table Data Pengajuan Surat Nikah -->

@endsection

@push('js')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready( function () {
    $('#suratnikahTable').DataTable();
} );
</script>
@endpush