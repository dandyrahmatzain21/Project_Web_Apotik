<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\ShiftRight;

class ObatModel extends Model
{
    use HasFactory;
    //Ambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_obat')->get();
    }
    //

    //Ambil Data Berdasarkan Id Dari DB
    public function detailData($id_obat)
    {
        return DB::table('tbl_obat')->where('id_obat', $id_obat)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_obat')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_obat,$data)
    {
        DB::table('tbl_obat')->where('id_obat',$id_obat)->update($data);
    }
    //

    //Delete Data Ke DB
    public function deleteData($id_obat)
    {
        DB::table('tbl_obat')->where('id_obat',$id_obat)->delete();
    }
    //

    //Urutkan Data Dari DB Lalu Di Urutkan Secara Descending Dan Diambil 1 Dari Yg Paling Atas
    public function getId()
    {
        $getId = DB::table('tbl_obat')->orderBy('id_obat','DESC')->take(1)->get();
        foreach ($getId as $value)
        $idbr = $value->id_obat;
        return $kode_obat = 'OBT'.$idbr+1;
    }
    //

    //Menjumlahkan Data Dari
    public function JmlObat()
    {
        return $JmlObat = DB::table('tbl_obat')->count('id_obat');
    }
    //
}
