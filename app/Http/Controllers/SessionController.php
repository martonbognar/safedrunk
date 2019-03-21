<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Session;
use App\Beverage;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function list()
    {
        return Session::where('user_id', Auth::id())->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session();
        $session->name = request('name');
        $session->user_id = Auth::id();
        $session->save();
        return response()->json(['id' => $session->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        $beverages = Beverage::all();
        $drinks = $session->drinks()->get();
        $user = Auth::user();
        return view('session', compact(['session', 'beverages', 'drinks', 'user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $id = $session->id;
        $session->delete();
        return response()->json(['id' => $id]);
    }
}
