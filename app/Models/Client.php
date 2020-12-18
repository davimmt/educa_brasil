<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'scholarity_level',
        'created_at',
        'updated_at'
    ];

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->timezone('America/Sao_Paulo');
    }
}