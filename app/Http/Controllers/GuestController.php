<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Information,
    Komisi,
    Scholarship,
    WorshipSchedule,
    Warta,
    Bidang,
    Choir,
    Form,
    WeeklySchedule,
    Visitor
};

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $pengumuman = Information::with('user', 'category')->where('category_id', 1)
            ->latest()
            ->take(3)
            ->get();
        $berita = Information::with('user', 'category')->where('category_id', 2)
            ->latest()
            ->take(3)
            ->get();
        $lowongan = Information::with('user', 'category')->where('category_id', 3)
            ->latest()
            ->take(3)
            ->get();
        if (!Auth::check()) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'visited_at' => now(),
            ]);
        }
        logger('Pengunjung guest terdeteksi: ' . $request->ip());
        // dd('GuestController index dipanggil');
        // dd($request->ip());
        $beasiswa = Scholarship::with('users')->latest()->take(3)->get();
        $jadwalsepekan = WeeklySchedule::all();
        $worshipSchedules = WorshipSchedule::all()->groupBy('category_id');
        return view('home', compact('pengumuman', 'berita', 'worshipSchedules', 'lowongan', 'beasiswa', 'jadwalsepekan'));
    }

    public function showPengumuman()
    {
        $pengumuman = Information::with('user', 'category')
            ->where('category_id', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('guest.pengumuman.tampilan', compact('pengumuman'));
    }

    public function showPengumumanDetail($id)
    {
        $pengumuman = Information::with('user', 'category')
            ->where('category_id', 1)
            ->findOrFail($id);
        $rekomendasi = Information::latest()
            ->where('category_id', 1)
            ->where('id', '!=', $pengumuman->id)
            ->take(3)
            ->get();
        return view('guest.pengumuman.show', compact('pengumuman', 'rekomendasi'));
    }

    public function showBerita()
    {
        $berita = Information::with('user', 'category')
            ->where('category_id', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('guest.berita.tampilan', compact('berita'));
    }

    public function showBeritaDetail($id)
    {
        $berita = Information::with('user', 'category')
            ->where('category_id', 2)
            ->findOrFail($id);
        $rekomendasi = Information::latest()
            ->where('category_id', 2)
            ->where('id', '!=', $berita->id)
            ->take(3)
            ->get();
        return view('guest.berita.show', compact('berita', 'rekomendasi'));
    }

    public function showLowongan()
    {
        $lowongan = Information::with('user', 'category')
            ->where('category_id', 3)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('guest.info-lowongan.tampilan', compact('lowongan'));
    }

    public function showLowonganDetail($id)
    {
        $lowongan = Information::with('user', 'category')
            ->where('category_id', 3)
            ->findOrFail($id);
        $rekomendasi = Information::latest()
            ->where('category_id', 3)
            ->where('id', '!=', $lowongan->id)
            ->take(3)
            ->get();
        return view('guest.info-lowongan.show', compact('lowongan', 'rekomendasi'));
    }
    public function showBeasiswa()
    {
        $beasiswa = Scholarship::with('users')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('guest.beasiswa.tampilan', compact('beasiswa'));
    }

    public function showBeasiswaDetail($id)
    {
        $beasiswa = Scholarship::with('users')
            ->findOrFail($id);
        $rekomendasi = Scholarship::latest()
            ->where('id', '!=', $beasiswa->id)
            ->take(3)
            ->get();
        return view('guest.beasiswa.show', compact('beasiswa', 'rekomendasi'));
    }

    public function showWarta()
    {
        $wartas = Warta::latest()->paginate(5);
        return view('guest.warta.tampilan', [
            'wartas' => $wartas,
            'title' => 'Warta Gereja'
        ]);
    }

    public function showKomisi()
    {
        $bidang = Bidang::all();
        $keesaan = Komisi::with('users', 'bidangs')->where('bidang_id', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $pembinaan = Komisi::with('users', 'bidangs')->where('bidang_id', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        $penatalayanan = Komisi::with('users', 'bidangs')->where('bidang_id', 3)
            ->orderBy('created_at', 'desc')
            ->get();
        $kesaksian = Komisi::with('users', 'bidangs')->where('bidang_id', 4)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('guest.komisi.tampilan', compact('keesaan', 'pembinaan', 'penatalayanan', 'kesaksian', 'bidang'));
    }

    public function showKomisiDetail($id)
    {
        $komisi = Komisi::with('users', 'bidangs')
            ->findOrFail($id);
        return view('guest.komisi.show', compact('komisi'));
    }

    public function showPaduanSuara()
    {
        $paduan_suara = Choir::with('users')
            ->get();
        return view('guest.paduan-suara.tampilan', compact('paduan_suara'));
    }

    public function showPaduanSuaraDetail($id)
    {
        $paduan_suara = Choir::with('users')
            ->findOrFail($id);
        return view('guest.paduan-suara.show', compact('paduan_suara'));
    }

    public function showForm()
    {
        $forms = Form::with('category')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('guest.formsakramen.tampilan', compact('forms'));
    }
}
