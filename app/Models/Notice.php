<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = ['title','date','from','to','active'];

    protected static function booted()
    {
        static::creating(function ($notice){
            $notice->active = $notice->active === 'on' ? 1 : 0;
        });

        static::updating(function ($notice) {
            if (request()->has('active')) {
                $notice['active'] = 1;
            } else {
                $notice['active'] = 0;
            }
        });
    }
}
