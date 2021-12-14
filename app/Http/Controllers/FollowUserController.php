<?php

namespace App\Http\Controllers;

use App\Models\FollowsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowUserController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $follow = FollowsUsers::create([
            'user_id' => Auth::user()->id,
            'following_id' => $request['id'],
        ]);

        session()->flash('message', 'Follow was created' . $follow);
        return redirect()->route('users.show', ['id' => $request['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->flash('message', 'ss');
        $follow = FollowsUsers::where('user_id', auth()->user()->id)->where('following_id', $id)->first();

        if ($follow->user_id != auth()->user()->id)
        {
            return redirect()->route('users.show', ['id' => $id]);
        }

        FollowsUsers::where('user_id', auth()->user()->id)->where('following_id', $id)->delete();

        session()->flash('message', 'Follow successfully deleted! id: ' . auth()->user()->id .
            'no longer follows id: '.$id);
        return redirect()->route('users.show', ['id' => $id]);

    }
}
