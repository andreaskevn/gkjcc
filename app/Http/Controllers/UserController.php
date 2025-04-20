<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Role
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = User::with('role');

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $users = $query->paginate($limit);
        return view('pengguna.tampilan', compact('users', 'search', 'limit', 'limitOptions'));
    }

    public function create()
    {
        $pengguna = User::all();
        $roles = Role::all();
        return view('pengguna.create', compact('pengguna', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|unique:users,email,users,id',
                'role_id' => 'required|exists:roles,id'
            ],
            [
                'user.required' => 'Nama pengguna harus diisi',
                'user.max' => 'Nama pengguna maksimal 50 karakter',

                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email sudah terdaftar',

                'role_id.required' => 'Role harus dipilih'
            ]
        );
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make('password123')
        ]);
        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        $roles = Role::all();
        return view('pengguna.edit', compact('pengguna', 'roles'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|unique:users,email,' . $request->id,
                'role_id' => 'required|exists:roles,id'
            ],
            [
                'name.required' => 'Nama pengguna harus diisi',
                'name.max' => 'Nama pengguna maksimal 50 karakter',
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email sudah terdaftar',
                'role_id.required' => 'Role harus dipilih'
            ]
        );
        $pengguna = User::findOrFail($request->id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->role_id = $request->role_id;
        $pengguna->save();
        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();
        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
