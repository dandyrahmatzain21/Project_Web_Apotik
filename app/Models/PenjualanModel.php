<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenjualanModel extends Model
{
    use HasFactory;
    //Ambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_penjualan')->get();
    }
    //

    //Ambil Data Dari DB Dan Di Join (Tujuan Untuk Mengambil Filed Stok Dari TBL Obat)
    public function allDataOnline()
    {
        return DB::table('tbl_penjualan_online')->join('tbl_obat','tbl_penjualan_online.id_obat','=','tbl_obat.id_obat')->get();
    }
    //

    //Ambil Data Dari DB Dan Di Join (Tujuan Untuk Mengambil Filed Stok Dari TBL Obat) Dan Diambil Berdasarkan Status Bayar Yang Sudah
    public function allDataOnlinePrint()
    {
        return DB::table('tbl_penjualan_online')->join('tbl_obat','tbl_penjualan_online.id_obat','=','tbl_obat.id_obat')->where('status_bayar','=','Sudah')->get();
    }
    //

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function detailData($id_penjualan)
    {
        return DB::table('tbl_penjualan')->where('id_penjualan', $id_penjualan)->first();
    }
    //

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function detailDataOnline($id_penjualan)
    {
        return DB::table('tbl_penjualan_online')->where('id_penjualan', $id_penjualan)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_penjualan')->insert($data);
    }
    //

    //Insert Data Ke DB
    public function addDataOnline($data)
    {
        DB::table('tbl_penjualan_online')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_penjualan,$data)
    {
        DB::table('tbl_penjualan')->where('id_penjualan',$id_penjualan)->update($data);
    }
    //

    //Update Data Ke DB
    public function editDataOnline($id_penjualan,$data)
    {
        DB::table('tbl_penjualan_online')->where('id_penjualan',$id_penjualan)->update($data);
    }
    //

    //Delete Data Dari DB
    public function deleteData($id_penjualan)
    {
        DB::table('tbl_penjualan')->where('id_penjualan',$id_penjualan)->delete();
    }
    //

    //Delete Data Dari DB
    public function deleteDataOnline($id_penjualan)
    {
        DB::table('tbl_penjualan_online')->where('id_penjualan',$id_penjualan)->delete();
    }
    //

    //Menjumlahkan Isi Tabel
    public function JmlPenjualan()
    {
        return $JmlPenjualan = DB::table('tbl_penjualan')->count('id_penjualan');
    }
    //


    //Menjumlahkan Data Dari DB
    public function JmlPenjualanOnline()
    {
        return $JmlPenjualanOnline = DB::table('tbl_penjualan_online')->where('status_bayar','=','Sudah')->count('id_penjualan');
    }
    //

}
