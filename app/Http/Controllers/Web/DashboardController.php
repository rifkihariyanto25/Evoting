<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index()
    {

        $candidates = Candidate::orderBy('sort_order', 'asc')->get(); // Menampilkan kandidat berdasarkan urutan yang ditentukan
        return view('pages.app.dashboard', compact('candidates'));
    }
}
