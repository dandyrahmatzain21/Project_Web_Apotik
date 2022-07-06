<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnitModel extends Model
{
    use HasFactory;

    //Mengambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_unit')->get();
    }
    //

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function detailData($id_unit)
    {
        return DB::table('tbl_unit')->where('id_unit', $id_unit)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_unit')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_unit,$data)
    {
        DB::table('tbl_unit')->where('id_unit',$id_unit)->update($data);
    }
    //

    //Delete Data Dari DB
    public function deleteData($id_unit)
    {
        DB::table('tbl_unit')->where('id_unit',$id_unit)->delete();
    }
    //


    //Menjumlahkan Data Dari DB
    public function JmlUnit()
    {
        return $JmlUnit = DB::table('tbl_unit')->count('id_unit');
    }
    //
}
