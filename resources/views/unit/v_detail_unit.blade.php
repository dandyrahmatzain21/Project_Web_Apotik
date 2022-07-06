@extends('part/template')
@section('judul_halaman','DETAIL UNIT')
@section('title','APOTIK ABC')

@section('konten')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Nama Unit</th>
                <th style="width: 30px">:</th>
                <th>{{$unit->nama_unit}}</th>
                </tr>
                <tr>
                <th>
                    <a href="/unit" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                </th>
            </tr>
        </table>
    </div>
@endsection
