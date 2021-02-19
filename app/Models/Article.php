<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
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

    /**
     * Change timezone to match local.
     */
    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->timezone('America/Sao_Paulo');
    }
}
