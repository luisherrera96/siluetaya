<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($customer) {
            $customer->user_id = Auth::id();
        });
    }
    
    protected $fillable = [
        'cus_name',
        'cus_phon',
        'ccus_address',
        'cus_zipcode',
        'cus_email',
        'cus_association',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function schedules(){
        return $this->hasMany('App\Models\Schedule');
    }
}
