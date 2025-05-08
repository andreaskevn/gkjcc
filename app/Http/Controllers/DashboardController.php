<?php

namespace App\Http\Controllers;

use App\Models\Pastor;
use Illuminate\Http\Request;
use App\Models\{
    Visitor,
    Komisi,
    Choir
};
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $guestCount = Visitor::count();
        $weeklyGuestCount = Visitor::where('visited_at', '>=', Carbon::now()->subDays(7))->count();
        $weeklyGuestCount = Visitor::where('visited_at', '>=', Carbon::now()->subDays(7))->count();
        $monthlyUniqueGuestCount = Visitor::whereBetween('visited_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->distinct('ip_address')->count('ip_address');
        $jumlahPendeta = Pastor::count();
        $jumlahKomisi = Komisi::count();
        $jumlahPadus = Choir::count();
        return view('dashboard.dashboard', compact('guestCount', 'weeklyGuestCount', 'monthlyUniqueGuestCount', 'jumlahPendeta', 'jumlahKomisi', 'jumlahPadus'));
    }
}
