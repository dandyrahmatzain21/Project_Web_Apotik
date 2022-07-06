@extends('part/template')
@if (auth()->user()->level==5)
<?php $judul_halaman = 'FORM PEMBELIAN' ?>
@else
<?php $judul_halaman = 'TAMBAH DATA PENJUALAN' ?>
@endif
@section('judul_halaman',$judul_halaman)
@section('title','APOTIK ABC')

@section('konten')
    <?php
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWQYZ';
    ?>
    <form method="POST" action="/penjualan/insert_online/" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" name="id_guest" class="form-control @error('id_guest') is-invalid @enderror" id="id_guest" placeholder="Id Guest" value="{{ Auth::user()->id }}" readonly>
            <div class="invalid-feedback">
                @error('id_guest')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" name="id_obat" class="form-control @error('id_obat') is-invalid @enderror" id="id_obat" placeholder="Id Obat" value="{{$obat->id_obat}}" readonly>
            <div class="invalid-feedback">
                @error('id_obat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" name="kode_obat" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" placeholder="Kode Obat" value="{{$obat->kode_obat}}" readonly>
            <div class="invalid-feedback">
                @error('kode_obat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="ref">Ref</label>
            <input type="text" name="ref" class="form-control @error('ref') is-invalid @enderror" id="ref" placeholder="Ref" value="<?php echo substr(str_shuffle($permitted_chars), 0, 10);?>" readonly>
            <div class="invalid-feedback">
                @error('ref')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" placeholder="Nama Obat" value="{{$obat->nama_obat}}" readonly>
            <div class="invalid-feedback">
                @error('nama_obat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="harga_jual">Harga Satuan</label>
            <input type="number" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Harga Jual" value="{{$obat->harga_jual}}" readonly>
            <div class="invalid-feedback">
                @error('harga_jual')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="stok">Stok Obat</label>
            <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok" value="{{$obat->stok}}" readonly>
            <div class="invalid-feedback">
                @error('stok')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nama_pembeli">Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror" id="nama_pembeli" placeholder="Nama Pembeli" value="{{old('nama_pembeli')}}">
            <div class="invalid-feedback">
                @error('nama_pembeli')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="banyak">Banyak</label>
            <input type="number" name="banyak" class="form-control @error('banyak') is-invalid @enderror" id="banyak" placeholder="Banyak" value="{{old('banyak')}}">
            <div class="invalid-feedback">
                @error('banyak')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="subtotal">Subtotal</label>
            <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Banyak" value="{{old('subtotal')}}" readonly>
            <div class="invalid-feedback">
                @error('subtotal')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="grandtotal">Grand Total</label>
            <input type="number" name="grandtotal" class="form-control @error('grandtotal') is-invalid @enderror" id="grandtotal" placeholder="Grand Total" value="{{old('grandtotal')}}" readonly>
            <div class="invalid-feedback">
                @error('grandtotal')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" name="status_bayar" class="form-control @error('status_bayar') is-invalid @enderror" id="status_bayar" placeholder="Status Bayar" value="Belum" readonly>
            <div class="invalid-feedback">
                @error('status_bayar')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembelian Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Masukan Sudah Benar, Yakin Untuk Membeli ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer">
        <a href="/penjualan/add" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Beli</span>
        </button>
    </div>
@endsection
