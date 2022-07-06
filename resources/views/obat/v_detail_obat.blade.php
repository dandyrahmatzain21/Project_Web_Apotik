@extends('part/template')
@section('judul_halaman','DETAIL OBAT')
@section('title','APOTIK ABC')

@section('konten')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Kode Obat</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->kode_obat}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama Obat</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->nama_obat}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Penyimpanan</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->penyimpanan}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Stok</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->stok}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Unit</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->unit}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama Kategori</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->nama_kategori}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Tanggal Masuk</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->tgl_masuk}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Kedaluwarsa</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->kedaluwarsa}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Deskripsi Obat</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->deskripsi_obat}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Harga Beli</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->harga_beli}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Harga Jual</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->harga_jual}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama Pemasok</th>
                <th style="width: 30px">:</th>
                <th>{{$obat->nama_pemasok}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Gambar</th>
                <th style="width: 30px">:</th>
                <th><img src="{{url('gambar/'.$obat->gambar)}}" width="200px"></th>
            </tr>
            <tr>
                <th>
                    <a href="/obat" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                </th>
            </tr>
        </table>
    </div>
@endsection
