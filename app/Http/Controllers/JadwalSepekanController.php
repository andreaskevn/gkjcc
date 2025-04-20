<?php

namespace App\Http\Controllers;

use App\Models\WeeklySchedule;
use Illuminate\Http\Request;

class JadwalSepekanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];
        $dayFilter = $request->input('weekly_schedule_day');

        $query = WeeklySchedule::query();

        if ($search) {
            $query->where('weekly_schedule_name', 'LIKE', "%{$search}%");
        }

        if ($dayFilter) {
            $query->where('weekly_schedule_day', $dayFilter);
        }

        $jadwalsepekan = $query->paginate($limit);
        return view('jadwalsepekan.tampilan', compact('jadwalsepekan', 'search', 'limit', 'limitOptions', 'dayFilter'));
    }

    public function create(){
        $jadwalsepekan = WeeklySchedule::all();
        return view('jadwalsepekan.create', compact('jadwalsepekan'));
    }

    public function store(Request $request){
        $request->validate([
            'weekly_schedule_name' => 'required',
            'weekly_schedule_hour' => 'required',
            'weekly_schedule_day' => 'required',
        ]);

        WeeklySchedule::create([
            'weekly_schedule_name' => $request->weekly_schedule_name,
            'weekly_schedule_hour' => $request->weekly_schedule_hour,
            'weekly_schedule_day' => $request->weekly_schedule_day,
        ]);

        return redirect()->route('jadwalsepekan')->with('success', 'Jadwal Sepekan berhasil ditambahkan.');
    }

    public function edit($id){
        $jadwalsepekan = WeeklySchedule::findOrFail($id);
        return view('jadwalsepekan.edit', compact('jadwalsepekan'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'weekly_schedule_name' => 'required',
            'weekly_schedule_hour' => 'required',
            'weekly_schedule_day' => 'required',
        ]);

        $jadwalsepekan = WeeklySchedule::findOrFail($id);
        $jadwalsepekan->weekly_schedule_name = $request->weekly_schedule_name;
        $jadwalsepekan->weekly_schedule_hour = $request->weekly_schedule_hour;
        $jadwalsepekan->weekly_schedule_day = $request->weekly_schedule_day;
        $jadwalsepekan->save();

        return redirect()->route('jadwalsepekan')->with('success', 'Jadwal Sepekan berhasil diperbarui.');
    }

    public function destroy($id){
        $jadwalsepekan = WeeklySchedule::findOrFail($id);
        $jadwalsepekan->delete();
        return redirect()->route('jadwalsepekan')->with('success', 'Jadwal Sepekan berhasil dihapus.');
    }
}
