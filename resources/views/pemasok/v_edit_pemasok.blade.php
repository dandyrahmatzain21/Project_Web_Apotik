@extends('part/template')
@section('judul_halaman','EDIT PEMASOK')
@section('title','APOTIK ABC')

@section('konten')
    <form method="POST" action="/pemasok/update/{{$pemasok->id_pemasok}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="kode_pemasok">Kode Pemasok</label>
            <input type="text" name="kode_pemasok" class="form-control @error('kode_pemasok') is-invalid @enderror" id="kode_pemasok" placeholder="Kode Pemasok" value="{{$pemasok->kode_pemasok}}" readonly>
            <div class="invalid-feedback">
            @error('kode_pemasok')
                {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nama_pemasok">Nama pemasok</label>
            <input type="text" name="nama_pemasok" class="form-control @error('nama_pemasok') is-invalid @enderror" id="nama_pemasok" placeholder="Nama Pemasok" value="{{$pemasok->nama_pemasok}}">
            <div class="invalid-feedback">
                @error('nama_pemasok')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{$pemasok->alamat}}">
            <div class="invalid-feedback">
                @error('alamat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Telepon" value="{{$pemasok->telepon}}">
            <div class="invalid-feedback">
                @error('telepon')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Edit Sudah Benar, Yakin Untuk Megubah Data ?</p>
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
        <a href="/pemasok" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <button data-toggle="modal" data-target="#modal_edit" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
    </div>
@endsection
