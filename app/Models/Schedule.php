<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($schedule) {
            $schedule->user_id = Auth::id();
        });
    }
 protected $fillable = [
        'fecha'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function schedule(){
        return $this->belongsTo('App\Models\Customer');
    }
}
