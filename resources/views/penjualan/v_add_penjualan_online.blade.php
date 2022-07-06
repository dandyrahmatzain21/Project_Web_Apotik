@extends('part/template')
@if (auth()->user()->level==5)
<?php $judul_halaman = 'LIST OBAT' ?>
@else
<?php $judul_halaman = 'PENJUALAN' ?>
@endif
@section('judul_halaman',$judul_halaman)
@section('title','APOTIK ABC')

@section('konten')
    <div class="table-responsive">
        <table id="tbl_obat" class="table table-bordered table table-striped">
            <thead>
                <th style="text-align: center">Obat</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($obat as $data)
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <div style="height: 200px;overflow: hidden;" class="row"><img src="{{url('gambar/'.$data->gambar)}}" width="100%"></div>
                                </div>
                                <div class="col-2">
                                    <div style="padding-left: 5%" class="row"><div><h3>Kode Obat</h3></div></div>
                                    <div style="padding-left: 5%" class="row"><div><h3>Nama Obat</h3></div></div>
                                    <div style="padding-left: 5%" class="row"><div><h3>Penyimpanan</h3></div></div>
                                    <div style="padding-left: 5%" class="row"><div><h3>Stok</h3></div></div>
                                    <div style="padding-left: 5%" class="row"><div><h3>Unit</h3></div></div>
                                    <div style="padding-left: 5%" class="row"><div><h3>Kategori</h3></div></div>
                                </div>
                                <div class="col-2">
                                    <div class="row"><h3>: {{$data->kode_obat}}</h3></div>
                                    <div class="row"><h3>: {{$data->nama_obat}}</h3></div>
                                    <div class="row"><h3>: {{$data->penyimpanan}}</h3></div>
                                    <div class="row"><h3>: {{$data->stok}}</h3></div>
                                    <div class="row"><h3>: {{$data->unit}}</h3></div>
                                    <div class="row"><h3>: {{$data->nama_kategori}}</h3></div>
                                </div>
                                <div class="col-2">
                                    <div class="row"><div><h3>Kedaluwarsa</h3></div></div>
                                    <div class="row"><div><h3>Deskripsi Obat</h3></div></div>
                                    <div class="row"><div><h3>Harga</h3></div></div>
                                    <div class="row"><div><h3>Nama Pemasok</h3></div></div>
                                </div>
                                <div class="col-2">
                                    <div class="row"><h3>: {{$data->kedaluwarsa}}</h3></div>
                                    <div class="row"><h3>: {{$data->deskripsi_obat}}</h3></div>
                                    <div class="row"><h3>: {{$data->harga_jual}}</h3></div>
                                    <div class="row"><h3>: {{$data->nama_pemasok}}</h3></div>
                                    <a href="/obat/jual_online/{{$data->id_obat}}" class="btn btn-primary btn-block" class="btn btn-icon btn-primary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-shipping-fast"></i></span>
                                        <span class="btn-inner--text">Beli</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
