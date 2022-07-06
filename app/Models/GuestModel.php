<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GuestModel extends Model
{
    use HasFactory;

    //Ambil Semua Data
    public function allData($id_guest)
    {
        return DB::table('tbl_penjualan_online')->where('id_guest', '=',$id_guest)->get();
    }
    //

    //Ambil Data Berdasarkan Id Penjualan Yg Dipilih
    public function detailDataOnline($id_penjualan)
    {
        return DB::table('tbl_penjualan_online')->where('id_penjualan', $id_penjualan)->first();
    }
    //
}
