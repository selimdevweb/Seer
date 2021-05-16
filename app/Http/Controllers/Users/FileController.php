<?php

namespace App\Http\Controllers\Users;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
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


         /* valider ce que l'on reçoit  */
         $request->validate([
            'file_path' => 'required|mimes:jpeg,png,pdf|max:10000000'
        ]);

        /* donnner un id uniuqe à l'image avec le chemin et l'extension */
        $newpdf = uniqid().'.'. $request->file_path->extension();

        $request->file_path->move(public_path('pdf'), $newpdf);
        /* déplacer l'image dans le dossier image */

        /* création d'une publication dans la base de donnée   */
        File::create([
            'file_path' => $newpdf,
            'user_id' => auth()->user()->id,
        ]);

        /* afficage de confirmation */

        return redirect('/dashboard')->with('message', 'Votre publication est en ligne ');
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
