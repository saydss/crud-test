@extends('layouts.layout')

@section('content')
    <div class="container pb-5">
        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5 pb-5 ">
            <div id="kt_app_content"
                class="app-content  rounded-3 bg-light mb-5 pb-5 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div
                    class="app-toolbar-wrapper d-flex flex-stack flex-wrap justify-content-between gap-4 w-100 pt-4 mb-1  border-bottom border-5">
                    <h1 class="pt-3">Tambah Barang</h1>
                    <div class="d-flex align-items-end justify-content-end">
                        <a href="{{ route('barangs.index') }}"
                            class="text-white text-decoration-none btn rounded btn-primary d-flex justify-content-end align-items-center  mb-2"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">Kembali</a>
                        <div class="modal fade rounded" id="staticBackdrop" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">

                                    <div class="modal-body d-flex justify-content-center align-items-center pt-4 pb-1">
                                        <h2 class=" text-center" style="color: #16243D; font-size: 20px; font-weight:700">
                                            keluar dari tambah data?
                                            <p class="mb-0 mt-0 text-center "
                                                style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                dimasukkan
                                                belum tersimpan </p>
                                        </h2>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <a href="{{ route('barangs.index') }}" type="button"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                            style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                        <button type="button"
                                            class="btn btn-secondary d-flex align-items-center justify-content-center rounded-1"
                                            data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-4 ">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                            value="{{ old('nama_barang') }}" required>
                        @error('nama_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" id="harga_beli"
                            value="{{ old('harga_beli') }}" required>
                        @error('harga_beli')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" name="harga_jual" class="form-control" id="harga_jual"
                            value="{{ old('harga_jual') }}" required>
                        @error('harga_jual')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" id="stok" value="{{ old('stok') }}"
                            required>
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="foto_barang" class="form-label">Foto Barang</label>
                        <input type="file" name="foto_barang" class="form-control" id="foto_barang" accept=".jpg,.png"
                            required>
                        @error('foto_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
