<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PieceController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('piece.manager')->only(['edit', 'update', 'destroy', 'setManagers']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::latest()->simplePaginate(12);
        $pieces_total = Piece::count();

        return view('user/pieces/index', ['pieces' => $pieces, 'pieces_total' => $pieces_total]);
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

        if ($request->image) $request->image = $request->file('image')->store('public/images/pieces');

        Piece::create([
            'user_id'     => auth()->id(),
            'image'       => $request->image,
            'title'       => $data['title'],
            'description' => $data['description'],
            'helpers'     => $data['helpers']
        ]);

        return redirect()->back()->with('response', ['success', 'Sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $piece = Piece::find($id);
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
        $piece = Piece::find($id);
        $users = \App\Models\User::all(['id', 'name']);
        $managers = [];

        foreach ($piece->managers as $item) {
            $managers[] = $item->id;
        }

        return view('user/pieces/edit', ['piece' => $piece, 'users' => $users, 'managers' => $managers]);
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
        $piece = Piece::find($id);
        $data = $this->validator($request->all() + ['id' => $id])->validate();

        if ($request->image) $piece->image = $request->file('image')->store('public/images/pieces');
        if (is_null($request->update_image)) $piece->image = null;

        $piece->title = $data['title'];
        $piece->description = $data['description'];
        $piece->helpers = $data['helpers'];

        $piece->save();

        if (auth()->user()->hasRole('adm')) $this->setManagers($data['user_manager'], $id);

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
        Piece::destroy($id);
        
        $pieces = Piece::latest()->simplePaginate(12);
        $pieces_total = Piece::count();

        return redirect()->route('pecas.index', ['pieces' => $pieces, 'pieces_total' => $pieces_total])->with('response', ['success', 'Sucesso!']);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = Piece::where('title', 'LIKE', '%'.$request->title.'%');
        $pieces_total = $search->count();
        $pieces = $search->latest()->simplePaginate(12)->withPath('?title='.$request->title);

        return view('user/pieces/index', ['pieces' => $pieces, 'pieces_total' => $pieces_total]);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setManagers(array $data, $id)
    {
        $piece = Piece::find($id);
        $managers = $piece->getManagersId();

        if ($data == $managers) return true;

        $manager_add = array_diff($data, $managers);
        $manager_remove = array_diff($managers, $data);

        foreach ($manager_remove as $user_id) {
            \DB::table('piece_user')->where(['user_id' => $user_id, 'piece_id' => $id])->delete();
        }

        foreach ($manager_add as $user_id) {
            \DB::table('piece_user')->insert([
                'piece_id'   => $id,
                'user_id'    => $user_id,
                'created_at' => now(), 
                'updated_at' => now()
            ]);
        }

        return true;
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
                'title'        => ['required', 'string', 'max:50', Rule::unique('pieces')->where('id', '<>', $data['id'])],
                'description'  => ['required', 'string', Rule::unique('pieces')->where('id', '<>', $data['id'])],
                'helpers'      => ['nullable', 'string'],
                'user_manager' => ['nullable', 'array', 'max:2'],
            ]);
        }

        return Validator::make($data, [
            'title'       => ['required', 'string', 'max:50', 'unique:pieces'],
            'description' => ['required', 'string', 'unique:pieces'],
            'helpers'     => ['nullable', 'string'],
        ]);
    }
}
