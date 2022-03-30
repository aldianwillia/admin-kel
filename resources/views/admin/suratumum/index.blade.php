@extends('layout.main')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

@section('container')

<div class="col-auto" style="margin-bottom: 10px">
  <a href="" class="btn btn-info">Export PDF</a>
</div>

<table class="table display mt-2" id="suratumumTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis surat</th>
        <th scope="col">Alasan</th>
        <th scope="col">Tujuan</th>
        <th scope="col">Status surat</th>
        <th scope="col" >Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $index => $item  )
      <tr>
        <td scope="row">{{ $index + 1}}</td>
        <td>{{ $item->penduduk->nama }}</td>
        <td>{{ $item->KlasifikasiSurat->uraian }}</td>
        <td>{{ $item->alasan }}</td>
        <td>{{ $item->tujuan }}</td>
        <td>@if ($item->status_surat == 0)
            <span class="badge rounded-pill bg-warning text-dark">Dalam proses</span>
            @endif
            @if ($item->status_surat == 1)
                <span class="badge rounded-pill bg-success">Di Setujui</span>
            @endif</td>
        <td>
          <a href="/exportpdf/{{ $item->id }}" type="button" class="btn btn-primary btn-sm ">Detail</a>
          <button type="button" class="btn btn-danger btn-sm" >Tolak</button>
        </td>
      </tr>
      @endforeach   
    </tbody>
  </table>  
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready( function () {
    $('#suratumumTable').DataTable();
} );
</script>
@endpush