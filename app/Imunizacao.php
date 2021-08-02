<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunizacao extends Model
{
    protected $table = 'imunizacao';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lote', 'fabricante', 'dose_aplicada', 'status', 'data_aplicacao','created_at','updated_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
