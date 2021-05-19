<?php

namespace App\Http\Controllers\Admin;

use App\Models\Billetterie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BilletterieController extends Controller
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
        $request->validate([
            'quantite' => 'required',
            'prix' => 'required',
            'date' => 'required',
            'heure_fin' => 'required'
        ]);

        Billetterie::create([
            'titre' => $titre = 'Billetterie du ' . $request->input('date'),
            'quantite' => $request->input('quantite'),
            'prix' => $request->input('prix'),
            'date' => $request->input('date'),
            'heure_fin' => $request->input('heure_fin'),
            'admin_id' => auth()->user()->id
        ]);

        return redirect('/admin-dashboard');
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
        $billetterie = DB::table('billetteries')
        ->where('id', $id)
        ->first();

        return view('admin_auth.billetterie_update')->with('billetterie', $billetterie);
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

        $request->validate([
            'quantite' => 'required',
            'prix' => 'required',
            'date' => 'required',
            'heure_fin' => 'required'
        ]);

        Billetterie::where('id', $request->id)
        ->update([
            'titre' => $titre = 'Billeterie du ' . $request->input('date'),
            'quantite' => $request->input('quantite'),
            'prix' => $request->input('prix'),
            'date' => $request->input('date'),
            'heure_fin' => $request->input('heure_fin'),
            'admin_id' => auth()->user()->id
        ]);

        return redirect('/admin-dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id ->delete();
        return redirect('/admin-dashboard');
    }
}
