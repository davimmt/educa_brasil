<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'description',
        'helpers',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the piece.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user(s) that manages the piece.
     */
    public function managers()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Check if current user is manager of the piece.
     */
    public function user_is_manager()
    {
        $user_is_manager = false;

        foreach ($this->managers as $item) {
            if (auth()->id() == $item->id) $user_is_manager = true;
        }

        return $user_is_manager;
    }

    public function getImageAttribute($value) {
        return str_replace('public', 'storage', $value);
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->timezone('America/Sao_Paulo');
    }
}
