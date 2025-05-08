<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    WorshipScheduleCategory,
    WorshipSchedule,
    Pastor
};
use Database\Seeders\WorshipScheduleSeeder;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Validation\Rule;

class JadwalIbadahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5);
        $limitOptions = [5, 10, 25, 50];
        $categoryFilter = $request->input('category_id');
        $pastorFilter = $request->input('pastor_id');

        $query = WorshipSchedule::with('pastor', 'category')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('worship_schedule_name', 'LIKE', "%{$search}%");
        }

        if ($categoryFilter) {
            $query->where('category_id', $categoryFilter);
        }

        if ($pastorFilter) {
            $query->where('pastor_id', $pastorFilter);
        }

        $categories = WorshipScheduleCategory::all();
        $pastors = Pastor::all();
        $jadwalibadah = $query->paginate($limit);
        return view('jadwalibadah.tampilan', compact('jadwalibadah', 'search', 'limit', 'limitOptions', 'categories', 'pastors', 'categoryFilter', 'pastorFilter'));
    }

    public function create()
    {
        $pastor = Pastor::all();
        $category = WorshipScheduleCategory::all();
        return view('jadwalibadah.create', compact('pastor', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'worship_schedule_name' => [
                    'required',
                    Rule::unique('worship_schedules')->where(function ($query) use ($request) {
                        return $query->where('category_id', $request->category_id);
                    }),
                ],
                'worship_schedule_hour' => 'required',
                'worship_schedule_day' => 'required',
                'worship_schedule_language' => 'required',
                'category_id' => 'required|exists:worship_schedule_categories,id',
                'pastor_id' => 'required|exists:pastors,id',
            ],
            [
                'category_id.exists' => 'Kategori Jadwal Ibadah tidak ditemukan.',
                'pastor_id.exists' => 'Pastor tidak ditemukan.',
                'worship_schedule_name.required' => 'Nama Jadwal Ibadah harus diisi.',
                'worship_schedule_name.unique' => 'Nama jadwal ini sudah ada dalam kategori tersebut.',
                'worship_schedule_hour.required' => 'Waktu Jadwal Ibadah harus diisi.',
                'worship_schedule_day.required' => 'Hari Jadwal Ibadah harus diisi.',
                'worship_schedule_language.required' => 'Bahasa Jadwal Ibadah harus diisi.',
            ]
        );

        WorshipSchedule::create([
            'worship_schedule_name' => $request->worship_schedule_name,
            'worship_schedule_hour' => $request->worship_schedule_hour,
            'worship_schedule_day' => $request->worship_schedule_day,
            'worship_schedule_language' => $request->worship_schedule_language,
            'category_id' => $request->category_id,
            'pastor_id' => $request->pastor_id
        ]);

        return redirect()->route('jadwalibadah')->with('success', 'Kategori Jadwal Ibadah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwalibadah = WorshipSchedule::findOrFail($id);
        $pastor = Pastor::all();
        $category = WorshipScheduleCategory::all();
        return view('jadwalibadah.edit', compact('category', 'pastor', 'jadwalibadah'));
    }

    public function update(Request $request, $id)
    {
        $jadwalibadah = WorshipSchedule::findOrFail($id);
        $request->validate(
            [
                'worship_schedule_name' => [
                    'required',
                    Rule::unique('worship_schedules')
                        ->where(function ($query) use ($request) {
                            return $query->where('category_id', $request->category_id);
                        })
                        ->ignore($id),
                ],
                'worship_schedule_hour' => 'required',
                'worship_schedule_day' => 'required',
                'worship_schedule_language' => 'required',
                'category_id' => 'required|exists:worship_schedule_categories,id',
                'pastor_id' => 'required|exists:pastors,id',
            ],
            [
                'category_id.exists' => 'Kategori Jadwal Ibadah tidak ditemukan.',
                'pastor_id.exists' => 'Pastor tidak ditemukan.',
                'worship_schedule_name.required' => 'Nama Jadwal Ibadah harus diisi.',
                'worship_schedule_name.unique' => 'Nama jadwal ini sudah ada dalam kategori tersebut.',
                'worship_schedule_hour.required' => 'Waktu Jadwal Ibadah harus diisi.',
                'worship_schedule_day.required' => 'Hari Jadwal Ibadah harus diisi.',
                'worship_schedule_language.required' => 'Bahasa Jadwal Ibadah harus diisi.',
            ]
        );

        $jadwalibadah->worship_schedule_name = $request->worship_schedule_name;
        $jadwalibadah->worship_schedule_hour = $request->worship_schedule_hour;
        $jadwalibadah->worship_schedule_day = $request->worship_schedule_day;
        $jadwalibadah->worship_schedule_language = $request->worship_schedule_language;
        $jadwalibadah->category_id = $request->category_id;
        $jadwalibadah->pastor_id = $request->pastor_id;
        $jadwalibadah->save();

        return redirect()->route('jadwalibadah')->with('success', 'Kategori Jadwal Ibadah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwalibadah = WorshipSchedule::findOrFail($id);
        $jadwalibadah->delete();
        return redirect()->route('jadwalibadah')->with('success', 'Jadwal Ibadah berhasil dihapus.');
    }
}
