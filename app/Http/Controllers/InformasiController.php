<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Information, Scholarship, Warta};
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class InformasiController extends Controller
{
    public function showPengumuman(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Information::with('user', 'category')
            ->where('category_id', 1)
            ->orderBy('created_at', 'desc');
        if ($search) {
            $query->where('information_title', 'LIKE', "%{$search}%");
        }

        $pengumuman = $query->paginate($limit);
        return view('pengumuman.tampilan', compact('pengumuman', 'search', 'limit', 'limitOptions'));
    }

    public function createPengumuman()
    {
        $pengumuman = Information::with('user', 'category')->where('category_id', 1)->get();
        return view('pengumuman.create', compact('pengumuman'));
    }

    public function storePengumuman(Request $request)
    {
        $request->validate(
            [
                'information_title' => 'required|max:255',
                'information_description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5500'
            ],
            [
                'information_title.required' => 'Judul pengumuman harus diisi',
                'information_description.required' => 'Deskripsi pengumuman harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB'
            ]
        );

        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
        }

        Information::create([
            'information_title' => $request->information_title,
            'information_description' => $request->information_description,
            'information_head_cover' => $filename,
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function editPengumuman($id)
    {
        $pengumuman = Information::with('user', 'category')->where('category_id', 1)->findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function updatePengumuman(Request $request, $id)
    {
        $request->validate(
            [
                'information_title' => 'required|max:255',
                'information_description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5500'
            ],
            [
                'information_title.required' => 'Judul pengumuman harus diisi',
                'information_description.required' => 'Deskripsi pengumuman harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB'
            ]
        );

        $pengumuman = Information::with('user', 'category')->where('category_id', 1)->findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file);
            $image->save(public_path('img/' . $filename));
            $pengumuman->information_head_cover = $filename;
        }

        $pengumuman->information_title = $request->information_title;
        $pengumuman->information_description = $request->information_description;
        $pengumuman->save();
        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroyPengumuman($id)
    {
        $pengumuman = Information::with('user', 'category')->where('category_id', 1)->findOrFail($id);
        $pengumuman->delete();
        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function showDetailPengumuman($id)
    {
        $pengumuman = Information::with('user', 'category')->where('category_id', 1)->findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }


    public function showBerita(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Information::with('user', 'category')
            ->where('category_id', 2)
            ->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('information_title', 'LIKE', "%{$search}%");
        }

        $berita = $query->paginate($limit);
        return view('berita.tampilan', compact('berita', 'search', 'limit', 'limitOptions'));
    }

    public function createBerita()
    {
        $berita = Information::with('user', 'category')->where('category_id', 2)->get();
        return view('berita.create', compact('berita'));
    }

    public function storeBerita(Request $request)
    {
        $request->validate(
            [
                'information_title' => 'required|max:255',
                'information_description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5500'
            ],
            [
                'information_title.required' => 'Judul berita harus diisi',
                'information_description.required' => 'Deskripsi berita harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB'
            ]
        );

        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
        }

        Information::create([
            'information_title' => $request->information_title,
            'information_description' => $request->information_description,
            'information_head_cover' => $filename,
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function editBerita($id)
    {
        $berita = Information::with('user', 'category')->where('category_id', 2)->findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function updateBerita(Request $request, $id)
    {
        $request->validate(
            [
                'information_title' => 'required|max:255',
                'information_description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'information_title.required' => 'Judul berita harus diisi',
                'information_description.required' => 'Deskripsi berita harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB'
            ]
        );

        $berita = Information::with('user', 'category')->where('category_id', 2)->findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
            $berita->information_head_cover = $filename;
        }

        $berita->information_title = $request->information_title;
        $berita->information_description = $request->information_description;
        $berita->save();
        return redirect()->route('berita')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroyBerita($id)
    {
        $berita = Information::with('user', 'category')->where('category_id', 2)->findOrFail($id);
        $berita->delete();
        return redirect()->route('berita')->with('success', 'Berita berhasil dihapus.');
    }

    public function showDetailBerita($id)
    {
        $berita = Information::with('user', 'category')->where('category_id', 2)->findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function showInfoLowongan(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Information::with('user', 'category')
            ->where('category_id', 3)
            ->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('information_title', 'LIKE', "%{$search}%");
        }

        $lowongan = $query->paginate($limit);
        return view('info-lowongan.tampilan', compact('lowongan', 'search', 'limit', 'limitOptions'));
    }

    public function createLowongan()
    {
        $lowongan = Information::with('user', 'category')->where('category_id', 3)->get();
        return view('info-lowongan.create', compact('lowongan'));
    }

    public function storeLowongan(Request $request)
    {
        $request->validate(
            [
                'information_title' => 'required|max:255',
                'information_description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5500'
            ],
            [
                'information_title.required' => 'Judul berita harus diisi',
                'information_description.required' => 'Deskripsi berita harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB'
            ]
        );

        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
        }

        Information::create([
            'information_title' => $request->information_title,
            'information_description' => $request->information_description,
            'information_head_cover' => $filename,
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('info-lowongan')->with('success', 'Berita berhasil ditambahkan');
    }

    public function editLowongan($id)
    {
        $lowongan = Information::with('user', 'category')->where('category_id', 3)->findOrFail($id);
        return view('info-lowongan.edit', compact('lowongan'));
    }

    public function updateLowongan(Request $request, $id)
    {
        $request->validate(
            [
                'information_title' => 'required|max:255',
                'information_description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5500'
            ],
            [
                'information_title.required' => 'Judul berita harus diisi',
                'information_description.required' => 'Deskripsi berita harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB'
            ]
        );

        $lowongan = Information::with('user', 'category')->where('category_id', 3)->findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
            $lowongan->information_head_cover = $filename;
        }

        $lowongan->information_title = $request->information_title;
        $lowongan->information_description = $request->information_description;
        $lowongan->save();
        return redirect()->route('info-lowongan')->with('success', 'Info Lowongan berhasil diperbarui');
    }

    public function destroyLowongan($id)
    {
        $lowongan = Information::with('user', 'category')->where('category_id', 3)->findOrFail($id);
        $lowongan->delete();
        return redirect()->route('info-lowongan')->with('success', 'Info Lowongan berhasil dihapus.');
    }

    public function showDetailLowongan($id)
    {
        $lowongan = Information::with('user', 'category')->where('category_id', 3)->findOrFail($id);
        return view('info-lowongan.show', compact('lowongan'));
    }

    public function showScholarship(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Scholarship::with('users')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('scholarship_title', 'LIKE', "%{$search}%");
        }

        $scholarship = $query->paginate($limit);
        return view('scholarship.tampilan', compact('scholarship', 'search', 'limit', 'limitOptions'));
    }

    public function createScholarship()
    {
        $scholarship = Scholarship::with('users');
        return view('scholarship.create', compact('scholarship'));
    }

    public function storeScholarship(Request $request)
    {
        $request->validate(
            [
                'scholarship_title' => 'required|max:255',
                'scholarship_description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5500',
                'scholarship_phone' => 'required|numeric|digits_between:10,15|unique:scholarships',
            ],
            [
                'scholarship_title.required' => 'Judul beasiswa harus diisi',
                'scholarship_description.required' => 'Deskripsi beasiswa harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB',
                'scholarship_phone.required' => 'Nomor telepon harus diisi',
                'scholarship_phone.numeric' => 'Nomor telepon harus berupa angka',
                'scholarship_phone.digits_between' => 'Nomor telepon harus antara 10 sampai 15 digit',
                'scholarship_phone.unique' => 'Nomor telepon sudah digunakan',
            ]
        );

        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
        }

        Scholarship::create([
            'scholarship_title' => $request->scholarship_title,
            'scholarship_description' => $request->scholarship_description,
            'scholarship_head_cover' => $filename,
            'scholarship_phone' => $request->scholarship_phone,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('scholarship')->with('success', 'Beasiswa berhasil ditambahkan');
    }


    public function editScholarship($id)
    {
        $scholarship = Scholarship::with('users')->findOrFail($id);
        return view('scholarship.edit', compact('scholarship'));
    }

    public function updateScholarship(Request $request, $id)
    {
        $request->validate(
            [
                'scholarship_title' => 'required|max:255',
                'scholarship_description' => 'required',
                'scholarship_phone' => [
                    'required',
                    Rule::unique('scholarships')
                        ->where(function ($query) use ($request) {
                            return $query->where('scholarship_phone', $request->scholarship_phone);
                        })
                        ->ignore($id),
                ],
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5500'
            ],
            [
                'scholarship_title.required' => 'Judul beasiswa harus diisi',
                'scholarship_description.required' => 'Deskripsi beasiswa harus diisi',
                'image.required' => 'Gambar harus diisi',
                'image.image' => 'File harus berupa gambar (PNG, JPG, JPEG, GIF)',
                'image.max' => 'Ukuran gambar maksimal 5MB',
                'scholarship_phone.required' => 'Nomor telepon harus diisi',
                'scholarship_phone.numeric' => 'Nomor telepon harus berupa angka',
                'scholarship_phone.digits_between' => 'Nomor telepon harus antara 10 sampai 15 digit',
                'scholarship_phone.unique' => 'Nomor telepon sudah digunakan',
            ]
        );

        $scholarship = Scholarship::with('users')->findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $manager = new ImageManager(new Driver());
            $filename = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename));
            $scholarship->scholarship_head_cover = $filename;
        }

        $scholarship->scholarship_title = $request->scholarship_title;
        $scholarship->scholarship_description = $request->scholarship_description;
        $scholarship->scholarship_phone = $request->scholarship_phone;
        $scholarship->save();
        return redirect()->route('scholarship')->with('success', 'Beasiswa berhasil diperbarui');
    }

    public function destroyScholarship($id)
    {
        $scholarship = Scholarship::with('users')->findOrFail($id);
        $scholarship->delete();
        return redirect()->route('scholarship')->with('success', 'Beasiswa berhasil dihapus.');
    }

    public function showDetailScholarship($id)
    {
        $scholarship = Scholarship::with('users')->findOrFail($id);
        return view('scholarship.show', compact('scholarship'));
    }

    public function showWarta(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Warta::with('users')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('warta_title', 'LIKE', "%{$search}%");
        }

        $warta = $query->paginate($limit);
        return view('warta.tampilan', compact('warta', 'search', 'limit', 'limitOptions'));
    }

    public function createWarta()
    {
        $warta = Warta::with('users');
        return view('warta.create', compact('warta'));
    }

    public function storeWarta(Request $request)
    {
        $request->validate(
            [
                'warta_title' => 'required|max:255',
                'file' => 'required|mimes:docx,pdf|max:10000'
            ],
            [
                'warta_title.required' => 'Judul warta harus diisi',
                'file.required' => 'File harus diisi',
                'file.mimes' => 'File harus berupa dokumen (DOCX, PDF)',
                'file.max' => 'Ukuran file maksimal 10MB'
            ]
        );

        // $file = $request->file('file');
        // $fileName = time() . '.' . $file->getClientOriginalExtension();
        // $file->move('uploads/', $fileName);

        $fileName = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/', $fileName);
        }

        Warta::create([
            'warta_title' => $request->warta_title,
            'warta_file' => $fileName,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('warta')->with('success', 'Warta berhasil ditambahkan');
    }


    public function editWarta($id)
    {
        $warta = Warta::with('users')->findOrFail($id);
        return view('warta.edit', compact('warta'));
    }

    public function updateWarta(Request $request, $id)
    {
        $warta = Warta::with('users')->findOrFail($id);
        $request->validate(
            [
                'warta_title' => 'required|max:255',
                'file' => 'mimes:docx,pdf|max:10000'
            ],
            [
                'warta_title.required' => 'Judul warta harus diisi',
                'file.mimes' => 'File harus berupa dokumen (DOCX, PDF)',
                'file.max' => 'Ukuran file maksimal 10MB'
            ]
        );

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/', $fileName);
            $warta->warta_file = $fileName;
        }

        $warta->warta_title = $request->warta_title;
        $warta->save();
        return redirect()->route('warta')->with('success', 'Warta berhasil diperbarui');
    }

    public function destroyWarta($id)
    {
        $warta = Warta::with('users')->findOrFail($id);
        $warta->delete();
        return redirect()->route('warta')->with('success', 'Warta berhasil dihapus.');
    }

    public function showDetailWarta($id)
    {
        $warta = Warta::with('users')->findOrFail($id);
        return view('warta.show', compact('warta'));
    }
}
