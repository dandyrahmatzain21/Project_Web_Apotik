@extends('part.template')
@section('judul_halaman','DATA PEMBELIAN')
@section('title','APOTIK ABC')

@section('konten')
    <div class="row">
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
    </div>

    <a href="/pembelian/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="/pembelian/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
    <p></p>
    <div class="table-responsive">
        <table id="tbl_pembelian" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Ref</th>
                <th>Nama Obat</th>
                <th>Harga Beli</th>
                <th>Banyak</th>
                <th>Subtotal</th>
                <th>Nama Pemasok</th>
                <th>Tgl Beli</th>
                <th>Grandtotal</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($pembelian as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->ref}}</td>
                        <td>{{$data->nama_obat}}</td>
                        <td>{{$data->harga_beli}}</td>
                        <td>{{$data->banyak}}</td>
                        <td>{{$data->subtotal}}</td>
                        <td>{{$data->nama_pemasok}}</td>
                        <td>{{$data->tgl_beli}}</td>
                        <td>{{$data->grandtotal}}</td>
                        <td>
                            <a href="/pembelian/invoice/{{$data->id_pembelian}}" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_pembelian}}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>

    @foreach ($pembelian as $data)
    <!-- Modal -->
    <div class="modal fade" id="delete{{$data->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Data Pembelian {{$data->nama_pemasok}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                    <a href="/pembelian/delete/{{$data->id_pembelian}}" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
