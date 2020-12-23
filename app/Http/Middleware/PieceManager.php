<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Piece;
use Illuminate\Http\Request;

class PieceManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $piece = Piece::find($request->route('peca'));

        if (($piece->user_is_manager()) || auth()->user()->can('')) {
            return $next($request);
        }

        abort(401);
    }
}
