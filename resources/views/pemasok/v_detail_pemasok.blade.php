@extends('part/template')
@section('judul_halaman','DETAIL PEMASOK')
@section('title','APOTIK ABC')

@section('konten')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Kode Pemasok</th>
                <th style="width: 30px">:</th>
                <th>{{$pemasok->kode_pemasok}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama pemasok</th>
                <th style="width: 30px">:</th>
                <th>{{$pemasok->nama_pemasok}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Alamat</th>
                <th style="width: 30px">:</th>
                <th>{{$pemasok->alamat}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Telepon</th>
                <th style="width: 30px">:</th>
                <th>{{$pemasok->telepon}}</th>
            </tr>
            <tr>
                <th>
                    <a href="/pemasok" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                     </a>
                </th>
            </tr>
        </table>
    </div>
@endsection
