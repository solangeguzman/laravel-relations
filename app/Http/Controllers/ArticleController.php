<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewArticleCreated;
use App\Article;
use App\Author;
use App\Tag;
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
        $authors = Author::all();
        $tags = Tag::all();
        return view('article.create', compact('authors', 'tags'));
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
            'author_id' =>'required',
            'tags'=>'required',
        ]);
        $article = New Article();
        $this->saveArticle($article, $request);
        // dopo che salva il ns item, inviamo l'email.
        Mail::to('pippobaudo@test.it')->send(new NewArticleCreated($article));
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
        $article = Article::find($id);
        return view('article.show', compact('article'));
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

        if(array_key_exists('tags', $data)) {
            foreach($data['tags'] as $idTag) {
                $article->tag()->attach($idTag);
            }
        }
    
    }
}
