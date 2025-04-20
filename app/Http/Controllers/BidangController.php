<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Choir,
    Komisi,
    Bidang
};
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Carbon\Carbon;

class BidangController extends Controller
{
    public function showKomisi(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Komisi::with('users', 'bidangs');

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $komisi = $query->paginate($limit);
        return view('komisi.tampilan', compact('komisi', 'search', 'limit', 'limitOptions'));
    }

    public function createKomisi()
    {
        $komisi = Komisi::with('users', 'bidangs')->get();
        $bidangs = Bidang::with('komisi')->get();
        return view('komisi.create', compact('komisi', 'bidangs'));
    }

    public function storeKomisi(Request $request)
    {
        $request->validate([
            'commission_name' => 'required|max:255',
            'commission_description' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'commission_description_2' => 'required',
            'bidang_id' => 'required|exists:bidangs,id',
        ]);

        $filename1 = null;

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $manager = new ImageManager(new Driver());
            $filename1 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename1));
        }
        $filename2 = null;

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $manager = new ImageManager(new Driver());
            $filename2 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename2));
        }

        Komisi::create([
            'commission_name' => $request->commission_name,
            'commission_description' => $request->commission_description,
            'commission_description_2' => $request->commission_description_2,
            'commission_head_cover' => $filename1,
            'commission_pict' => $filename2,
            'bidang_id' => $request->bidang_id,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('commission')->with('success', 'Komisi berhasil ditambahkan');
    }

    public function editKomisi($id)
    {
        $komisi = Komisi::with('users', 'bidangs')->find($id);
        $bidangs = Bidang::with('komisi')->get();
        return view('komisi.edit', compact('komisi', 'bidangs'));
    }

    public function updateKomisi(Request $request)
    {
        $request->validate([
            "commission_name" => "required|max:255",
            "commission_description" => "required",
            "commission_description_2" => "nullable",
            "image1" => "image|mimes:jpeg,png,jpg,gif|max:2048",
            "image2" => "image|mimes:jpeg,png,jpg,gif|max:2048",
            "bidang_id" => "required|exists:bidangs,id",
        ]);

        $filename1 = null;

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $manager = new ImageManager(new Driver());
            $filename1 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename1));
        }
        $filename2 = null;

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $manager = new ImageManager(new Driver());
            $filename2 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename2));
        }

        $komisi = Komisi::find($request->id);
        $komisi->commission_name = $request->commission_name;
        $komisi->commission_description = $request->commission_description;
        $komisi->commission_description_2 = $request->commission_description_2;
        if ($filename1) {
            $komisi->commission_head_cover = $filename1;
        }
        if ($filename2) {
            $komisi->commission_pict = $filename2;
        }
        $komisi->bidang_id = $request->bidang_id;
        $komisi->save();

        return redirect()->route('commission')->with('success', 'Komisi berhasil diperbarui');
    }

    public function showDetailKomisi($id)
    {
        $komisi = Komisi::with('users', 'bidangs')->find($id);
        return view('komisi.show', compact('komisi'));
    }

    public function destroyKomisi($id)
    {
        $komisi = Komisi::find($id);
        $komisi->delete();
        return redirect()->route('commission')->with('success', 'Komisi berhasil dihapus');
    }

    public function showChoir(Request $request)
    {
        $search = $request->input('search', '');
        $limit = $request->input('limit', 5); // Default limit ke 5
        $limitOptions = [5, 10, 25, 50];

        $query = Choir::with('users');

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $choir = $query->paginate($limit);
        return view('choir.tampilan', compact('choir', 'search', 'limit', 'limitOptions'));
    }

    public function createChoir()
    {
        $choir = Choir::with('users')->get();
        return view('choir.create', compact('choir'));
    }

    public function storeChoir(Request $request)
    {
        $request->validate([
            'choir_name' => 'required|max:255',
            'choir_description' => 'required',
            'choir_description_2' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename1 = null;

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $manager = new ImageManager(new Driver());
            $filename1 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename1));
        }
        $filename2 = null;

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $manager = new ImageManager(new Driver());
            $filename2 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename2));
        }

        Choir::create([
            'choir_name' => $request->choir_name,
            'choir_description' => $request->choir_description,
            'choir_description_2' => $request->choir_description_2,
            'choir_head_cover' => $filename1,
            'choir_pict' => $filename2,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('choir')->with('success', 'Paduan Suara berhasil ditambahkan');
    }

    public function editChoir($id)
    {
        $choir = Choir::with('users')->find($id);
        return view('choir.edit', compact('choir'));
    }

    public function updateChoir(Request $request)
    {
        $request->validate([
            "choir_name" => "required|max:255",
            "choir_description" => "required",
            "choir_description_2" => "nullable",
            "image1" => "image|mimes:jpeg,png,jpg,gif|max:2048",
            "image2" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $filename1 = null;

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $manager = new ImageManager(new Driver());
            $filename1 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename1));
        }
        $filename2 = null;

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $manager = new ImageManager(new Driver());
            $filename2 = time() . '.webp';
            $image = $manager->read($file)->encode(new WebpEncoder(quality: 80));
            $image->save(public_path('img/' . $filename2));
        }

        $choir = Choir::find($request->id);
        $choir->choir_name = $request->choir_name;
        $choir->choir_description = $request->choir_description;
        $choir->choir_description_2 = $request->choir_description_2;
        if ($filename1) {
            $choir->choir_head_cover = $filename1;
        }
        if ($filename2) {
            $choir->choir_pict = $filename2;
        }
        $choir->save();

        return redirect()->route('choir')->with('success', 'Paduan Suara berhasil diperbarui');
    }

    public function showDetailChoir($id)
    {
        $choir = Choir::with('users')->find($id);
        return view('choir.show', compact('choir'));
    }

    public function destroyChoir($id)
    {
        $choir = Choir::find($id);
        $choir->delete();
        return redirect()->route('choir')->with('success', 'Paduan Suara berhasil dihapus');
    }
}
