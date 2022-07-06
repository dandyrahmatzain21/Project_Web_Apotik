@extends('part.template')
@section('judul_halaman','DATA PENYIMPANAN')
@section('title','APOTIK ABC')

@section('konten')
    <div class="row">
        <!-- Pesan Setelah Redirect -->
        <div class="col-sm-5">
            @if(session('Pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{session('Pesan')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Pesan Setelah Redirect -->
    </div>

    <a href="/penyimpanan/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="/penyimpanan/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
    <p></p>
    <div class="table-responsive">
        <table id="tbl_penyimpanan" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Nama Penyimpanan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($penyimpanan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_penyimpanan}}</td>
                        <td>
                            <a href="/penyimpanan/detail/{{$data->id_penyimpanan}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> Detail</a>
                            <a href="/penyimpanan/edit/{{$data->id_penyimpanan}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_penyimpanan}}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>

    @foreach ($penyimpanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="delete{{$data->id_penyimpanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Penyimpanan Dengan Nama {{$data->nama_penyimpanan}} </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                        <a href="/penyimpanan/delete/{{$data->id_penyimpanan}}" class="btn btn-danger">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
