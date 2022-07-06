@extends('part/template')
@section('judul_halaman','TAMBAH DATA PEMBELIAN')
@section('title','APOTIK ABC')

@section('konten')
    <?php
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWQYZ';
    ?>
    <form method="POST" action="/pembelian/insert" enctype="multipart/form-data">
        @csrf
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
            <label for="nama_pemasok">Nama Pemasok</label>
            <input type="text" name="nama_pemasok" class="form-control @error('nama_pemasok') is-invalid @enderror" id="nama_pemasok" placeholder="Nama Pemasok" value="{{$obat->nama_pemasok}}" readonly>
            <div class="invalid-feedback">
                @error('nama_pemasok')
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
            <label for="unit">Unit</label>
            <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" id="unit" placeholder="Unit" value="{{$obat->unit}}" readonly>
            <div class="invalid-feedback">
                @error('unit')
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
            <label for="harga_beli">Harga</label>
            <input type="number" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Harga" value="{{$obat->harga_beli}}" readonly>
            <div class="invalid-feedback">
                @error('harga_beli')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="tgl_beli">Tanggal Beli</label>
            <input type="date" name="tgl_beli" class="form-control @error('tgl_beli') is-invalid @enderror" id="tgl_beli" placeholder="Tanggal Beli" value="{{old('tgl_beli')}}">
            <div class="invalid-feedback">
                @error('tgl_beli')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="banyak_pembelian">Banyak</label>
            <input type="number" name="banyak_pembelian" class="form-control @error('banyak_pembelian') is-invalid @enderror" id="banyak_pembelian" placeholder="Banyak" value="{{old('banyak_pembelian')}}">
            <div class="invalid-feedback">
                @error('banyak_pembelian')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="subtotal_pembelian">Subtotal</label>
            <input type="number" name="subtotal_pembelian" class="form-control @error('subtotal_pembelian') is-invalid @enderror" id="subtotal_pembelian" placeholder="Subtotal" value="{{old('subtotal_pembelian')}}" readonly>
            <div class="invalid-feedback">
                @error('subtotal_pembelian')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="grandtotal_pembelian">Grandtotal</label>
            <input type="number" name="grandtotal_pembelian" class="form-control @error('grandtotal_pembelian') is-invalid @enderror" id="grandtotal_pembelian" placeholder="Grand Total" value="{{old('grandtotal_pembelian')}}" readonly>
            <div class="invalid-feedback">
                @error('grandtotal_pembelian')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Masukan Sudah Benar, Yakin Untuk Menambah Data ?</p>
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
        <a href="/pemasok" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
    </div>
@endsection
