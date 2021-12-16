<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Services\Twitter;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner_id = User::where('profile_id', $id)->first()->id;
        if (!(auth()->user()->id == $owner_id || auth()->user()->isAdmin)) {
            return redirect()->route('users.show', ['id' => $owner_id]);
        }
        $profile = Profile::findOrFail($id);
        return view('profiles.edit', ['profile' => $profile]);
    }

    public function updateFromTwitter($id, Twitter $twitter)
    {
        $profile = Profile::find($id);
        $owner = User::where('profile_id', $id)->first();
        if (!(auth()->user()->id == $owner->id || auth()->user()->isAdmin)) {
            return redirect()->route('users.show', ['id' => $owner->id]);
        }
        $profile->bio = $twitter->getBio($owner->user_name);
        $profile->save();
        return redirect()->route('users.show', ['id' => $owner->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'bio' => 'required|max:140'
        ]);

        $profile = Profile::find($id);
        $profile->bio = $request->bio;
        $profile->save();

        return redirect()->route('users.show', ['id' => auth()->user()->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
