@extends('part/template')
@section('judul_halaman','DETAIL KATEGORI')
@section('title','APOTIK ABC')

@section('konten')
    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Nama Kategori</th>
                <th style="width: 30px">:</th>
                <th>{{$kategori->nama_kategori}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Deskripsi Kategori</th>
                <th style="width: 30px">:</th>
                <th>{{$kategori->deskripsi_kategori}}</th>
            </tr>
            <tr>
                <th>
                    <a href="/kategori" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                </th>
            </tr>
        </table>
    </div>
    <!-- END -->
@endsection
