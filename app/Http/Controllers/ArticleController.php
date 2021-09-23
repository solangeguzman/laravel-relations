<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Author;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
        // dump($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::All();
        return view('article.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate da fare
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'cover'=>'nullable',
            'author_id' =>'required'
        ]);
        $article = New Article();
        $this->saveArticle($article, $request);
        return redirect()->route('articles.show', $article);
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));

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
    private function saveArticle (Article $article, Request $request){
        $data = $request ->all();

        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->cover = $data['cover'];
        $article->author_id = $data['author_id'];
        $article->save();
    
    }
}
