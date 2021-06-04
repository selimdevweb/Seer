<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
/* test */
class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('files', 'files.user_id', '=', 'users.id')
            ->where('users.role', 0)
            ->get();

        return view('admin-auth.gestion-des-membres')->with('users', $users);
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
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function valid(Request $request, $id)
    {
        User::where('id', $request->id)
        ->update([
            'status' => $request->valider,
        ]);

        return redirect()->route('admin.utilisateur');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invalid(Request $request, $id)
    {
        User::where('id', $id)
        ->update([
            'status' => $request->invalider,
        ]);
        $image = public_path('pdf/').$request->pdf;
        DB::table('files')->where('user_id', $id)->delete();
        File::delete($image);

        return redirect()->route('admin.utilisateur')->with('message', 'Ce pdf est bien supprimé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*  public function destroy(File $id)
    {
        $image = public_path('pdf/').$product->cover_img;
        File::delete($image);
        $product ->delete();
        return redirect()->route('admin_dashboard')->with('message', 'Votre publication est bien supprimé ');
    } */
}
