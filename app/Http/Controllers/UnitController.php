<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitModel;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UnitModel = new UnitModel();
    }

    //Method Index
    public function index()
    {

       $data = [
            'unit' => $this->UnitModel->allData(),
       ];

        return view('unit/v_unit',$data);
    }
    //

    //Method Detail
    public function detail($id_unit)
    {
        if (!$this->UnitModel->detailData($id_unit))
        {
            abort(404);
        }
       $data = [
            'unit' => $this->UnitModel->detailData($id_unit),
       ];
        return view('unit/v_detail_unit',$data);
    }
    //

    //Method Add
    public function add()
    {
        return view('unit/v_add_unit');
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'nama_unit'                 => 'required',
        ],[
            'nama_unit.required'        => 'Wajib Diisi',
        ]);

        $data = [
            'nama_unit'                 => Request()->nama_unit,
        ];
        $this->UnitModel->addData($data);
        return redirect()->route('unit')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_unit)
    {
        if (!$this->UnitModel->detailData($id_unit))
        {
            abort(404);
        }
        $data = [
        'unit' => $this->UnitModel->detailData($id_unit),
        ];
        return view('unit/v_edit_unit',$data);
    }
    //

    //Method Update
    public function update($id_unit)
    {
        Request()->validate([
            'nama_unit'                 => 'required',
        ],[
            'nama_unit.required'        => 'Wajib Diisi',
        ]);
        $data = [
            'nama_unit'                 => Request()->nama_unit,
        ];
        $this->UnitModel->editData($id_unit,$data);
        return redirect()->route('unit')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_unit)
    {
        $unit = $this->UnitModel->detailData($id_unit);
        $this->UnitModel->deleteData($id_unit);
        return redirect()->route('unit')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {

       $data = [
            'unit' => $this->UnitModel->allData(),
       ];
        return view('unit/v_print_unit',$data);
    }
    //
}
