<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacinas extends Model
{
    protected $table = 'vacinas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fabricante', 'dias', 'doses_necessarias','estoque','created_at','updated_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
