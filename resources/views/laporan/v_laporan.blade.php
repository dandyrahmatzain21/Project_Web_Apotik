@extends('part/template')
@section('judul_halaman','LAPORAN')
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

    @if (auth()->user()->level==1)
        <div class="row">
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/danger.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Obat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_obat">
                                    <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                    <span class="btn-inner--text">Print Laporan</span>
                                </button>

                                <!-- Modal -->
                                    <div class="modal fade" id="laporan_obat" tabindex="-1" role="dialog" aria-labelledby="laporan_obatLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_obatLabel">Laporan Obat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_obat">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_obat" class="form-control @error('tgl_awal_obat') is-invalid @enderror" id="tgl_awal_obat" placeholder="Tanggal Awal" value="{{old('tgl_awal_obat')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_obat">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_obat" class="form-control @error('tgl_akhir_obat') is-invalid @enderror" id="tgl_akhir_obat" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_obat')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="/obat/print/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                <a href="" onclick="this.href='/laporan/print_obat/'+ document.getElementById('tgl_awal_obat').value + '/' + document.getElementById('tgl_akhir_obat').value " target="_blank" class="btn btn-danger">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/info.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Penjualan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_penjualan">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_penjualan" tabindex="-1" role="dialog" aria-labelledby="laporan_penjualanLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_penjualanLabel">Laporan Penjualan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_penjualan">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_penjualan" class="form-control @error('tgl_awal_penjualan') is-invalid @enderror" id="tgl_awal_penjualan" placeholder="Tanggal Awal" value="{{old('tgl_awal_penjualan')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_penjualan">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_penjualan" class="form-control @error('tgl_akhir_penjualan') is-invalid @enderror" id="tgl_akhir_penjualan" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_penjualan')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/penjualan/print/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/laporan/print_penjualan/'+ document.getElementById('tgl_awal_penjualan').value + '/' + document.getElementById('tgl_akhir_penjualan').value " target="_blank" class="btn btn-info">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/info.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Penjualan Online</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_penjualan_online">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_penjualan_online" tabindex="-1" role="dialog" aria-labelledby="laporan_penjualan_onlineLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_penjualan_onlineLabel">Laporan Penjualan Online</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_penjualan_online">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_penjualan_online" class="form-control @error('tgl_awal_penjualan_online') is-invalid @enderror" id="tgl_awal_penjualan_online" placeholder="Tanggal Awal" value="{{old('tgl_awal_penjualan_online')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_penjualan_online">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_penjualan_online" class="form-control @error('tgl_akhir_penjualan_online') is-invalid @enderror" id="tgl_akhir_penjualan_online" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_penjualan_online')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/penjualan/print_online/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/laporan/print_penjualan_online/'+ document.getElementById('tgl_awal_penjualan_online').value + '/' + document.getElementById('tgl_akhir_penjualan_online').value " target="_blank" class="btn btn-info">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/success.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Pembelian</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_pembelian">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_pembelian" tabindex="-1" role="dialog" aria-labelledby="laporan_pembelianLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_pembelianLabel">Laporan Pembelian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_pembelian">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_pembelian" class="form-control @error('tgl_awal_pembelian') is-invalid @enderror" id="tgl_awal_pembelian" placeholder="Tanggal Awal" value="{{old('tgl_awal_pembelian')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_pembelian">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_pembelian" class="form-control @error('tgl_akhir_pembelian') is-invalid @enderror" id="tgl_akhir_pembelian" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_pembelian')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/pembelian/print/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/laporan/print_pembelian/'+ document.getElementById('tgl_awal_pembelian').value + '/' + document.getElementById('tgl_akhir_pembelian').value " target="_blank" class="btn btn-success">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/warning.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Pemasok</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                    <a href="/pemasok/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/purple.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Kategori</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <a href="kategori/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/purple.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Unit</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <a href="/unit/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/purple.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Penyimpanan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                    <a href="/penyimpanan/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif (auth()->user()->level==2)
        <div class="row">
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/info.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Penjualan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_penjualan">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_penjualan" tabindex="-1" role="dialog" aria-labelledby="laporan_penjualanLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="laporan_penjualanLabel">Laporan Penjualan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_penjualan">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_penjualan" class="form-control @error('tgl_awal_penjualan') is-invalid @enderror" id="tgl_awal_penjualan" placeholder="Tanggal Awal" value="{{old('tgl_awal_penjualan')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_penjualan">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_penjualan" class="form-control @error('tgl_akhir_penjualan') is-invalid @enderror" id="tgl_akhir_penjualan" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_penjualan')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/penjualan/print/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/laporan/print_penjualan/'+ document.getElementById('tgl_awal_penjualan').value + '/' + document.getElementById('tgl_akhir_penjualan').value " target="_blank" class="btn btn-info">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/info.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Penjualan Online</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_penjualan_online">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_penjualan_online" tabindex="-1" role="dialog" aria-labelledby="laporan_penjualan_onlineLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_penjualan_onlineLabel">Laporan Penjualan Online</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_penjualan_online">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_penjualan_online" class="form-control @error('tgl_awal_penjualan_online') is-invalid @enderror" id="tgl_awal_penjualan_online" placeholder="Tanggal Awal" value="{{old('tgl_awal_penjualan_online')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_penjualan_online">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_penjualan_online" class="form-control @error('tgl_akhir_penjualan_online') is-invalid @enderror" id="tgl_akhir_penjualan_online" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_penjualan_online')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/penjualan/print_online/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/laporan/print_penjualan_online/'+ document.getElementById('tgl_awal_penjualan_online').value + '/' + document.getElementById('tgl_akhir_penjualan_online').value " target="_blank" class="btn btn-info">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif (auth()->user()->level==3)
    <div class="row">
        <div class="col-4">
            <div class="card card-profile">
                <img src="{{asset('argon-template')}}/assets/img/theme/success.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div style="margin-top:-30%;">
                        <div class="card-profile-image">
                            <h1 style="color: white">Laporan Pembelian</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_pembelian">
                                    <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                    <span class="btn-inner--text">Print Laporan</span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="laporan_pembelian" tabindex="-1" role="dialog" aria-labelledby="laporan_pembelianLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="laporan_pembelianLabel">Laporan Pembelian</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Laporan Berdasarkan Tanggal</h3>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="tgl_awal_pembelian">Tanggal Awal</label>
                                                            <input type="date" name="tgl_awal_pembelian" class="form-control @error('tgl_awal_pembelian') is-invalid @enderror" id="tgl_awal_pembelian" placeholder="Tanggal Awal" value="{{old('tgl_awal_pembelian')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="tgl_akhir_pembelian">Tanggal Akhir</label>
                                                            <input type="date" name="tgl_akhir_pembelian" class="form-control @error('tgl_akhir_pembelian') is-invalid @enderror" id="tgl_akhir_pembelian" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_pembelian')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="/pembelian/print/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                <a href="" onclick="this.href='/laporan/print_pembelian/'+ document.getElementById('tgl_awal_pembelian').value + '/' + document.getElementById('tgl_akhir_pembelian').value " target="_blank" class="btn btn-success">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif (auth()->user()->level==4)
        <div class="row">
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/danger.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                            <div style="margin-top:-30%;">
                                <div class="card-profile-image">
                                    <h1 style="color: white">Laporan Obat</h1>
                                </div>
                            </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_obat">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_obat" tabindex="-1" role="dialog" aria-labelledby="laporan_obatLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_obatLabel">Laporan Obat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_obat">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_obat" class="form-control @error('tgl_awal_obat') is-invalid @enderror" id="tgl_awal_obat" placeholder="Tanggal Awal" value="{{old('tgl_awal_obat')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_obat">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_obat" class="form-control @error('tgl_akhir_obat') is-invalid @enderror" id="tgl_akhir_obat" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_obat')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/obat/print/" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/laporan/print_obat/'+ document.getElementById('tgl_awal_obat').value + '/' + document.getElementById('tgl_akhir_obat').value " target="_blank" class="btn btn-danger">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/purple.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Kategori</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <a href="kategori/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/purple.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Unit</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <a href="/unit/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
