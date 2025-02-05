<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $candidates = Candidate::orderBy('sort_order', 'asc')->get(); // Menampilkan kandidat berdasarkan urutan yang ditentukan
        return view('pages.app.dashboard', compact('candidates'));
    }

    public function vote(Candidate $candidate)
    {
        $candidate->votes()->create([
            'voter_id' => Auth::user()->voter->id
        ]);

        return redirect()->route('app.dashboard')->with('success', 'Voting Berhasil');
    }
}
