<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PublicPieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::latest()->simplePaginate(12);
        $pieces_total = Piece::count();

        return view('public/pieces', ['pieces' => $pieces, 'pieces_total' => $pieces_total]);
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
        return view('public/piece', ['piece' => $piece]);
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

        return view('public/pieces', ['pieces' => $pieces, 'pieces_total' => $pieces_total]);
    }
}
