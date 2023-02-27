<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()    {
        $fichiers = Fichier::all();
        return view('files.index', ['files' => $files]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        $files = File::select()->paginate(8);
        return view('files.index', ['fichiers' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('files.ajoutArticle');
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request){
        //return $request;
        $newFile = File::create([
            'titre' => $request->titre,
            'contenu'  => $request->contenu,
            'titre_fr' => $request->titre,
            'contenu_fr'  => $request->contenu,
            'etudientsId' => Auth::user()->id,
            'date' => now()
        ]);

        return redirect(route('files.show', $newFile->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file){
        return view('files.detaile', ['file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file){
        return view('files.modif', ['post' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)    {
        $file->update([
             'titre' => $request->titre,
             'contenu' => $request->contenu
         ]);
        return redirect(route('files.show', $file->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file){
        $file->delete();

        return redirect(route('files.index'));
    }

    public function page(){
        $fichierPost = file::select()
                ->paginate(8);
        return view('page.page', ['files' => $files]);
    }
}
