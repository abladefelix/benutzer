<?php

namespace App\Http\Controllers;
use App\Benutzer;
use Illuminate\Http\Request;

class BenutzerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
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
        //return $request -> all();
        $benutzer = new Benutzer;

        $benutzer -> salutation = $request -> salutation;
        $benutzer -> firstname = $request -> firstname;
        $benutzer -> lastname = $request -> lastname;
        $benutzer -> username = $request -> username;
        $benutzer -> email = $request -> email;
        $benutzer -> password = $request -> password;

        $benutzer -> save();
    }

    // get all Benutzers
    public function getAllBenutzers()
    {
        return Benutzer::all();
        //return Benutzer::orderBy('name', 'ASC')->get();
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
        //
    }
}
