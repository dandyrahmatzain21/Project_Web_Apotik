<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Invoice {{date('D-M-Y')}}</title>
    @include('part/css_link')
</head>

<body onload="window.print();">
    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </div>
        </nav>
        <div class="header bg-primary pb-9">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h1 class="h1 text-white d-inline-block mb-0">APOTEK ABC</h1>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <h1 style="color: white">Date : {{date('D-M-Y')}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Halaman Invoice -->
        <div class="container-fluid mt--9">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h1 class="mb-0"><i class="fas fa-globe-asia"></i> Invoice.</h1><br>
                            <div class="row">
                                <div class="col-4">
                                    <p>Dari <br>
                                    Apotek ABC <br>
                                    Jl.Desa Cipondok <br>
                                    Kuningan 45561 <br>
                                    Telp : 08123456789</p>
                                </div>
                                <div class="col-4">
                                    <p>Ke <br>
                                    {{$penjualan_online->nama_pembeli}} <br>
                                    Kuningan</p>
                                </div>
                                <div class="col-4">
                                    <p>No Referensi : {{$penjualan_online->ref}} <br>
                                    Total Pembelian : {{$penjualan_online->banyak}} <br>
                                    Tanggal : {{$penjualan_online->tgl_beli}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="icon-example">
                                <table class="table table-bordered table table-striped">
                                    <thead>
                                        <th>Nama Obat</th>
                                        <th>Harga Satuan</th>
                                        <th>Banyak</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$penjualan_online->nama_obat}}</td>
                                            <td>Rp.{{$penjualan_online->harga_jual}}</td>
                                            <td>{{$penjualan_online->banyak}}</td>
                                            <td>Rp.{{$penjualan_online->subtotal}}</td>
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <th colspan="3">Grandtotal</th>
                                        <td>Rp.{{$penjualan_online->grandtotal}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>Terima Kasih.</p>
        </div>
        <!-- END Halaman Invoice -->
    </div>
@include('part/javascript_link')
</body>
</html>
