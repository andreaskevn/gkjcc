<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Form;

class FormController extends Controller
{
    public function showForm(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Form::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $form = $query->paginate($limit);
        return view('form.tampilan', compact('form', 'search', 'limit', 'limitOptions'));
    }

    public function createForm()
    {
        $form = Form::all();
        return view('form.create', compact('form'));
    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'form_name' => 'required|max:255',
            'file' => 'required|mimes:docx,pdf|max:2048'
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/', $fileName);

        Form::create([
            'form_name' => $request->form_name,
            'form_file' => $fileName
        ]);

        return redirect()->route('form')->with('success', 'Form berhasil ditambahkan');
    }

    public function editForm($id)
    {
        $form = Form::find($id);
        return view('form.edit', compact('form'));
    }

    public function updateForm(Request $request, $id)
    {
        $request->validate([
            'form_name' => 'required|max:255',
            'file' => 'mimes:docx,pdf|max:2048'
        ]);

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
        $form->save();

        return redirect()->route('form')->with('success', 'Form berhasil diperbarui');
    }

    public function destroyForm($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect()->route('form')->with('success', 'Form berhasil dihapus');
    }

    public function showDetailForm($id)
    {
        $form = Form::find($id);
        return view('form.show', compact('form'));
    }
}
