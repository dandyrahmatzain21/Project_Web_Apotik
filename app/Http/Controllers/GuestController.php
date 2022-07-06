<?php

namespace App\Http\Controllers;

//Load Model
use Illuminate\Http\Request;
use App\Models\ObatModel;
use App\Models\KategoriModel;
use App\Models\UnitModel;
use App\Models\PemasokModel;
use App\Models\PenjualanModel;
use App\Models\GuestModel;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->ObatModel        = new ObatModel();
        $this->KategoriModel    = new KategoriModel();
        $this->UnitModel        = new UnitModel();
        $this->PemasokModel     = new PemasokModel();
        $this->PenjualanModel   = new PenjualanModel();
        $this->GuestModel       = new GuestModel();
    }

    //Method Index
    public function index($id_guest)
    {
       $data = [
            'obat'          => $this->ObatModel->allData(),
            'kategori'      => $this->KategoriModel->allData(),
            'unit'          => $this->UnitModel->allData(),
            'pemasok'       => $this->PemasokModel->allData(),
            'penjualan'     => $this->PenjualanModel->allData(),
            'guest'         => $this->GuestModel->allData($id_guest),
       ];
        return view('guest/v_guest',$data);
    }
    //

    //Method Beli
    public function beli()
    {
        $data = [
            'obat'          => $this->ObatModel->allData(),
            'kategori'      => $this->KategoriModel->allData(),
            'unit'          => $this->UnitModel->allData(),
            'pemasok'       => $this->PemasokModel->allData(),
            'penjualan'     => $this->PenjualanModel->allData(),
        ];
        return view('penjualan/v_add_penjualan',$data);
    }

    //Method Insert
    public function insert()
    {
        if (Request()->banyak > Request()->stok){
        Request()->validate([
            'id_guest'        =>'required',
            'id_obat'         =>'required',
            'kode_obat'       =>'required',
            'ref'             =>'required|unique:tbl_penjualan,ref',
            'nama_obat'       =>'required',
            'harga_jual'      =>'required',
            'banyak'          =>'required|size:100',
            'subtotal'        =>'required',
            'nama_pembeli'    =>'required',
            'tgl_beli'        =>'required',
            'grandtotal'      =>'required',
        ],[
            'id_guest.required'     =>'Wajib Diisi',
            'id_obat.required'      =>'Wajib Diisi',
            'kode_obat.required'    =>'Wajib Diisi',
            'ref.required'          =>'Wajib Diisi',
            'ref.unique'            =>'Ref Ini Sudah Ada',
            'nama_obat.required'    =>'Wajib Diisi',
            'harga_jual.required'   =>'Wajib Diisi',
            'banyak.required'       =>'Wajib Diisi',
            'banyak.size'           =>'Banyak Barang Melebihi Stok Yang Ada',
            'subtotal.required'     =>'Wajib Diisi',
            'nama_pembeli.required' =>'Wajib Diisi',
            'tgl_beli.required'     =>'Wajib Diisi',
            'grandtotal.required'   =>'Wajib Diisi',
        ]);
        }else{
        Request()->validate([
            'id_guest'          =>'required',
            'id_obat'           =>'required',
            'kode_obat'         =>'required',
            'ref'               =>'required|unique:tbl_penjualan,ref',
            'nama_obat'         =>'required',
            'harga_jual'        =>'required',
            'banyak'            =>'required',
            'subtotal'          =>'required',
            'nama_pembeli'      =>'required',
            'tgl_beli'          =>'required',
            'grandtotal'        =>'required',
        ],[
            'id_guest.required'     =>'Wajib Diisi',
            'id_obat.required'      =>'Wajib Diisi',
            'kode_obat.required'    =>'Wajib Diisi',
            'ref.required'          =>'Wajib Diisi',
            'ref.unique'            =>'Ref Ini Sudah Ada',
            'nama_obat.required'    =>'Wajib Diisi',
            'harga_jual.required'   =>'Wajib Diisi',
            'banyak.required'       =>'Wajib Diisi',
            'subtotal.required'     =>'Wajib Diisi',
            'nama_pembeli.required' =>'Wajib Diisi',
            'tgl_beli.required'     =>'Wajib Diisi',
            'grandtotal.required'   =>'Wajib Diisi',
        ]);
        }
        $data = [
            'id_guest'           => Request()->id_guest,
            'id_obat'            => Request()->id_obat,
            'kode_obat'          => Request()->kode_obat,
            'ref'                => Request()->ref,
            'ref'                => Request()->ref,
            'nama_obat'          => Request()->nama_obat,
            'harga_jual'         => Request()->harga_jual,
            'banyak'             => Request()->banyak,
            'subtotal'           => Request()->subtotal,
            'nama_pembeli'       => Request()->nama_pembeli,
            'tgl_beli'           => Request()->tgl_beli,
            'grandtotal'         => Request()->grandtotal,
        ];
        $this->PenjualanModel->addData($data);
        return redirect()->route('guest')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Invoice
    public function invoice($id_penjualan)
    {
       $data = [
            'penjualan'         => $this->PenjualanModel->detailData($id_penjualan),
            'penjualan_online'  => $this->PenjualanModel->detailDataOnline($id_penjualan),
       ];
        return view('guest/v_invoice_guest',$data);
    }
    //
}
