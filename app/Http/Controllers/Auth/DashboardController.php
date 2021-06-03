<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role==0){

            $files = DB::table('files')
            ->where('user_id', auth()->user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

            $billetteries = DB::table('billetteries')
            ->orderBy('billetteries.updated_at', 'DESC')
            ->take(1)
            ->get();

        return view('user-auth.dashboard')->with(
                [
                    'files' => $files,
                    'billeteries' =>$billetteries,
                    'seer_infos' =>$seer_infos
                ]
            );
        }
        else if (auth()->user()->role==1)
            return redirect('/tableau-de-bord');
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
                'rgpd' => 'required',
                'image' => 'required|mimes:pdf|max:5048'
            ]);

            /* donnner un id uniuqe à l'image avec le chemin et l'extension */
            $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();

            /* déplacer l'image dans le dossier image */
            $request->image->move(public_path('images'), $newImageName);

            /* création d'un slug */

            /* création d'une publication dans la base de donnée   */
            Post::create([
                'rgpd' => $request->input('rgpd'),
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id,
            ]);

            /* afficage de confirmation */

            return redirect('/')->with('message', 'Vos Documents sont bien envoyés');

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
