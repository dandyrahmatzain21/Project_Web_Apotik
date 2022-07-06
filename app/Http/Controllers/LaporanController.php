<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Method Index
    public function index()
    {
        return view('laporan/v_laporan');
    }
    //

    //Method Print Lap.Penjualan
    public function print_laporan_penjualan($tgl_awal_penjualan, $tgl_akhir_penjualan)
    {
        $laporan_penjualan = DB::table('tbl_penjualan')->whereBetween('tgl_beli',[$tgl_awal_penjualan,$tgl_akhir_penjualan])->get();
        return view('laporan/v_laporan_penjualan',compact('laporan_penjualan','tgl_awal_penjualan','tgl_akhir_penjualan'));
    }
    //

    //Method Print Lap.Penjualan Online
    public function print_laporan_penjualan_online($tgl_awal_penjualan_online, $tgl_akhir_penjualan_online)
    {
        $laporan_penjualan_online = DB::table('tbl_penjualan_online')->whereBetween('tgl_beli',[$tgl_awal_penjualan_online,$tgl_akhir_penjualan_online])->get();
        return view('laporan/v_laporan_penjualan_online',compact('laporan_penjualan_online','tgl_awal_penjualan_online','tgl_akhir_penjualan_online'));
    }
    //

    //Method Print Lap.Pembelian
    public function print_laporan_pembelian($tgl_awal_pembelian, $tgl_akhir_pembelian)
    {
        $laporan_pembelian = DB::table('tbl_pembelian')->whereBetween('tgl_beli',[$tgl_awal_pembelian,$tgl_akhir_pembelian])->get();
        $count= $laporan_pembelian->count();
        return view('laporan/v_laporan_pembelian',compact('laporan_pembelian','tgl_awal_pembelian','tgl_akhir_pembelian','count'));
    }
    //

    //Method Print Lap.Obat
    public function print_laporan_obat($tgl_awal_obat, $tgl_akhir_obat)
    {
        $laporan_obat = DB::table('tbl_obat')->whereBetween('tgl_masuk',[$tgl_awal_obat,$tgl_akhir_obat])->get();
        return view('laporan/v_laporan_obat',compact('laporan_obat','tgl_awal_obat','tgl_akhir_obat'));
    }
    //
}
