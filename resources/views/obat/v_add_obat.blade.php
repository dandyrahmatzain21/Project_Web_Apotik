@extends('part/template')
@section('judul_halaman','TAMBAH DATA OBAT')
@section('title','APOTIK ABC')

@section('konten')
    <form method="POST" action="/obat/insert" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="kode_obat">Kode Obat</label>
            <input type="text" name="kode_obat" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" placeholder="Kode Obat" value="{{$kode_obat}}" readonly>
            <div class="invalid-feedback">
                @error('kode_obat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" placeholder="Nama Obat" value="{{old('nama_obat')}}">
            <div class="invalid-feedback">
                @error('nama_obat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="penyimpanan">Penyimpanan</label>
            <select name="penyimpanan" id="penyimpanan" class="form-control @error('penyimpanan') is-invalid @enderror" value="{{old('penyimpanan')}}">
                <option value="">Pilih Penyimpanan</option>
                @foreach ($rak as $data)
                    <option value="{{$data->nama_rak}}">{{$data->nama_rak}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('penyimpanan')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok" value="{{old('stok')}}">
            <div class="invalid-feedback">
                @error('stok')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="unit">Unit</label>
            <select name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror" value="{{old('unit')}}">
                <option value="">Pilih Unit</option>
                @foreach ($unit as $data)
                    <option value="{{$data->nama_unit}}">{{$data->nama_unit}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('unit')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <select name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{old('nama_kategori')}}">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $data)
                    <option value="{{$data->nama_kategori}}">{{$data->nama_kategori}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('nama_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk</label>
            <input type="date" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" placeholder="Tanggal Masuk" value="{{old('tgl_masuk')}}">
            <div class="invalid-feedback">
                @error('tgl_masuk')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="kedaluwarsa">Kedaluwarsa</label>
            <input type="date" name="kedaluwarsa" class="form-control @error('kedaluwarsa') is-invalid @enderror" id="kedaluwarsa" placeholder="Kedaluwarsa" value="{{old('kedaluwarsa')}}">
            <div class="invalid-feedback">
                @error('kedaluwarsa')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="deskripsi_obat">Deskripsi Obat</label>
            <input type="text" name="deskripsi_obat" class="form-control @error('deskripsi_obat') is-invalid @enderror" id="deskripsi_obat" placeholder="Deskripsi Obat" value="{{old('deskripsi_obat')}}">
            <div class="invalid-feedback">
                @error('deskripsi_obat')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Harga Beli" value="{{old('harga_beli')}}">
            <div class="invalid-feedback">
                @error('harga_beli')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Harga Jual" value="{{old('harga_jual')}}">
            <div class="invalid-feedback">
                @error('harga_jual')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nama_pemasok">Nama Pemasok</label>
            <select name="nama_pemasok" id="nama_pemasok" class="form-control @error('nama_pemasok') is-invalid @enderror" value="{{old('nama_pemasok')}}">
                <option value="">Pilih Pemasok</option>
                @foreach ($pemasok as $data)
                    <option value="{{$data->nama_pemasok}}">{{$data->nama_pemasok}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('nama_pemasok')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" placeholder="Gambar" value="{{old('gambar')}}">
            <div class="invalid-feedback">
                @error('gambar')
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
        <a href="/obat" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
    </div>
@endsection
