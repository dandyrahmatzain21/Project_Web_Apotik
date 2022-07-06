<?php

namespace App\Http\Controllers;

//Load Model
use Illuminate\Http\Request;
use App\Models\ObatModel;
use App\Models\KategoriModel;
use App\Models\UnitModel;
use App\Models\PenyimpananModel;
use App\Models\PemasokModel;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class ObatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->ObatModel        = new ObatModel();
        $this->KategoriModel    = new KategoriModel();
        $this->UnitModel        = new UnitModel();
        $this->PenyimpananModel = new PenyimpananModel();
        $this->PemasokModel     = new PemasokModel();
        $this->PenjualanModel   = new PenjualanModel();
    }

    //Method Index
    public function index()
    {
       $data = [
            'obat'          => $this->ObatModel->allData(),
            'kategori'      => $this->KategoriModel->allData(),
            'unit'          => $this->UnitModel->allData(),
            'penyimpanan'   => $this->PenyimpananModel->allData(),
            'pemasok'       => $this->PemasokModel->allData(),
       ];
        return view('obat/v_obat',$data);
    }
    //

    //Method Detail
    public function detail($id_obat)
    {
        if (!$this->ObatModel->detailData($id_obat))
        {
            abort(404);
        }
       $data = [
            'obat' => $this->ObatModel->detailData($id_obat),
       ];
        return view('obat/v_detail_obat',$data);
    }
    //

    //Method Add
    public function add()
    {
        $data = [
             'obat'         => $this->ObatModel->allData(),
             'kode_obat'    => $this->ObatModel->getId(),
             'kategori'     => $this->KategoriModel->allData(),
             'unit'         => $this->UnitModel->allData(),
             'penyimpanan'  => $this->PenyimpananModel->allData(),
             'pemasok'      => $this->PemasokModel->allData(),
        ];
        return view('obat/v_add_obat',$data);
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'kode_obat'          =>'required|unique:tbl_obat,kode_obat|max:10',
            'nama_obat'          =>'required',
            'penyimpanan'        =>'required',
            'stok'               =>'required',
            'unit'               =>'required',
            'nama_kategori'      =>'required',
            'tgl_masuk'          =>'required',
            'kedaluwarsa'        =>'required',
            'deskripsi_obat'     =>'required',
            'harga_beli'         =>'required',
            'harga_jual'         =>'required',
            'nama_pemasok'       =>'required',
            'gambar'             =>'required|mimes:jpg,jpeg,png|max:1024',
        ],[
            'kode_obat.required'        =>'Wajib Diisi',
            'kode_obat.unique'          =>'kode_obat Ini Sudah Ada',
            'kode_obat.max'             =>'kode_obat Max 10 Kapenyimpananter',
            'nama_obat.required'        =>'Wajib Diisi',
            'penyimpanan.required'      =>'Wajib Diisi',
            'stok.required'             =>'Wajib Diisi',
            'unit.required'             =>'Wajib Diisi',
            'nama_kategori.required'    =>'Wajib Diisi',
            'tgl_masuk.required'        =>'Wajib Diisi',
            'kedaluwarsa.required'      =>'Wajib Diisi',
            'deskripsi_obat.required'   =>'Wajib Diisi',
            'harga_beli.required'       =>'Wajib Diisi',
            'harga_jual.required'       =>'Wajib Diisi',
            'nama_pemasok.required'     =>'Wajib Diisi',
            'gambar.required.required'  =>'Wajib Diisi',
        ]);
        $file       = Request()->gambar;
        $filename   = Request()->kode_obat.'.'.$file->extension();
        $file->move(public_path('gambar'),$filename);

        $data = [
            'kode_obat'         => Request()->kode_obat,
            'nama_obat'         => Request()->nama_obat,
            'penyimpanan'       => Request()->penyimpanan,
            'stok'              => Request()->stok,
            'unit'              => Request()->unit,
            'nama_kategori'     => Request()->nama_kategori,
            'tgl_masuk'         => Request()->tgl_masuk,
            'kedaluwarsa'       => Request()->kedaluwarsa,
            'deskripsi_obat'    => Request()->deskripsi_obat,
            'harga_beli'        => Request()->harga_beli,
            'harga_jual'        => Request()->harga_jual,
            'nama_pemasok'      => Request()->nama_pemasok,
            'gambar'            => $filename,
        ];
        $this->ObatModel->addData($data);
        return redirect()->route('obat')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_obat)
    {
        if (!$this->ObatModel->detailData($id_obat)){
            abort(404);
        }
        $data = [
        'obat'          => $this->ObatModel->detailData($id_obat),
        'kategori'      => $this->KategoriModel->allData(),
        'unit'          => $this->UnitModel->allData(),
        'penyimpanan'   => $this->PenyimpananModel->allData(),
        'pemasok'       => $this->PemasokModel->allData(),
   ];
        return view('obat/v_edit_obat',$data);
    }
    //

    //Method Update
    public function update($id_obat)
    {
        Request()->validate([
            'kode_obat'         =>'required|max:10',
            'nama_obat'         =>'required',
            'penyimpanan'       =>'required',
            'stok'              =>'required',
            'unit'              =>'required',
            'nama_kategori'     =>'required',
            'tgl_masuk'         =>'required',
            'kedaluwarsa'       =>'required',
            'deskripsi_obat'    =>'required',
            'harga_beli'        =>'required',
            'harga_jual'        =>'required',
            'nama_pemasok'      =>'required',
            'gambar'            =>'mimes:jpg,jpeg,png|max:1024',
        ],[
            'kode_obat.required'        =>'Wajib Diisi',
            'kode_obat.max'             =>'kode_obat Max 10 Kapenyimpananter',
            'nama_obat.required'        =>'Wajib Diisi',
            'penyimpanan.required'      =>'Wajib Diisi',
            'stok.required'             =>'Wajib Diisi',
            'unit.required'             =>'Wajib Diisi',
            'nama_kategori.required'    =>'Wajib Diisi',
            'tgl_masuk.required'        =>'Wajib Diisi',
            'kedaluwarsa.required'      =>'Wajib Diisi',
            'deskripsi_obat.required'   =>'Wajib Diisi',
            'harga_beli.required'       =>'Wajib Diisi',
            'harga_jual.required'       =>'Wajib Diisi',
            'nama_pemasok.required'     =>'Wajib Diisi',
        ]);
        if (Request()->gambar <> "")
        {
            $file       = Request()->gambar;
            $filename   = Request()->kode_obat.'.'.$file->extension();
            $file->move(public_path('gambar'),$filename);

            $data = [
                'kode_obat'         => Request()->kode_obat,
                'nama_obat'         => Request()->nama_obat,
                'penyimpanan'       => Request()->penyimpanan,
                'stok'              => Request()->stok,
                'unit'              => Request()->unit,
                'nama_kategori'     => Request()->nama_kategori,
                'tgl_masuk'         => Request()->tgl_masuk,
                'kedaluwarsa'       => Request()->kedaluwarsa,
                'gambar'            => $filename,
            ];
            $this->ObatModel->editData($id_obat,$data);
        }else
        {
            $data = [
                'kode_obat'        => Request()->kode_obat,
                'nama_obat'        => Request()->nama_obat,
                'penyimpanan'      => Request()->penyimpanan,
                'stok'             => Request()->stok,
                'unit'             => Request()->unit,
                'nama_kategori'    => Request()->nama_kategori,
                'tgl_masuk'        => Request()->tgl_masuk,
                'kedaluwarsa'      => Request()->kedaluwarsa,
                'deskripsi_obat'   => Request()->deskripsi_obat,
                'harga_beli'       => Request()->harga_beli,
                'harga_jual'       => Request()->harga_jual,
                'nama_pemasok'     => Request()->nama_pemasok,
            ];
            $this->ObatModel->editData($id_obat,$data);
        }
        return redirect()->route('obat')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_obat)
    {
        $obat = $this->ObatModel->detailData($id_obat);
        if ($obat->gambar <> "") {
            unlink(public_path('gambar').'/'.$obat->gambar);
        }
        $this->ObatModel->deleteData($id_obat);
        return redirect()->route('obat')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'obat' => $this->ObatModel->allData(),
       ];

        return view('obat/v_print_obat',$data);
    }
    //

    //Method Jual
    public function jual($id_obat)
    {
        if (!$this->ObatModel->detailData($id_obat)){
            abort(404);
        }
        $data = [
            'obat'      => $this->ObatModel->detailData($id_obat),
            'kategori'  => $this->KategoriModel->allData(),
            'unit'      => $this->UnitModel->allData(),
            'pemasok'   => $this->PemasokModel->allData(),
        ];
        return view('penjualan/v_jualan',$data);
    }
    //

    //Method Jual Online
    public function jual_online($id_obat)
    {
        if (!$this->ObatModel->detailData($id_obat))
        {
            abort(404);
        }
        $data = [
            'obat'      => $this->ObatModel->detailData($id_obat),
            'kategori'  => $this->KategoriModel->allData(),
            'unit'      => $this->UnitModel->allData(),
            'pemasok'   => $this->PemasokModel->allData(),
            ];
    return view('penjualan/v_jualan_online',$data);
    }
    //

    //Method Beli
    public function beli($id_obat)
    {
        if (!$this->ObatModel->detailData($id_obat))
        {
            abort(404);
        }
        $data = [
            'obat'      => $this->ObatModel->detailData($id_obat),
            'kategori'  => $this->KategoriModel->allData(),
            'unit'      => $this->UnitModel->allData(),
            'pemasok'   => $this->PemasokModel->allData(),
        ];
        return view('pembelian/v_belian',$data);
    }
    //
}
