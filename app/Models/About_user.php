<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_user extends Model
{
    protected $fillable = [
        'abo_name',
        'abo_age',
        'abo_gender',
        'abo_size',
        'abo_weigth',
        'abo_score',
        'abo_points',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

