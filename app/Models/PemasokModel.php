<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemasokModel extends Model
{
    use HasFactory;

    //Ambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_pemasok')->get();
    }
    //

    //Ambil Data Dari DB Berdasarkan ID
    public function detailData($id_pemasok)
    {
        return DB::table('tbl_pemasok')->where('id_pemasok', $id_pemasok)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_pemasok')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_pemasok,$data)
    {
        DB::table('tbl_pemasok')->where('id_pemasok',$id_pemasok)->update($data);
    }
    //

    //Delete Data Ke DB
    public function deleteData($id_pemasok)
    {
        DB::table('tbl_pemasok')->where('id_pemasok',$id_pemasok)->delete();
    }
    //

    //Urutkan Data Dari DB Lalu Di Urutkan Secara Descending Dan Diambil 1 Dari Yg Paling Atas
    public function getId()
    {
        $getId = DB::table('tbl_pemasok')->orderBy('id_pemasok','DESC')->take(1)->get();
        foreach ($getId as $value)
        $idbr = $value->id_pemasok;
        return $kode_pemasok = 'PMK'.$idbr+1;
    }
    //

    //Menjumlahkan Data Dari DB
    public function JmlPemasok()
    {
        return $JmlPemasok = DB::table('tbl_pemasok')->count('id_pemasok');
    }
    //
}
