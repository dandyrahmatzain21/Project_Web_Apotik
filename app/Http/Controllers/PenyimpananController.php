<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyimpananModel;

class PenyimpananController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->PenyimpananModel = new PenyimpananModel();
    }

    //Method Index
    public function index()
    {

       $data = [
            'penyimpanan' => $this->PenyimpananModel->allData(),
       ];
        return view('penyimpanan/v_penyimpanan',$data);
    }
    //

    //Method Detail
    public function detail($id_penyimpanan)
    {
        if (!$this->PenyimpananModel->detailData($id_penyimpanan))
        {
            abort(404);
        }
       $data = [
            'penyimpanan' => $this->PenyimpananModel->detailData($id_penyimpanan),
       ];
        return view('penyimpanan/v_detail_penyimpanan',$data);
    }
    //

    //Method Add
    public function add()
    {
        return view('penyimpanan/v_add_penyimpanan');
    }

    public function insert()
    {
        Request()->validate([
            'nama_penyimpanan'                  => 'required',
        ],[
            'nama_penyimpanan.required'         => 'Wajib Diisi',
        ]);

        $data = [
            'nama_penyimpanan'                  => Request()->nama_penyimpanan,
        ];
        $this->PenyimpananModel->addData($data);
        return redirect()->route('penyimpanan')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_penyimpanan)
    {
        if (!$this->PenyimpananModel->detailData($id_penyimpanan))
        {
            abort(404);
        }
        $data = [
        'penyimpanan' => $this->PenyimpananModel->detailData($id_penyimpanan),
        ];
        return view('penyimpanan/v_edit_penyimpanan',$data);
    }
    //

    //Method Update
    public function update($id_penyimpanan)
    {
        Request()->validate([
            'nama_penyimpanan'                  => 'required',
        ],[
            'nama_penyimpanan.required'         => 'Wajib Diisi',
        ]);
        $data = [
            'nama_penyimpanan'                  => Request()->nama_penyimpanan,
        ];
        $this->PenyimpananModel->editData($id_penyimpanan,$data);
        return redirect()->route('penyimpanan')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_penyimpanan)
    {
        $penyimpanan = $this->PenyimpananModel->detailData($id_penyimpanan);
        $this->PenyimpananModel->deleteData($id_penyimpanan);
        return redirect()->route('penyimpanan')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'penyimpanan' => $this->PenyimpananModel->allData(),
       ];

        return view('penyimpanan/v_print_penyimpanan',$data);
    }
    //
}
