<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembelianModel extends Model
{
    use HasFactory;

    //Ambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_pembelian')->get();
    }
    //

    //Ambil Data Dari DB Berdasarkan ID
    public function detailData($id_pembelian)
    {
        return DB::table('tbl_pembelian')->where('id_pembelian', $id_pembelian)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_pembelian')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_pembelian,$data)
    {
        DB::table('tbl_pembelian')->where('id_pembelian',$id_pembelian)->update($data);
    }
    //

    //Delete Data Ke DB
    public function deleteData($id_pembelian)
    {
        DB::table('tbl_pembelian')->where('id_pembelian',$id_pembelian)->delete();
    }
    //

    //Menjumlahkan Data Dari DB
    public function JmlPembelian()
    {
        return $JmlPembelian = DB::table('tbl_pembelian')->count('id_pembelian');
    }
    //
}
