<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seer_infos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeerInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-auth.informations-complementaires');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'adresse' => 'required',
        ]);

        Seer_infos::create([
            'description' => $request->input('description'),
            'adresse' => $request->input('adresse'),
        ]);

        return redirect('/tableau-de-bord');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        /* $infos = DB::table('seer_infos')
        ->where('id', $id)
        ->first();

        return view('admin_auth.seer_infos')->with('infos', $infos); */
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
        /* $request->validate([
            'description' => 'required',
            'adresse' => 'required',
        ]);

        Seer_infos::where('id', $request->id)
        ->update([
            'description' => $request->input('description'),
            'adresse' => $request->input('adresse'),
        ]);

        return redirect('/tableau-de-bord'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* $id ->delete();
        return redirect('/tableau-de-bord'); */
    }
}
