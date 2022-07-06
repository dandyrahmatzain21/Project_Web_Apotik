<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatModel;
use App\Models\KategoriModel;
use App\Models\UnitModel;
use App\Models\PenyimpananModel;
use App\Models\PemasokModel;
use App\Models\PenjualanModel;
use App\Models\PembelianModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->ObatModel        = new ObatModel();
        $this->KategoriModel    = new KategoriModel();
        $this->UnitModel        = new UnitModel();
        $this->PenyimpananModel = new PenyimpananModel();
        $this->PemasokModel     = new PemasokModel();
        $this->PenjualanModel   = new PenjualanModel();
        $this->PembelianModel   = new PembelianModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //Method Index
    public function index()
    {   $data = [
        'JmlObat'               => $this->ObatModel->JmlObat(),
        'JmlKategori'           => $this->KategoriModel->JmlKategori(),
        'JmlUnit'               => $this->UnitModel->JmlUnit(),
        'JmlPenyimpanan'        => $this->PenyimpananModel->JmlPenyimpanan(),
        'JmlPemasok'            => $this->PemasokModel->JmlPemasok(),
        'JmlPenjualan'          => $this->PenjualanModel->JmlPenjualan(),
        'JmlPenjualanOnline'    => $this->PenjualanModel->JmlPenjualanOnline(),
        'JmlPembelian'          => $this->PembelianModel->JmlPembelian(),
    ];
        return view('home',$data);
    }
    //

    //Method Kelompok
    public function kelompok(){
        return view('v_kelompok');
    }
}
