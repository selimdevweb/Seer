<?php

namespace App\Http\Controllers\Users;

use App\Models\File;
use App\Models\User;
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
            'file_path' => 'required|mimes:pdf|max:2000000',
            'rgpd' => 'required'
        ]);
        $nom = $_FILES['file_path']['name'];

        $date = date('m/d/Y');
        /* $request->file('file_path')->getClientOriginalName() */

        /* donnner un id uniuqe à l'image avec le chemin et l'extension */
       /*  $newpdf = auth()->user()->nom.'_'.auth()->user()->prenom.'_'.$nom.'_'.uniqid().'.'. $request->file_path->extension(); */

       $newpdf = $nom;

        $request->file_path->move(public_path('pdf'), $newpdf);

        /* déplacer l'image dans le dossier image */
        /* création d'une publication dans la base de donnée   */
        File::create([
            'file_path' => $newpdf,
            'user_id' => auth()->user()->id,
        ]);

        User::where('id', auth()->user()->id)
        ->update([
            'status' => 0
        ]);

        /* afficage de confirmation */

        return back()->with('message', 'Votre document est transféré vers les administrateurs');
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

}
