<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PublicArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->simplePaginate(12);
        $articles_total = Article::count();

        return view('public/articles', ['articles' => $articles, 'articles_total' => $articles_total]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('public/article', ['article' => $article]);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = Article::where('title', 'LIKE', '%'.$request->title.'%');
        $articles_total = $search->count();
        $articles = $search->latest()->simplePaginate(12)->withPath('?title='.$request->title);

        return view('public/articles', ['articles' => $articles, 'articles_total' => $articles_total]);
    }
}
