<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ForumPostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()    {
        $blogs = ForumPost::all();
        return view('forum.index', ['blogs' => $blogs]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        $blogs = ForumPost::select()->paginate(8);
        return view('forum.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('forum.ajoutArticle');
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request){
        //return $request;
        $newPost = ForumPost::create([
            'titre' => $request->titre,
            'contenu'  => $request->contenu,
            'titre_fr' => $request->titre,
            'contenu_fr'  => $request->contenu,
            'etudientsId' => Auth::user()->id,
            'date' => now()
        ]);

        return redirect(route('forum.show', $newPost->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost){
        return view('forum.detaile', ['forumPost' => $forumPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost){
        return view('forum.modif', ['post' => $forumPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumPost $forumPost)    {
        $forumPost->update([
             'titre' => $request->titre,
             'contenu' => $request->contenu
         ]);
        return redirect(route('forum.show', $forumPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumPost $forumPost){
        $forumPost->delete();

        return redirect(route('forum.index'));
    }

    public function page(){
        $blogPost = forumPost::select()
                ->paginate(8);
        return view('page.page', ['forumPosts' => $forumPosts]);
    }
}
