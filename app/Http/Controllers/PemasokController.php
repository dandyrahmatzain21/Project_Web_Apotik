<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemasokModel;

class PemasokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->PemasokModel = new PemasokModel();
    }

    //Method Index
    public function index()
    {
       $data = [
            'pemasok' => $this->PemasokModel->allData(),
       ];
        return view('pemasok/v_pemasok',$data);
    }
    //

    //Method Detail
    public function detail($id_pemasok)
    {
        if (!$this->PemasokModel->detailData($id_pemasok)){
            abort(404);
        }
       $data = [
            'pemasok' => $this->PemasokModel->detailData($id_pemasok),
       ];
        return view('pemasok/v_detail_pemasok',$data);
    }
    //

    //Method Add
    public function add()
    {
        $data = [
             'pemasok'      => $this->PemasokModel->allData(),
             'kode_pemasok' => $this->PemasokModel->getId(),
        ];
        return view('pemasok/v_add_pemasok',$data);
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'kode_pemasok'          =>'required|unique:tbl_pemasok,kode_pemasok|max:10',
            'nama_pemasok'          =>'required',
            'alamat'                =>'required',
            'telepon'               =>'required',
        ],[
            'kode_pemasok.required' =>'Wajib Diisi',
            'kode_pemasok.unique'   =>'kode_pemasok Ini Sudah Ada',
            'kode_pemasok.max'      =>'kode_pemasok Max 10 Karakter',
            'nama_pemasok.required' =>'Wajib Diisi',
            'alamat.required'       =>'Wajib Diisi',
            'telepon.required'      =>'Wajib Diisi',
        ]);
        $data = [
            'kode_pemasok'          => Request()->kode_pemasok,
            'nama_pemasok'          => Request()->nama_pemasok,
            'alamat'                => Request()->alamat,
            'telepon'               => Request()->telepon,
        ];
        $this->PemasokModel->addData($data);
        return redirect()->route('pemasok')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_pemasok)
    {
        if (!$this->PemasokModel->detailData($id_pemasok)){
            abort(404);
        }
        $data = [
        'pemasok' => $this->PemasokModel->detailData($id_pemasok),
   ];
        return view('pemasok/v_edit_pemasok',$data);
    }
    //

    //Method Update
    public function update($id_pemasok)
    {
        Request()->validate([
            'kode_pemasok'          => 'required|max:10',
            'nama_pemasok'          => 'required',
            'alamat'                => 'required',
            'telepon'               => 'required',
        ],[
            'kode_pemasok.required' =>'Wajib Diisi',
            'kode_pemasok.max'      =>'kode_pemasok Max 10 Karakter',
            'nama_pemasok.required' => 'Wajib Diisi',
            'alamat.required'       => 'Wajib Diisi',
            'telepon.required'      => 'Wajib Diisi',
        ]);
        $data = [
            'kode_pemasok'          => Request()->kode_pemasok,
            'nama_pemasok'          => Request()->nama_pemasok,
            'alamat'                => Request()->alamat,
            'telepon'               => Request()->telepon,
        ];
        $this->PemasokModel->editData($id_pemasok,$data);
        return redirect()->route('pemasok')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_pemasok)
    {
        $this->PemasokModel->deleteData($id_pemasok);
        return redirect()->route('pemasok')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'pemasok' => $this->PemasokModel->allData(),
       ];

        return view('pemasok/v_print_pemasok',$data);
    }
    //
}
