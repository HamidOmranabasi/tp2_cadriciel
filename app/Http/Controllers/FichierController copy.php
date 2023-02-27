<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;

class FichierController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()    {
        $files = Fichier::all();
        echo $files;
        return view('files.index', ['files' => $files]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        $files = Fichier::select()->paginate(8);
        return view('files.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('files.ajouteFile');
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request){

    $fileName = Auth::id() . '_' . time() . '.'. $request->file->extension();  
    $type = $request->file->getClientMimeType();
    $size = $request->file->getSize();
    $path ='public/files/'.Auth::id();
    $request->file->move(public_path('files/'.Auth::id()), $fileName);

    echo $request;

    Fichier::create([
        'etudientsId' => Auth::id(),
        'titre' => $fileName,
        'path'  => $path,
        'type' => $type,
        'size' => $size
        ]);

        return redirect()->route('depot.index')->withSuccess(__('File added successfully.'));
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
