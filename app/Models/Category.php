<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','active','parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
