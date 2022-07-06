@extends('part/template')
@section('judul_halaman','TAMBAH DATA UNIT')
@section('title','APOTIK ABC')

@section('konten')
    <form method="POST" action="/unit/insert" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_unit">Nama unit</label>
            <input type="text" name="nama_unit" class="form-control @error('nama_unit') is-invalid @enderror" id="nama_unit" placeholder="Nama Unit" value="{{old('nama_unit')}}">
            <div class="invalid-feedback">
                @error('nama_unit')
                    {{ $message}}
                @enderror
            </div>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pastikan Data Yang Anda Masukan Sudah Benar, Yakin Untuk Menambah Data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>

    </form>
    <div class="modal-footer">
        <a href="/unit" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
    </div>
@endsection
