<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('argon-template')}}/assets/img/brand/hospital.png" class="navbar-brand-img" alt="..."><br>
                <h1>APOTEK<strong class="text-primary"> ABC</strong></h1>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <i class="ni ni-tv-2 text-blue"></i>
                            <span class="nav-link-text text-darker">Dashboard</span>
                        </a>
                    </li>

                    @if (auth()->user()->level==1)
                        <!--Obat-->
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-pills text-danger"></i>
                            <span class="mb-0 text-default">Obat</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/obat/add" class="dropdown-item">
                                    <i class="fas fa-plus text-danger"></i>
                                    <span>Tambah Obat</span>
                                </a>
                                <a href="/obat" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-danger"></i>
                                    <span>List Obat</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-layer-group text-purple"></i>
                                <span class="mb-0 text-default">Kategori,Unit & Penyimpanan</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/kategori/add" class="dropdown-item">
                                    <i class="fas fa-plus text-purple"></i>
                                    <span>Tambah Kategori</span>
                                </a>
                                <a href="/kategori" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-purple"></i>
                                    <span>List Kategori</span>
                                </a>
                                <a href="/unit/add" class="dropdown-item">
                                    <i class="fas fa-plus text-purple"></i>
                                    <span>Tambah Unit</span>
                                </a>
                                <a href="/unit" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-purple"></i>
                                    <span>List Unit</span>
                                </a>
                                <a href="/penyimpanan/add" class="dropdown-item">
                                    <i class="fas fa-plus text-purple"></i>
                                    <span>Tambah Penyimpanan</span>
                                </a>
                                <a href="/penyimpanan" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-purple"></i>
                                    <span>List penyimpanan</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-people-carry text-orange"></i>
                                <span class="mb-0 text-default">Pemasok</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/pemasok/add" class="dropdown-item">
                                <i class="fas fa-plus text-orange"></i>
                                <span>Tambah Pemasok</span>
                            </a>
                            <a href="/pemasok" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-orange"></i>
                                <span>List Pemasok</span>
                            </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shipping-fast text-info"></i>
                                <span class="mb-0 text-default">Penjualan</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/penjualan/add" class="dropdown-item">
                                    <i class="fas fa-plus text-info"></i>
                                    <span>Tambah Penjualan</span>
                                </a>
                                <a href="/penjualan" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-info"></i>
                                    <span>List Penjualan</span>
                                </a>
                                <a href="/penjualan/verifikasi" class="dropdown-item">
                                    <i class="fas fa-hand-holding-usd text-info"></i>
                                    <span>Verifikasi Pembayaran</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-bag text-success"></i>
                                <span class="mb-0 text-default">Pembelian</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/pembelian/add" class="dropdown-item">
                                    <i class="fas fa-plus text-success"></i>
                                    <span>Tambah Pembelian</span>
                                </a>
                                <a href="/pembelian" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-success"></i>
                                    <span>List Pembelian</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/laporan">
                                <i class="fas fa-book-medical text-default"></i>
                                <span class="nav-link-text text-default">Laporan</span>
                            </a>
                        </li>

                    @elseif (auth()->user()->level==2)
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shipping-fast text-info"></i>
                                <span class="mb-0 text-default">Penjualan</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/penjualan/add" class="dropdown-item">
                                <i class="fas fa-plus text-info"></i>
                                <span>Tambah Penjualan</span>
                            </a>
                            <a href="/penjualan" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-info"></i>
                                <span>List Penjualan</span>
                            </a>
                            <a href="/penjualan/verifikasi" class="dropdown-item">
                                <i class="fas fa-hand-holding-usd text-info"></i>
                                <span>Verifikasi Pembayaran</span>
                            </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/laporan">
                                <i class="fas fa-book-medical text-default"></i>
                                <span class="nav-link-text text-default">Laporan</span>
                            </a>
                        </li>

                    @elseif (auth()->user()->level==3)
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-bag text-success"></i>
                                <span class="mb-0 text-default">Pembelian</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/pembelian/add" class="dropdown-item">
                                <i class="fas fa-plus text-success"></i>
                                <span>Tambah Pembelian</span>
                            </a>
                            <a href="/pembelian" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-success"></i>
                                <span>List Pembelian</span>
                            </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/laporan">
                                <i class="fas fa-book-medical text-default"></i>
                                <span class="nav-link-text text-default">Laporan</span>
                            </a>
                        </li>

                        @elseif (auth()->user()->level==4)
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-pills text-danger"></i>
                                <span class="mb-0 text-default">Obat</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/obat/add" class="dropdown-item">
                                <i class="fas fa-plus text-danger"></i>
                                <span>Tambah Obat</span>
                            </a>
                            <a href="/obat" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-danger"></i>
                                <span>List Obat</span>
                            </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-layer-group text-purple"></i>
                                <span class="mb-0 text-default">Kategori & Unit</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/kategori/add" class="dropdown-item">
                                    <i class="fas fa-plus text-purple"></i>
                                    <span>Tambah Kategori</span>
                                </a>
                                    <a href="/kategori" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-purple"></i>
                                <span>List Kategori</span>
                                </a>
                                    <a href="/unit/add" class="dropdown-item">
                                    <i class="fas fa-plus text-purple"></i>
                                <span>Tambah Unit</span>
                                </a>
                                    <a href="/unit" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-purple"></i>
                                <span>List Unit</span>
                                </a>
                                    <a href="/penyimpanan/add" class="dropdown-item">
                                    <i class="fas fa-plus text-purple"></i>
                                <span>Tambah Penyimpanan</span>
                                </a>
                                <a href="/penyimpanan" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-purple"></i>
                                    <span>List penyimpanan</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-people-carry text-orange"></i>
                            <span class="mb-0 text-default">Pemasok</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/pemasok/add" class="dropdown-item">
                                    <i class="fas fa-plus text-orange"></i>
                                    <span>Tambah Pemasok</span>
                                </a>
                                <a href="/pemasok" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-orange"></i>
                                    <span>List Pemasok</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/laporan">
                                <i class="fas fa-book-medical text-default"></i>
                                <span class="nav-link-text text-default">Laporan</span>
                            </a>
                        </li>

                    @elseif (auth()->user()->level==5)
                        <?php $id_guest = Auth::user()->id; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/penjualan/add/">
                                <i class="fas fa-pills text-default"></i>
                                <span class="nav-link-text text-darker">Beli Obat</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/guest/{{$id_guest}}">
                                <i class="fas fa-clipboard-list text-info text-default"></i>
                                <span class="nav-link-text text-darker">List Pembelian Obat</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/kelompok">
                            <i class="fas fa-user-friends text-indigo"></i>
                            <span class="nav-link-text text-darker">Kelompok</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </nav>
