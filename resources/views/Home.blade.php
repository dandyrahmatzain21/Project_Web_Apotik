@extends('part/template')
@section('judul_halaman','DASHBOARD')
@section('title','APOTEK ABC')

@section('konten')
    @if (auth()->user()->level==5)
        <p style="text-align: center">Hallo <strong>{{ Auth::user()->name }}</strong> , Selamat Datang Di Aplikasi Apotek ABC,Anda Login Sebagai Guest</p>
        @else
        <!-- Card stats -->
        <div class="row">
            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Obat</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlObat}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-pills"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body" style="border-radius:10%">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Penjualan</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$JmlPenjualan}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                </div>
                            </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body" style="border-radius:10%">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Penjualan Online</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlPenjualanOnline}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card stats -->
        <div class="row">
            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pembelian</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlPembelian}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fas fa-shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pemasok</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlPemasok}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                    <i class="fas fa-people-carry"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body" style="border-radius:10%">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kategori</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlKategori}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Unit</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlUnit}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-stats">
                <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Penyimpanan</h5>
                                <span class="h2 font-weight-bold mb-0">{{$JmlPenyimpanan}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                <i class="fas fa-layer-group"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
