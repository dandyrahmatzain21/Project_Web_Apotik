@extends('part.template')
@section('judul_halaman','DATA PENJUALAN')
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
    <a href="/penjualan/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="/penjualan/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
    <p></p>
    <div class="table-responsive">
        <table id="tbl_penjualan" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Ref</th>
                <th>Nama Obat</th>
                <th>Harga Jual</th>
                <th>Banyak</th>
                <th>Subtotal</th>
                <th>Nama Pembeli</th>
                <th>Tgl Beli</th>
                <th>Grandtotal</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @if (auth()->user()->level==5)
                    <?php $no=1;?>
                    @foreach ($guest as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->ref}}</td>
                            <td>{{$data->nama_obat}}</td>
                            <td>{{$data->harga_jual}}</td>
                            <td>{{$data->banyak}}</td>
                            <td>{{$data->subtotal}}</td>
                            <td>{{$data->nama_pembeli}}</td>
                            <td>{{$data->tgl_beli}}</td>
                            <td>{{$data->grandtotal}}</td>
                            <td>
                                <a href="/penjualan/invoice/{{$data->id_penjualan}}" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <?php $no=1;?>
                    @foreach ($penjualan as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->ref}}</td>
                            <td>{{$data->nama_obat}}</td>
                            <td>{{$data->harga_jual}}</td>
                            <td>{{$data->banyak}}</td>
                            <td>{{$data->subtotal}}</td>
                            <td>{{$data->nama_pembeli}}</td>
                            <td>{{$data->tgl_beli}}</td>
                            <td>{{$data->grandtotal}}</td>
                            <td>
                                <a href="/penjualan/invoice/{{$data->id_penjualan}}" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_penjualan}}">
                                <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table><br/>
    </div>

    @foreach ($penjualan as $data)
    <!-- Modal -->
    <div class="modal fade" id="delete{{$data->id_penjualan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Data Penjualan {{$data->nama_pembeli}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                    <a href="/penjualan/delete/{{$data->id_penjualan}}" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
