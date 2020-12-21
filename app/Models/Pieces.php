<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieces extends Model
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
     * Get the user that owns the article.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->timezone('America/Sao_Paulo');
    }
}
