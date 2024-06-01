@extends('layouts.layout')

@section('content')
    <div class="container pb-5">
        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5 pb-5 ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light mb-5 pb-5 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div
                    class="app-toolbar-wrapper d-flex flex-stack flex-wrap justify-content-between gap-4 w-100 pt-4 mb-1  border-bottom border-5">
                    <h1 class="mt-4 mb-0 pb-1">Daftar Barang</h1>

                    <div class="d-flex align-items-end pt-2">
                        <form action="{{ route('barangs.index') }}" method="GET" class="mb-2">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama barang"
                                    value="{{ request()->search }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-end justify-content-end">
                        <a href="{{ route('barangs.tambah') }}"
                            class="text-white text-decoration-none btn rounded  d-flex justify-content-end align-items-center  mb-2"
                            style="background-color: #4B696E">Tambah
                            Barang</a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>

                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Foto Barang</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>

                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->harga_beli }}</td>
                                <td>{{ $barang->harga_jual }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td><img src="{{ asset('storage/foto_barang/' . $barang->foto_barang) }}" width="100"
                                        height="100" style="object-fit: cover;"></td>
                                <td>
                                    <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">Edit</a>


                                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')"
                                            style="background-color: #DC3545">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $barangs->links('pagination::customb5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
