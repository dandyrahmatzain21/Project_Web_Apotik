<script src="{{asset('argon-template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="{{asset('argon-template')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="{{asset('argon-template')}}/assets/js/argon.js?v=1.2.0"></script>
<!-- Jquery Penjumlahan Otomatis -->
<script src="{{asset('argon-template')}}/assets/js/jquery.js"></script>
<!-- Penjualan JS -->
<script type="text/javascript">
    $("#banyak").keyup(function(){
        var a = parseFloat($("#banyak").val());
        var b = parseFloat($("#harga_jual").val());
        var c = a*b;
        $("#subtotal").val(c);
    });

    $("#harga_jual").keyup(function(){
        var a = parseFloat($("#banyak").val());
        var b = parseFloat($("#harga_jual").val());
        var c = a*b;
        $("#subtotal").val(c);
    });

    $("#banyak").keyup(function(){
        var a = parseFloat($("#banyak").val());
        var b = parseFloat($("#harga_jual").val());
        var c = a*b;
        $("#grandtotal").val(c);
    });

    $("#harga_jual").keyup(function(){
        var a = parseFloat($("#banyak").val());
        var b = parseFloat($("#harga_jual").val());
        var c = a*b;
        $("#grandtotal").val(c);
    });


    $("#banyak_pembelian").keyup(function(){
        var a = parseFloat($("#banyak_pembelian").val());
        var b = parseFloat($("#harga_beli").val());
        var c = a*b;
        $("#subtotal_pembelian").val(c);
    });

    $("#harga_beli").keyup(function(){
        var a = parseFloat($("#banyak_pembelian").val());
        var b = parseFloat($("#harga_beli").val());
        var c = a*b;
        $("#subtotal_pembelian").val(c);
    });

    $("#banyak_pembelian").keyup(function(){
        var a = parseFloat($("#banyak_pembelian").val());
        var b = parseFloat($("#harga_beli").val());
        var c = a*b;
        $("#grandtotal_pembelian").val(c);
    });

    $("#harga_beli").keyup(function(){
        var a = parseFloat($("#banyak_pembelian").val());
        var b = parseFloat($("#harga_beli").val());
        var c = a*b;
        $("#grandtotal_pembelian").val(c);
    });
</script>
<script type="text/javascript" src="{{asset('DataTables')}}/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#tbl_obat').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#tbl_kategori').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#tbl_unit').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#tbl_pemasok').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#tbl_penjualan').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#tbl_pembelian').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
