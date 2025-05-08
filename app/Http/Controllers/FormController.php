<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Form;
use App\Models\FormCategories;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    public function showForm(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5);
        $limitOptions = [5, 10, 25, 50];
        $filterKategori = $request->input('filterKategori', '');

        $query = Form::query()->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('form_name', 'LIKE', "%{$search}%");
        }

        if ($filterKategori) {
            $query->where('form_category_id', $filterKategori);
        }

        $form = $query->paginate($limit);
        $categories = FormCategories::all();
        return view('form.tampilan', compact('form', 'search', 'limit', 'limitOptions', 'categories', 'filterKategori'));
    }

    public function createForm()
    {
        $form = Form::with('category')->get();
        $category = FormCategories::all();
        return view('form.create', compact('form', 'category'));
    }

    public function storeForm(Request $request)
    {
        $request->validate(
            [
                'form_name' => [
                    'required',
                    Rule::unique('forms')
                        ->where(function ($query) use ($request) {
                            return $query->where('form_category_id', $request->form_category_id);
                        })
                ],
                'file' => 'required|mimes:docx,pdf|max:10000',
                'form_category_id' => 'required|exists:form_categories,id'
            ],
            [
                'form_name.required' => 'Judul form harus diisi',
                'form_name.unique' => 'Judul form sudah ada',
                'form_name.max' => 'Judul form maksimal 255 karakter',
                'file.required' => 'File harus diisi',
                'file.mimes' => 'File harus berupa dokumen (DOCX, PDF)',
                'file.max' => 'Ukuran file maksimal 2MB',
                'form_category_id.required' => 'Kategori form harus dipilih'
            ]
        );

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/', $fileName);

        Form::create([
            'form_name' => $request->form_name,
            'form_file' => $fileName,
            'form_category_id' => $request->form_category_id
        ]);

        return redirect()->route('form')->with('success', 'Form berhasil ditambahkan');
    }

    public function editForm($id)
    {
        $form = Form::with('category')->findOrFail($id);
        $category = FormCategories::all();
        return view('form.edit', compact('form', 'category'));
    }

    public function updateForm(Request $request, $id)
    {
        $request->validate(
            [
                'form_name' => [
                    'required',
                    Rule::unique('forms')
                        ->where(function ($query) use ($request) {
                            return $query->where('form_category_id', $request->form_category_id);
                        })
                        ->ignore($id),
                ],
                'file' => 'mimes:docx,pdf|max:2048',
                'form_category_id' => 'required|exists:form_categories,id'
            ],
            [
                'form_name.required' => 'Judul form harus diisi',
                'form_name.unique' => 'Judul form sudah ada',
                'form_name.max' => 'Judul form maksimal 255 karakter',
                'file.mimes' => 'File harus berupa dokumen (DOCX, PDF)',
                'file.max' => 'Ukuran file maksimal 2MB',
                'form_category_id.required' => 'Kategori form harus dipilih'
            ]
        );

        $file = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/', $fileName);
        }

        $form = Form::find($id);
        $form->form_name = $request->form_name;
        if ($file) {
            $form->form_file = $fileName;
        }
        $form->form_category_id = $request->form_category_id;
        $form->save();

        return redirect()->route('form')->with('success', 'Form berhasil diperbarui');
    }

    public function destroyForm($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect()->route('form')->with('success', 'Form berhasil dihapus');
    }

    // public function showDetailForm($id)
    // {
    //     $form = Form::find($id);
    //     return view('form.show', compact('form'));
    // }
}
