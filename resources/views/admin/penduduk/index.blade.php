@extends('layout.main')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

@section('container')

<h3>Data Penduduk</h3>

<div class="col-auto ma" style="margin-bottom: 10px">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalImport">
        Import Excel
    </button>
    <a href="pendudukexport"  class="btn btn-info" >
        Export Excel +
    </a>
</div>

<table class="table display mt-2" id="pendudukTable">   
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col" style="text-align: center">Nik</th>
        <th scope="col" style="text-align: center">KK</th>
        <th scope="col" style="text-align: center">Tempat Lahir </th>
        <th scope="col" style="text-align: center">Tanggal Lahir</th>
        <th scope="col" style="text-align: center">Jenis Kelamin</th>
        <th scope="col" style="text-align: center">Agama</th>
        <th scope="col" style="text-align: center">Alamat</th>
        <th scope="col" style="text-align: center; width:15%">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $index => $item  )
      <tr>
        <td scope="row">{{ $index + 1}}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->nik }}</td>
        <td>{{ $item->kk }}</td>
        <td style="text-align: center">{{ $item->tmp_lahir }}</td>
        <td style="text-align: center">{{ $item->tgl_lahir }}</td>
        <td style="text-align: center">{{ $item->jenkel }}</td>
        <td style="text-align: center">{{ $item->agama }}</td>
        <td style="text-align: center">{{ $item->alamat }}</td>
        <td>
          <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#detailpenduduk-{{ $item->nik }}">Detail</button>
          <a href="/datapenduduk/delete/{{ $item->nik }}" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin ingin mengahpus data {{ $item->nama }}')">Hapus</a>
        </td>
      </tr>
      @endforeach   
    </tbody>
  </table>  


<!-- Modal Detail Penduduk -->

@foreach ($data as $row)

<div class="modal fade " id="detailpenduduk-{{ $row->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Data {{ $row->nama }}</h5>
            <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <table>
                        <tr>
                            <td >Nama  </td>
                            <td>: {{ $row->nama }}</td>
                        </tr><tr>
                            <td >Nik  </td>
                            <td>: {{ $row->nik }}</td>
                        </tr><tr> 
                            <td >KK  </td>
                            <td>: {{ $row->kk }}</td>
                        </tr><tr>
                            <td >Tempat Lahir  </td>
                            <td>: {{ $row->tmp_lahir }}</td>
                        </tr><tr>
                            <td >Tanggal Lahir  </td>
                            <td>: {{ $row->tgl_lahir }}</td>
                        </tr><tr>
                            <td >Jenis Kelamin  </td>
                            <td>: {{ $row->jenkel }}</td>
                        </tr><tr>
                            <td >Golongan darah  </td>
                            <td>: {{ $row->goldar }}</td>
                        </tr><tr>
                            <td >Agama  </td>
                            <td>: {{ $row->agama }}</td>
                        </tr><tr>
                            <td >Status dalam keluarga  </td>
                            <td>: {{ $row->stat_hbkel }}</td>
                        </tr><tr>
                            <td >Status Kawin </td>
                            <td>: {{ $row->status_kawin }}</td>
                        </tr><tr>
                            <td >Pendidikan</td>
                            <td>: {{ $row->pendidikan }}</td>
                        </tr><tr>
                            <td >Pekerjaan</td>
                            <td>: {{ $row->pekerjaan }}</td>
                        </tr><tr>
                            <td >Nama Ibu</td>
                            <td>: {{ $row->nama_ibu }}</td>
                        </tr><tr>
                            <td >Nama Ayah</td>
                            <td>: {{ $row->nama_ayah }}</td>
                        </tr><tr>
                            <td>Alamat </td>
                            <td>: {{ $row->alamat}}, RT.{{ $row->rt}}/RW.{{ $row->rw}}<br>
                                 kelurahan : {{ $row->kelurahan}}, <br>
                                 kecamatan : {{ $row->kecamatan}}, <br> 
                                 kab/kota  : {{ $row->kotakab}}, <br>
                                 Provinsi  : {{ $row->propinsi}}</td>
                        </tr><tr>
                            <td >Status Pendidikan</td>
                            <td>: {{ $row->status_pend }}</td>
                        </tr>  
                </table>
            </div>
            <div class="modal-footer bg-primary">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#Editpenduduk-{{ $row->nik }}">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- End Detail Penduduk -->

