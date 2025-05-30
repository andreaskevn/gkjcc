<?php

namespace App\Http\Controllers;

use App\Models\WorshipSchedule;
use App\Models\WorshipScheduleCategory;
use Illuminate\Http\Request;

class KategoriJadwalIbadahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = WorshipScheduleCategory::query();

        if ($search) {
            $query->where('worship_schedule_category_name', 'LIKE', "%{$search}%");
        }

        $category = $query->paginate($limit);
        return view('kategori-jadwalibadah.tampilan', compact('category', 'search', 'limit', 'limitOptions'));
    }

    public function create()
    {
        return view('kategori-jadwalibadah.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'worship_schedule_category_name' => 'required',
            ],
            [
                'worship_schedule_category_name.required' => 'Kategori Jadwal Ibadah harus diisi.',
            ]
        );

        WorshipScheduleCategory::create([
            'worship_schedule_category_name' => $request->worship_schedule_category_name,
        ]);

        return redirect()->route('kategori-jadwalibadah')->with('success', 'Kategori Jadwal Ibadah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = WorshipScheduleCategory::findOrFail($id);
        return view('kategori-jadwalibadah.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'worship_schedule_category_name' => 'required',
            ],
            [
                'worship_schedule_category_name.required' => 'Kategori Jadwal Ibadah harus diisi.',
            ]
        );

        $category = WorshipScheduleCategory::findOrFail($id);
        $category->worship_schedule_category_name = $request->worship_schedule_category_name;
        $category->save();

        return redirect()->route('kategori-jadwalibadah')->with('success', 'Kategori Jadwal Ibadah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = WorshipScheduleCategory::findOrFail($id);
        if (WorshipSchedule::where('category_id', $category->id)->exists()) {
            return redirect()->route('kategori-jadwalibadah')->with('error', 'Tidak bisa menghapus kategori ini karena ada jadwal ibadah yang terhubung.');
        }
        $category->delete();
        return redirect()->route('kategori-jadwalibadah')->with('success', 'Kategori Jadwal Ibadah berhasil dihapus.');
    }
}
