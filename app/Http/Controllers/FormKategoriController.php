<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormCategories;
use Illuminate\Http\Request;

class FormKategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5);
        $limitOptions = [5, 10, 25, 50];

        $query = FormCategories::query();

        if ($search) {
            $query->where('form_category_name', 'LIKE', "%{$search}%");
        }

        $category = $query->paginate($limit);
        return view('kategori-form.tampilan', compact('category', 'search', 'limit', 'limitOptions'));
    }

    public function create()
    {
        return view('kategori-form.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'form_category_name' => 'required',
        ]);

        FormCategories::create([
            'form_category_name' => $request->form_category_name,
        ]);

        return redirect()->route('kategori-form')->with('success', 'Kategori Form berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = FormCategories::findOrFail($id);
        return view('kategori-form.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'form_category_name' => 'required',
        ]);

        $category = FormCategories::findOrFail($id);
        $category->form_category_name = $request->form_category_name;
        $category->save();

        return redirect()->route('kategori-form')->with('success', 'Kategori Form berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = FormCategories::findOrFail($id);
        $category->delete();
        return redirect()->route('kategori-form')->with('success', 'Kategori Form berhasil dihapus.');
    }
}
