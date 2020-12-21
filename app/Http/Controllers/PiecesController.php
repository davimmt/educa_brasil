<?php

namespace App\Http\Controllers;

use App\Models\Pieces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PiecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Pieces::paginate(12);
        return view('user/pieces/index', ['pieces' => $pieces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/pieces/create');
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

        if (!$request->image) $request->image = 'http://via.placeholder.com/720x400';
        else $request->image = $request->file('image')->store('storage/images/pieces');

        if (Pieces::create([
            'user_id'     => auth()->id(),
            'image'       => $request->image,
            'title'       => $data['title'],
            'description' => $data['description'],
            'helpers'     => $data['helpers']
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
        $piece = Pieces::find($id);
        return view('user/pieces/show', ['piece' => $piece]);
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title'       => ['required', 'string', 'max:50', 'unique:pieces'],
            'description' => ['required', 'string', 'unique:pieces'],
            'helpers'     => ['required', 'string'],
        ]);
    }
}
