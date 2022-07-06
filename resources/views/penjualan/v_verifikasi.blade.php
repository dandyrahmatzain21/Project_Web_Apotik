@extends('part.template')
@section('judul_halaman','DATA VERIFIKASI PENJUALAN ONLINE')
@section('title','APOTIK ABC')

@section('konten')
    <div class="row">
        <!-- Pesan Setelah Redirect -->
        <div class="col-9">
            @if(session('Pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{session('Pesan')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('Pesan Gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                    <span class="alert-text"><strong>Gagal!</strong> {{session('Pesan Gagal')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Pesan Setelah Redirect -->
    </div>
    <a href="/penjualan/print_online" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
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
                <th>Status Bayar</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($penjualan_online as $data)
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
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#verifikasi{{$data->id_penjualan}}">
                                    <i class="fas fa-dollar-sign"></i> Verifikasi
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_penjualan}}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            @else
                                <a href="/guest/invoice/{{$data->id_penjualan}}" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-invoice-dollar"></i> Invoice</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>

    @foreach ($penjualan_online as $data)
    <!-- Modal -->
        <div class="modal fade" id="verifikasi{{$data->id_penjualan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Pembeli Dengan REF <span style="font-weight: bold">{{$data->ref}}</span> Sudah Melakukan Pembayaran Sebesar <span style="font-weight: bold">Rp.{{$data->grandtotal}}</span> , <br>
                        Apakah Anda Sudah Yakin Untuk Melakukan Verifikasi Pembayaran ?</p>
                        <form method="POST" action="/penjualan/verifikasi_pembayaran/{{$data->id_penjualan}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Id Penjualan" value="{{$data->stok}}" readonly>
                                <div class="invalid-feedback">
                                    @error('stok')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id_penjualan" class="form-control @error('id_penjualan') is-invalid @enderror" id="id_penjualan" placeholder="Id Penjualan" value="{{$data->id_penjualan}}" readonly>
                                <div class="invalid-feedback">
                                    @error('id_penjualan')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id_guest" class="form-control @error('id_guest') is-invalid @enderror" id="id_guest" placeholder="Id Guest" value="{{$data->id_guest}}" readonly>
                                <div class="invalid-feedback">
                                    @error('id_guest')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id_obat" class="form-control @error('id_obat') is-invalid @enderror" id="id_obat" placeholder="Id Obat" value="{{$data->id_obat}}" readonly>
                                <div class="invalid-feedback">
                                    @error('id_obat')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="kode_obat" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" placeholder="Kode Obat" value="{{$data->kode_obat}}" readonly>
                                <div class="invalid-feedback">
                                    @error('kode_obat')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="ref" class="form-control @error('ref') is-invalid @enderror" id="ref" placeholder="Ref" value="{{$data->ref}}" readonly>
                                <div class="invalid-feedback">
                                    @error('ref')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" placeholder="Nama Obat" value="{{$data->nama_obat}}" readonly>
                                <div class="invalid-feedback">
                                    @error('nama_obat')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Harga Jual" value="{{$data->harga_jual}}" readonly>
                                <div class="invalid-feedback">
                                    @error('harga_jual')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="banyak" class="form-control @error('banyak') is-invalid @enderror" id="banyak" placeholder="Banyak" value="{{$data->banyak}}" readonly>
                                <div class="invalid-feedback">
                                    @error('banyak')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Banyak" value="{{$data->subtotal}}" readonly>
                                <div class="invalid-feedback">
                                    @error('subtotal')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror" id="nama_pembeli" placeholder="Nama Pembeli" value="{{$data->nama_pembeli}}" readonly>
                                <div class="invalid-feedback">
                                    @error('nama_pembeli')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <?php $datenow = date('Y-m-d'); ?>
                            <div class="form-group">
                                <input type="hidden" name="tgl_beli" class="form-control @error('tgl_beli') is-invalid @enderror" id="tgl_beli" placeholder="Tanggal Beli" value="{{$datenow}}" readonly>
                                <div class="invalid-feedback">
                                    @error('tgl_beli')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="grandtotal" class="form-control @error('grandtotal') is-invalid @enderror" id="grandtotal" placeholder="Grand Total" value="{{$data->grandtotal}}" readonly>
                                <div class="invalid-feedback">
                                    @error('grandtotal')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="status_bayar" class="form-control @error('status_bayar') is-invalid @enderror" id="status_bayar" placeholder="Status Bayar" value="Sudah" readonly>
                                <div class="invalid-feedback">
                                    @error('status_bayar')
                                        {{ $message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                <button class="btn btn-primary">Ya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($penjualan_online as $data)
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
                    <a href="/penjualan/delete_online/{{$data->id_penjualan}}" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
