<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        $query->when($request->has('filter'), function($query) use ($request) {
            if ($request->filter != '') {
                if ($request->filter == 'in_stock') {
                    $query->where('stok', '>', 3);
                } elseif ($request->filter == 'out_of_stock') {
                    $query->where('stok','<', 3); 
                }
            }
        });
    
        if ($request->filled('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }
        if ($request->has('sort') && $request->has('order')) {
            if ($request->sort == 'nama_barang' && $request->order == 'asc') {
                $query->orderBy('nama_barang', 'asc');
            } elseif ($request->sort == 'nama_barang' && $request->order == 'desc') {
                $query->orderBy('nama_barang', 'desc');
            }
        }   

        $filteredData = $query->get(); 

        
         $data = collect();
        for ($i = 0; $i < 5; $i++) {
        foreach ($filteredData as $item) {
            $data->push($item);
        }
    }

         $perPage = 20; 
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginatedData = new LengthAwarePaginator($currentPageItems, $data->count(), $perPage);
        $paginatedData->setPath($request->url());
        $paginatedData->appends($request->all());

    
    return view('barangs.index', ['barangs' => $paginatedData]);        
    }

    public function create()
    {
        return view('barangs.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barangs',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto_barang' => 'required|mimes:jpg,png|max:100',
        ]);

        $fotoPath = $request->file('foto_barang')->store('public/foto_barang');

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'foto_barang' => basename($fotoPath),
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    public function edit(Request $request, Barang $barang)
    {
        // $barang = Barang::find($id);
        
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        
        $request->validate([
            'nama_barang' => 'required|unique:barangs,nama_barang,'.$barang->id,
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto_barang' => 'nullable|mimes:jpg,png|max:100',
        ]);

        if ($request->hasFile('foto_barang')) {
            $fotoPath = $request->file('foto_barang')->store('public/foto_barang');
            $barang->foto_barang = basename($fotoPath);
        }

        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;
        $barang->save();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }
}