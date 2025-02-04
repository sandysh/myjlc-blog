<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\ExecutionStatus;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','title','body','active'];

    protected static function booted()
    {
        static::creating(function ($faq){
            $faq->active === 'on' ? $faq->active = 1 : $faq->active = 0;
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
