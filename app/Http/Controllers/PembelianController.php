<?php

namespace App\Http\Controllers;

//Load Model
use Illuminate\Http\Request;
use App\Models\PembelianModel;
use App\Models\ObatModel;
use App\Models\KategoriModel;
use App\Models\UnitModel;
use App\Models\PemasokModel;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->PembelianModel   = new PembelianModel();
        $this->ObatModel        = new ObatModel();
        $this->KategoriModel    = new KategoriModel();
        $this->UnitModel        = new UnitModel();
        $this->PemasokModel     = new PemasokModel();
        $this->PenjualanModel   = new PenjualanModel();
    }

    //Method Index
    public function index()
    {
       $data = [
            'pembelian'     => $this->PembelianModel->allData(),
            'obat'          => $this->ObatModel->allData(),
            'kategori'      => $this->KategoriModel->allData(),
            'unit'          => $this->UnitModel->allData(),
            'pemasok'       => $this->PemasokModel->allData(),
            'penjualan'     => $this->PenjualanModel->allData(),
       ];

        return view('pembelian/v_pembelian',$data);
    }
    //

    //Method Detail
    public function detail($id_pembelian)
    {
        if (!$this->PembelianModel->detailData($id_pembelian))
        {
            abort(404);
        }
       $data = [
            'pembelian' => $this->PembelianModel->detailData($id_pembelian),
       ];
        return view('pembelian/v_detail_pembelian',$data);
    }
    //

    //Method Add
    public function add()
    {
        $data = [
             'obat'         => $this->ObatModel->allData(),
             'kategori'     => $this->KategoriModel->allData(),
             'unit'         => $this->UnitModel->allData(),
             'pemasok'      => $this->PemasokModel->allData(),
             'penjualan'    => $this->PenjualanModel->allData(),
        ];
        return view('pembelian/v_add_pembelian',$data);
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'id_obat'               =>'required',
            'kode_obat'             =>'required',
            'ref'                   =>'required|unique:tbl_pembelian,ref',
            'nama_obat'             =>'required',
            'harga_beli'            =>'required',
            'banyak_pembelian'      =>'required',
            'subtotal_pembelian'    =>'required',
            'nama_pemasok'          =>'required',
            'tgl_beli'              =>'required',
            'grandtotal_pembelian'  =>'required',
        ],[
            'id_obat.required'              =>'Wajib Diisi',
            'kode_obat.required'            =>'Wajib Diisi',
            'ref.required'                  =>'Wajib Diisi',
            'ref.unique'                    =>'Ref Ini Sudah Ada',
            'nama_obat.required'            => 'Wajib Diisi',
            'harga_beli.required'           => 'Wajib Diisi',
            'banyak_pembelian.required'     => 'Wajib Diisi',
            'subtotal_pembelian.required'   => 'Wajib Diisi',
            'nama_pemasok.required'         => 'Wajib Diisi',
            'tgl_beli.required'             =>'Wajib Diisi',
            'grandtotal_pembelian.required' =>'Wajib Diisi',
        ]);
        $data = [
            'id_obat'               => Request()->id_obat,
            'kode_obat'             => Request()->kode_obat,
            'ref'                   => Request()->ref,
            'nama_obat'             => Request()->nama_obat,
            'harga_beli'            => Request()->harga_beli,
            'banyak'                => Request()->banyak_pembelian,
            'subtotal'              => Request()->subtotal_pembelian,
            'nama_pemasok'          => Request()->nama_pemasok,
            'tgl_beli'              => Request()->tgl_beli,
            'grandtotal'            => Request()->grandtotal_pembelian,
        ];
        $this->PembelianModel->addData($data);
        return redirect()->route('pembelian')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Delete
    public function delete($id_pembelian)
    {
        $this->PembelianModel->deleteData($id_pembelian);
        return redirect()->route('pembelian')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'pembelian' => $this->PembelianModel->allData(),
       ];
        return view('pembelian/v_print_pembelian',$data);
    }
    //

    //Method Invoice
    public function invoice($id_pembelian)
    {
       $data = [
            'pembelian' => $this->PembelianModel->detailData($id_pembelian),
       ];
        return view('pembelian/v_invoice_pembelian',$data);
    }
    //
}
