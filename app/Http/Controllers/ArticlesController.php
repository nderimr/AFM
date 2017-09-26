<?php

namespace App\Http\Controllers;
use Input;
use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ArticlesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the articles sorted by creation date .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articles=Article::with('users')->get();
        // $articles=Article::all()->sortByDesc('created_at');
         //$user= $article->users()->get(); //getting the articles users
           
        return view('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=array('scientific', 'politics', 'tech', 'fun');
        $tags=Tag::pluck('name','id');
        $workflows=array('one'=>'one', 'two'=>'two', 'three'=>'three');
        return view('articles.create')->with('types',$types)->with('tags',$tags)->with('workflows',$workflows);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        $article=Auth::user()->articles()->create($request->all());
        $article->tags()->attach($request->input('tags_list'));
          //Move Uploaded File
         $uploadedfile = $request->file('fileUpload');
          $path = $request->file('fileUpload')->store('avatars');
         
        
         $destinationPath = 'storage/images';
         $extension=$uploadedfile->getClientOriginalExtension();
         //dd($destinationPath);
         $uploadedfile->move($path,$uploadedfile);//->getClientOriginalName());
         return redirect('articles');
       
      //  $article->state='initial';


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return view('articles.show');
        $article=Article::with('users','comments','tags','files')->get()->find($id);
        
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
