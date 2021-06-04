<?php

namespace App\Http\Controllers\User;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
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

            $seerInfos = DB::table('seer_infos')
            ->first();

            return view('user-auth.profil')->with(
                [
                    'files' => $files,
                    'billeteries' =>$billetteries,
                    'seerInfos' =>$seerInfos
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
    public function create(Request $request)
    {
        $request->validate([
            'file_path' => 'required|mimes:pdf|max:2000000',
            'rgpd' => 'required'
        ]);

        $nom = $_FILES['file_path']['name'];

        $date = date('m/d/Y');
        $newpdf = $nom;

        $request->file_path->move(public_path('pdf'), $newpdf);

        File::create([
            'file_path' => $newpdf,
            'user_id' => auth()->user()->id,
        ]);

        User::where('id', auth()->user()->id)
        ->update([
            'status' => 0
        ]);

        return back()->with('message', 'Votre document est transféré vers les administrateurs');
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
                'rgpd' => 'required',
                'image' => 'required|mimes:pdf|max:5048'
            ]);

            $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();

            $request->image->move(public_path('images'), $newImageName);

            Post::create([
                'rgpd' => $request->input('rgpd'),
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id,
            ]);

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
