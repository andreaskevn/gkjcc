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

class JadwalIbadahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];
        $categoryFilter = $request->input('category_id');
        $pastorFilter = $request->input('pastor_id');

        $query = WorshipSchedule::with('pastor', 'category');

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

    public function create(){
        $pastor = Pastor::all();
        $category = WorshipScheduleCategory::all();
        return view('jadwalibadah.create', compact('pastor', 'category'));
    }

    public function store(Request $request){
        $request->validate([
            'worship_schedule_name' => 'required',
            'worship_schedule_hour' => 'required',
            'worship_schedule_day' => 'required',
            'worship_schedule_language' => 'required',
            'category_id' => 'required|exists:worship_schedule_categories,id',
            'pastor_id' => 'required|exists:pastors,id',
        ]);

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

    public function edit($id){
        $jadwalibadah = WorshipSchedule::findOrFail($id);
        $pastor = Pastor::all();
        $category = WorshipScheduleCategory::all();
        return view('jadwalibadah.edit', compact('category', 'pastor', 'jadwalibadah'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'worship_schedule_name' => 'required',
            'worship_schedule_hour' => 'required',
            'worship_schedule_day' => 'required',
            'worship_schedule_language' => 'required',
            'category_id' => 'required|exists:worship_schedule_categories,id',
            'pastor_id' => 'required|exists:pastors,id',
        ]);

        $jadwalibadah = WorshipSchedule::findOrFail($id);
        $jadwalibadah->worship_schedule_name = $request->worship_schedule_name;
        $jadwalibadah->worship_schedule_hour = $request->worship_schedule_hour;
        $jadwalibadah->worship_schedule_day = $request->worship_schedule_day;
        $jadwalibadah->worship_schedule_language = $request->worship_schedule_language;
        $jadwalibadah->category_id = $request->category_id;
        $jadwalibadah->pastor_id = $request->pastor_id;
        $jadwalibadah->save();

        return redirect()->route('jadwalibadah')->with('success', 'Kategori Jadwal Ibadah berhasil diperbarui.');
    }

    public function destroy($id){
        $jadwalibadah = WorshipSchedule::findOrFail($id);
        $jadwalibadah->delete();
        return redirect()->route('jadwalibadah')->with('success', 'Jadwal Ibadah berhasil dihapus.');
    }
}
