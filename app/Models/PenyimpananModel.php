<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenyimpananModel extends Model
{
    use HasFactory;

    //Mengambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_penyimpanan')->get();
    }
    //

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function detailData($id_penyimpanan)
    {
        return DB::table('tbl_penyimpanan')->where('id_penyimpanan', $id_penyimpanan)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_penyimpanan')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_penyimpanan,$data)
    {
        DB::table('tbl_penyimpanan')->where('id_penyimpanan',$id_penyimpanan)->update($data);
    }
    //

    //Delete Data Dari DB
    public function deleteData($id_penyimpanan)
    {
        DB::table('tbl_penyimpanan')->where('id_penyimpanan',$id_penyimpanan)->delete();
    }
    //


    //Menjumlahkan Data Dari DB
    public function Jmlpenyimpanan()
    {
        return $Jmlpenyimpanan = DB::table('tbl_penyimpanan')->count('id_penyimpanan');
    }
    //
}
