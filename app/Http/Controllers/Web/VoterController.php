<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoterStoreRequest;
use App\Http\Requests\VoterUpdateRequest;
use App\Models\User;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class VoterController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('voter-view'), only: ['index', 'show']),
            new Middleware(PermissionMiddleware::using('voter-create'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('voter-update'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('voter-delete'), only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voter = Voter::all();

        return view('pages.app.voter.index', compact('voter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.voter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoterStoreRequest $request)
    {
        try {

            $user = User::create([
                'email' => $request->email,
                // 'nim' => $request->nim,
                'password' => bcrypt($request->password),
            ]);

            $user->assignRole('voter');
            $user->voter()->create([
                'name' => $request->name
            ]);


            return redirect()->route('app.voter.index')->with('success', 'Voter Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create Voter: ' . $e->getMessage()]);
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
        $voter = Voter::findOrFail($id);
        return view('pages.app.voter.edit', compact('voter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoterUpdateRequest $request, string $id)
    {
        try {
            $voter = Voter::FindOrFail($id);

            $voter->user->update([
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $voter->user->password,
            ]);

            $voter->update([
                'name' => $request->name
            ]);

            return redirect()->route('app.voter.index')->with('success', 'Voter Berhasil Update');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to Update Voter: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
