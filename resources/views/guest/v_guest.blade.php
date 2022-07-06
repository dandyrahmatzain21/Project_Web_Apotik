@extends('part.template')
@section('judul_halaman','LIST PEMBELIAN OBAT')
@section('title','APOTIK ABC')

@section('konten')
    <div class="row">
        <!-- Pesan Setelah Redirect -->
        <div class="col-12">
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
        <!-- END Pesan Setelah Redirect -->
    </div>

    <!-- Tabel -->
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
                <th>Tgl Beli / Tgl Verifikasi</th>
                <th>Grandtotal</th>
                <th>Status Bayar</th>
                <th>Aksi</th>
            </thead>
            <tbody>
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
                        <td>{{$data->status_bayar}}</td>
                        <td>
                            <?php $status_bayar = $data->status_bayar; ?>
                            @if ($status_bayar == "Belum")
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#delete{{$data->id_obat}}">
                                    <i class="fas fa-dollar-sign"></i> Verifikasi Pembayaran
                                </button>
                            @else
                                <a href="/guest/invoice/{{$data->id_penjualan}}" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
        <!-- END Tabel -->
    </div>

    @foreach ($guest as $data)
    <!-- Modal -->
    <div class="modal fade" id="delete{{$data->id_obat}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Verifikasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Lakukan Verifikasi Pembayaran Di Apotek ABC Terdekat Dengan Menunjukan No.REF <span style="font-weight: bold">{{$data->ref}} </span>Kepada <span style="font-weight: bold">Admin</span> Atau <span style="font-weight: bold">Petugas Penjualan Obat</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