<!-- Edit Data Penduduk -->
  <div class="modal fade " id="Editpenduduk-{{ $row->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data {{ $row->nama }}</h5>
            <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('datapenduduk.update', [$row->nik]) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Nama</label>
                        <input type="text"  class="form-control" name="nama" id="nama"  value="{{ $row->nama }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">NIK</label>
                        <input type="text" readonly="true" class="form-control" name="nik" id="nik"  value="{{ $row->nik }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">KK</label>
                        <input type="text" readonly="true" class="form-control" name="kk" id="kk"  value="{{ $row->kk }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Tempat lahir</label>
                        <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir"  value="{{ $row->tmp_lahir }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"  value="{{ $row->tgl_lahir }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Jenis kelamin</label>
                        <select name="jenkel" id="jenkel" required>
                            <option value="{{ $row->jenkel }}">=={{ $row->jenkel }}==</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki">Laki</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Golongan Darah</label>
                        <select name="goldar" id="goldar" value="{{ $row->goldar }}" required>
                            <option value="{{ $row->goldar }}">{{ $row->goldar }}</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Agama</label>
                        <select name="agama" id="agama" value="{{ $row->agama }}" required>
                            <option value="{{ $row->agama }}">{{ $row->agama }}</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Tionghua">Tionghua</option>
                        </select>
                       
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Status hubungan Keluarga</label>
                        <select name="stat_hbkel" id="stat_hbkel" value="{{ $row->stat_hbkel }}" required>
                            <option value="{{ $row->stat_hbkel }}">{{ $row->stat_hbkel }}</option>
                            <option value="Orang tua laki-laki">Orang tua laki-laki</option>
                            <option value="Orang tua Perempuan">Orang tua Perempuan</option>
                            <option value="Anak kandung Laki-laki">Anak kandung Laki-laki</option>
                            <option value="Anak kandung Perempuan">Anak kandung Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">status kawin</label>
                        <select name="status_kawin" id="status_kawin" value="{{ $row->status_kawin }}" required>
                            <option value="{{ $row->status_kawin }}">{{ $row->status_kawin }}</option>
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" value="{{ $row->pendidikan }}"required>
                            <option value='{{ $row->pendidikan }}'>{{ $row->pendidikan }}</option>
                            <option value='SD'>SD</option>
                            <option value='SMP/Sederajat'>SMP/Sederajat</option>
                            <option value='SMA/Sederajat'>SMA/Sederajat</option>
                            <option value='D3'>D3</option>
                            <option value='S1/D4'>S1/D4</option>
                            <option value='S2'>S2</option>
                            <option value='S3'>S3</option>
                        </select>
                        
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"  value="{{ $row->pekerjaan }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Nama Ibu</label>
                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu"  value="{{ $row->nama_ibu }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Nama Ayah</label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah"  value="{{ $row->nama_ayah }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Alamat</label><br>
                        <input type="text" class="form-control" name="alamat" id="alamat"  value="{{ $row->alamat }}" required>
                        RT :<input type="text" class="form-control" name="rt" id="rt"  value="{{ $row->rt }}" required>
                        RW :<input type="text" class="form-control" name="rw" id="rw"  value="{{ $row->rw }}" required>
                        Kelurahan :<input type="text" class="form-control" name="kelurahan" id="kelurahan"  value="{{ $row->kelurahan }}" required>
                        Kecamatan :<input type="text" class="form-control" name="kecamatan" id="kecamatan"  value="{{ $row->kecamatan }}" required>
                        Kota/kab  :<input type="text" class="form-control" name="kotakab" id="kotakab"  value="{{ $row->kotakab }}" required>
                        Provinsi  :<input type="text" class="form-control" name="propinsi" id="propinsi"  value="{{ $row->propinsi }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="nama">Status Pendidikan</label>
                        <select name="status_pend" id="status_pend" value="{{ $row->status_pend }}" required>
                            <option value="{{ $row->status_pend }}">{{ $row->status_pend }}</option>
                            <option value="Belum Lulus">Belum Lulus</option>
                        </select>
                    </div>

                  
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>

          </form>
        </div>
    </div>
</div>
@endforeach
<!-- End Detail Penduduk -->


<!-- Import Data Penduduk -->

  <div class="modal fade" id="ModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Input File Excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="pendudukImport" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="importFile" required>
                </div>
            </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<!-- End Tambah Data Penduduk -->


@endsection

@push('js')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready( function () {
    $('#pendudukTable').DataTable();
} );
</script>
@endpush