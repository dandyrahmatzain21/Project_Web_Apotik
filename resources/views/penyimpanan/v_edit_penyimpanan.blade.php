@extends('part/template')
@section('judul_halaman','EDIT PENYIMPANAN')
@section('title','APOTIK ABC')

@section('konten')
    <form method="POST" action="/penyimpanan/update/{{$penyimpanan->id_penyimpanan}}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="nama_penyimpanan">Nama Penyimpanan</label>
            <input type="text" name="nama_penyimpanan" class="form-control @error('nama_penyimpanan') is-invalid @enderror" id="nama_penyimpanan" placeholder="Nama penyimpanan" value="{{$penyimpanan->nama_penyimpanan}}">
            <div class="invalid-feedback">
                @error('nama_penyimpanan')
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
            <a href="/penyimpanan" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                <span class="btn-inner--text">Kembali</span>
            </a>
            <button data-toggle="modal" data-target="#modal_edit" class="btn btn-icon btn-primary" type="button">
                <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
                <span class="btn-inner--text">Simpan</span>
            </button>
        </div>
@endsection
