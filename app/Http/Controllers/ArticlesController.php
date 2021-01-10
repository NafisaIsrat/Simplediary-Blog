<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function show(Article $article)
    {
        // show a single resourse

        return view('articles\show', ['article' => $article]);
    }

    public function index()
    {
        // Render a list of Resource
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else {
            $articles = Article::latest()->get();
        }


        return view('articles\index', ['article' => $articles]);
    }

    public function create()
    {
        //show a view to create a new resource
        return view('articles\create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        // persist the new resource
        $this->validateArticle();
       $article = new Article(request(['title', 'excerpt', 'body']));

       $article->user_id = auth()->user()->id;
       $article->save();

       $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));

    }

    public function edit(Article $article)
    {
        //Check for correct user
        if(Auth::user()->id !== $article->user_id){
            return redirect('/articles')->with('error', 'Unauthorized page');
        }
        //show the view to edit an existing resource
        return view('articles\edit', compact('article'));
    }

    public function update(Article $article)
    {
        //persist the edited resourse
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function destroy(Article $article)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        //delete a resource
        !$article->delete();
        return redirect('dashboard')->with('articles', $user->articles);

    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
