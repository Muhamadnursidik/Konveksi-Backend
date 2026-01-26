<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPakaian;
use Illuminate\Http\Request;

class ModelPakaianController extends Controller
{
    public function index()
    {
        return view('admin.model_pakaian.index', [
            'data' => ModelPakaian::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.model_pakaian.create');
    }

    public function store(Request $request)
    {
        $kebutuhan = str_replace(',', '.', $request->kebutuhan_bahan);

        $request->merge([
            'kebutuhan_bahan' => $kebutuhan,
        ]);

        $request->validate([
            'nama_model'      => 'required',
            'kategori'        => 'required',
            'ukuran'          => 'required',
            'warna'           => 'required',
            'kebutuhan_bahan' => 'required|numeric',
        ]);

        ModelPakaian::create([
            'nama_model'      => $request->nama_model,
            'kategori'        => $request->kategori,
            'ukuran'          => $request->ukuran,
            'warna'           => $request->warna,
            'kebutuhan_bahan' => $request->kebutuhan_bahan,
        ]);

        return redirect()
            ->route('admin.model-pakaian.index')
            ->with('success', 'Model pakaian berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.model_pakaian.edit', [
            'item' => ModelPakaian::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_model'      => 'required',
            'kategori'        => 'required',
            'ukuran'          => 'required',
            'warna'           => 'required',
            'kebutuhan_bahan' => 'required|numeric',
        ]);

        ModelPakaian::findOrFail($id)->update($request->all());

        return redirect()
            ->route('admin.model-pakaian.index')
            ->with('success', 'Model pakaian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $model = ModelPakaian::findOrFail($id);

        if ($model->jobProduksi()->exists()) {
            return back()->with('errors', 'Model pakaian tidak bisa dihapus karena masih digunakan di job produksi');
        }

        ModelPakaian::destroy($id);

        return redirect()
            ->route('admin.model-pakaian.index')
            ->with('success', 'Model pakaian berhasil dihapus');
    }
}
