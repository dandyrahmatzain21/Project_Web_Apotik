<?php

namespace App\Http\Controllers;

//Load Model
use Illuminate\Http\Request;
use App\Models\ObatModel;
use App\Models\KategoriModel;
use App\Models\UnitModel;
use App\Models\PemasokModel;
use App\Models\PenjualanModel;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'obat'      => $this->ObatModel->allData(),
            'kategori'  => $this->KategoriModel->allData(),
            'unit'      => $this->UnitModel->allData(),
            'pemasok'   => $this->PemasokModel->allData(),
            'penjualan' => $this->PenjualanModel->allData(),
       ];

        return view('penjualan/v_penjualan',$data);
    }
    //

    //Method Detail
    public function detail($id_penjualan)
    {
        if (!$this->PenjualanModel->detailData($id_penjualan)){
            abort(404);
        }
       $data = [
            'penjualan' => $this->PenjualanModel->detailData($id_penjualan),
       ];
        return view('penjualan/v_detail_penjualan',$data);
    }
    //

    //Method Add
    public function add()
    {
        $data = [
            'obat'      => $this->ObatModel->allData(),
            'kategori'  => $this->KategoriModel->allData(),
            'unit'      => $this->UnitModel->allData(),
            'pemasok'   => $this->PemasokModel->allData(),
            'penjualan' => $this->PenjualanModel->allData(),
        ];
        if (auth()->user()->level==5)
        {
            return view('penjualan/v_add_penjualan_online',$data);
        } else
        {
            return view('penjualan/v_add_penjualan',$data);
        }
    }
    //

    //Method Insert
    public function insert()
    {
        if (Request()->banyak > Request()->stok) {
        Request()->validate([
            'id_guest'              =>'required',
            'id_obat'               =>'required',
            'kode_obat'             =>'required',
            'ref'                   =>'required|unique:tbl_penjualan,ref',
            'nama_obat'             =>'required',
            'harga_jual'            =>'required',
            'banyak'                =>'required|size:100',
            'subtotal'              =>'required',
            'nama_pembeli'          =>'required',
            'tgl_beli'              =>'required',
            'grandtotal'            =>'required',
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
        }else
        {
        Request()->validate([
            'id_guest'              =>'required',
            'id_obat'               =>'required',
            'kode_obat'             =>'required',
            'ref'                   =>'required|unique:tbl_penjualan,ref',
            'nama_obat'             =>'required',
            'harga_jual'            =>'required',
            'banyak'                =>'required',
            'subtotal'              =>'required',
            'nama_pembeli'          =>'required',
            'tgl_beli'              =>'required',
            'grandtotal'            =>'required',
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
            'id_guest'              => Request()->id_guest,
            'id_obat'               => Request()->id_obat,
            'kode_obat'             => Request()->kode_obat,
            'ref'                   => Request()->ref,
            'ref'                   => Request()->ref,
            'nama_obat'             => Request()->nama_obat,
            'harga_jual'            => Request()->harga_jual,
            'banyak'                => Request()->banyak,
            'subtotal'              => Request()->subtotal,
            'nama_pembeli'          => Request()->nama_pembeli,
            'tgl_beli'              => Request()->tgl_beli,
            'grandtotal'            => Request()->grandtotal,
        ];
        $id_guest = Auth()->user()->id;
        $this->PenjualanModel->addData($data);
        if (auth()->user()->level==5) {
            return redirect()->route('guest',$id_guest)->with('Pesan','Data Berhasil Di tambahkan');
        }else{
            return redirect()->route('penjualan')->with('Pesan','Data Berhasil Di tambahkan');
        }
    }
    //

    //Method Insert Penjualan Online
    public function insert_online()
    {
        if (Request()->banyak > Request()->stok) {
        Request()->validate([
            'id_guest'              =>'required',
            'id_obat'               =>'required',
            'kode_obat'             =>'required',
            'ref'                   =>'required|unique:tbl_penjualan,ref',
            'nama_obat'             =>'required',
            'harga_jual'            =>'required',
            'banyak'                =>'required|size:100',
            'subtotal'              =>'required',
            'nama_pembeli'          =>'required',
            'grandtotal'            =>'required',
            'status_bayar'          =>'required',
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
            'grandtotal.required'   =>'Wajib Diisi',
            'status_bayar.required' =>'Wajib Diisi',
        ]);
        }else{
        Request()->validate([
            'id_guest'              =>'required',
            'id_obat'               =>'required',
            'kode_obat'             =>'required',
            'ref'                   =>'required|unique:tbl_penjualan,ref',
            'nama_obat'             =>'required',
            'harga_jual'            =>'required',
            'banyak'                =>'required',
            'subtotal'              =>'required',
            'nama_pembeli'          =>'required',
            'grandtotal'            =>'required',
            'status_bayar'          =>'required',
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
            'grandtotal.required'   =>'Wajib Diisi',
            'status_bayar.required' =>'Wajib Diisi',
        ]);
        }
        $data = [
            'id_guest'              => Request()->id_guest,
            'id_obat'               => Request()->id_obat,
            'kode_obat'             => Request()->kode_obat,
            'ref'                   => Request()->ref,
            'ref'                   => Request()->ref,
            'nama_obat'             => Request()->nama_obat,
            'harga_jual'            => Request()->harga_jual,
            'banyak'                => Request()->banyak,
            'subtotal'              => Request()->subtotal,
            'nama_pembeli'          => Request()->nama_pembeli,
            'grandtotal'            => Request()->grandtotal,
            'status_bayar'          => Request()->status_bayar,
        ];
        $id_guest = Auth()->user()->id;
        $this->PenjualanModel->addDataOnline($data);
        return redirect()->route('guest',$id_guest)->with('Pesan','Sukses Melakukan Pembelian , Silahkan Lakukan Pembayaran Dan Verifikasi Di Apotek ABC Terdekat');
    }
    //

    //Method Delete
    public function delete($id_penjualan)
    {
        $this->PenjualanModel->deleteData($id_penjualan);
        return redirect()->route('penjualan')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Delete Penjualan Online
    public function delete_online($id_penjualan)
    {
        $this->PenjualanModel->deleteDataOnline($id_penjualan);
        return redirect()->route('verifikasi')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'penjualan' => $this->PenjualanModel->allData(),
       ];
        return view('penjualan/v_print_penjualan',$data);
    }
    //

    //Method Print Penjualan Online
    public function print_online(){
       $data = [
            'penjualan_online' => $this->PenjualanModel->allDataOnlinePrint(),
       ];
        return view('penjualan/v_print_penjualan_online',$data);
    }
    //

    //Method Invoice
    public function invoice($id_penjualan)
    {
       $data = [
            'penjualan'         => $this->PenjualanModel->detailData($id_penjualan),
            'penjualan_online'  => $this->PenjualanModel->detailDataOnline($id_penjualan),
       ];
        return view('penjualan/v_invoice_penjualan',$data);
    }
    //

    //Method Verifikasi
    public function verifikasi()
    {
        $data = [
            'obat'              => $this->ObatModel->allData(),
            'penjualan'         => $this->PenjualanModel->allData(),
            'penjualan_online'  => $this->PenjualanModel->allDataOnline(),
        ];
            return view('penjualan/v_verifikasi',$data);
    }
    //

    //Method Verifikasi Pembayaran
    public function verifikasi_pembayaran($id_penjualan)
    {
        if (Request()->banyak > Request()->stok)
        {
            Request()->validate([
                'id_guest'              =>'required',
                'id_obat'               =>'required',
                'kode_obat'             =>'required',
                'ref'                   =>'required|unique:tbl_penjualan,ref',
                'nama_obat'             =>'required',
                'harga_jual'            =>'required',
                'subtotal'              =>'required',
                'nama_pembeli'          =>'required',
                'tgl_beli'              =>'required',
                'grandtotal'            =>'required',
                'status_bayar'          =>'required',
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
                'status_bayar.required' =>'Wajib Diisi',
            ]);
            return redirect()->route('verifikasi')->with('Pesan Gagal','Verifikasi Gagal Karena Banyak Barang Melebihi Stok Yang Ada');
        }else
            {
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
                'status_bayar'      =>'required',
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
                'status_bayar.required' =>'Wajib Diisi',
            ]);
            }
            $data = [
                'id_guest'              => Request()->id_guest,
                'id_obat'               => Request()->id_obat,
                'kode_obat'             => Request()->kode_obat,
                'ref'                   => Request()->ref,
                'ref'                   => Request()->ref,
                'nama_obat'             => Request()->nama_obat,
                'harga_jual'            => Request()->harga_jual,
                'banyak'                => Request()->banyak,
                'subtotal'              => Request()->subtotal,
                'nama_pembeli'          => Request()->nama_pembeli,
                'tgl_beli'              => Request()->tgl_beli,
                'grandtotal'            => Request()->grandtotal,
                'status_bayar'          => Request()->status_bayar,
            ];
        $this->PenjualanModel->editDataOnline($id_penjualan,$data);
        return redirect()->route('verifikasi')->with('Pesan','Pembayaran Berhasil Di Verifikasi');
    }
    //
}
