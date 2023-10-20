<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profile.display', [
            'profiles' => auth()->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.index', [
            'profiles' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $profile = User::find($id);

        $validateData = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|min:5',
            'email' => 'required|email',
            'umur' => 'integer',
            'bio' => 'string',
            'alamat' => 'string'
        ]);

        User::where('id', $profile->id)->update($validateData);

        return redirect('dashboard/profile')->with('success', 'Update profile successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
