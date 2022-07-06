@extends('part/template')
@section('judul_halaman','KELOMPOK')
@section('title','APOTEK ABC')

@section('konten')
    <div class="row">
        <div class="col-6">
            <div class="card card-profile">
                <img src="{{asset('argon-template')}}/assets/img/theme/primary.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="card-profile-image">
                        <div style="margin-top: -70%"><h1 style="color: white">INFO ANGGOTA</h1></div>
                        <div style="margin-top: 50%">
                            <a href="#">
                                <img src="{{asset('argon-template')}}/assets/img/theme/dandy.jpg" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-primary  mr-4 "></a>
                        <a href="#" class="btn btn-sm btn-primary float-right"></a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">Programming</span>
                                    <span class="description">Berkontribusi Membuat System Back-End</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">
                            Dandy Rahmat Zain<span class="font-weight-light">(Zend)</span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Kadugede, Kuningan
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Teknik Informatika - Software Engineering
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>Universitas Catur Insan Cendikia
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card card-profile">
                <img src="{{asset('argon-template')}}/assets/img/theme/danger.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="card-profile-image">
                        <div style="margin-top: -70%"><h1 style="color: white">INFO ANGGOTA</h1></div>
                        <div style="margin-top: 50%">
                            <a href="#">
                                <img src="{{asset('argon-template')}}/assets/img/theme/bootstrap.jpg" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-danger  mr-4 "></a>
                        <a href="#" class="btn btn-sm btn-danger float-right"></a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">Main Idea</span>
                                    <span class="description">Berkontribusi Memberikan Ide Utama Dan Operasi Database</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">
                            Moch.Bagus Rafli<span class="font-weight-light"></span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Cilimus, Kuningan
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Teknik Informatika - Software Engineering
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>Universitas Catur Insan Cendikia
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
