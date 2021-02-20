<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->simplePaginate(18);
        $articles_total = Article::count();
        
        return view('user/articles/index', ['articles' => $articles, 'articles_total' => $articles_total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/articles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        if (Article::create([
            'user_id' => auth()->id(),
            'title'   => $data['title'],
            'content' => $data['content']
        ])) {
            return redirect()->back()->with('response', ['success', 'Sucesso!']);
        }

        return redirect()->back()->with('response', ['danger', 'Error!']);
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
        return view('user/articles/show', ['article' => $article]);
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
        return view('user/articles/edit', ['article' => $article]);
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
        $article = Article::find($id);
        $data = $this->validator($request->all() + ['id' => $id])->validate();

        $article->title == $data['title'];
        $article->content = $data['content'];
        $article->save();

        return redirect()->back()->with('response', ['success', 'Sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        
        $articles = Article::latest()->simplePaginate(12);
        $articles_total = Article::count();

        return redirect()->route('articles.index', ['articles' => $articles, 'articles_total' => $articles_total])->with('response', ['success', 'Sucesso!']);
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
        $articles = $search->latest()->simplePaginate(18)->withPath('?title='.$request->title);

        return view('user/articles/index', ['articles' => $articles, 'articles_total' => $articles_total]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (array_key_exists('id', $data)) {
            return Validator::make($data, [
                'title'   => ['required', 'string', 'max:50', Rule::unique('articles')->where('id', '<>', $data['id'])],
                'content' => ['required', 'string', Rule::unique('articles')->where('id', '<>', $data['id'])]
            ]);
        }

        return Validator::make($data, [
            'title'   => ['required', 'string', 'max:50', 'unique:articles'],
            'content' => ['required', 'string', 'unique:articles']
        ]);
    }
}
