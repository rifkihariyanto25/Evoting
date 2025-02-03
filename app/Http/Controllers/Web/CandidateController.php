<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateStoreRequest;
use App\Models\Candidate;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class CandidateController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new ControllersMiddleware(PermissionMiddleware::using('candidate-view'), only: ['index', 'show']),
            new ControllersMiddleware(PermissionMiddleware::using('candidate-create'), only: ['create', 'store']),
            new ControllersMiddleware(PermissionMiddleware::using('candidate-update'), only: ['edit', 'update']),
            new ControllersMiddleware(PermissionMiddleware::using('candidate-delete'), only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();

        return view('pages.app.candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateStoreRequest $request)
    {
        try {
            candidate::create([
                'name' => $request->name,
                'image' => $request->file('image')->store('candidates', 'public'),
                'namaKetua' => $request->namaKetua,
                'namaWakilKetua' => $request->namaWakilKetua,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'sort_order' => $request->sort_order,
            ]);

            return redirect()->route('app.candidate.index')->with('success', 'Candidate Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create candidate: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
