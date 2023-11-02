<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Tags\HasTags;

class Course extends Model
{
    use HasFactory, HasTags;

    protected $fillable = ['user_id','category_id','title','slug','overview','hours','price','gst','students','class_type',
        'placements', 'featured_image','active'];

//    protected $casts = [
//        'gst' => 'boolean',
//        'placements' => 'boolean',
//        'active' => 'boolean'
//    ];

    protected static function booted()
    {
        static::creating(function ($course) {
            $imageName = Str::slug($course->title,'-').'.'.request()->file('feat_image')->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('courses', request()->feat_image,$imageName);
            $course->featured_image = $path;
            $course->user_id = auth()->id();
            $course->slug = Str::slug($course->title,'-');
            $course->gst = request()->gst === 'on' ? 1 : 0;
            $course->placements = request()->placements === 'on' ? 1 : 0;
            $course->active = request()->active === 'on' ? 1 : 0;
        });

        static::updating(function ($course) {
            if (request()->file('feat_image')) {
                $imageName = Str::slug($course->title,'-').'.'.request()->file('feat_image')->getClientOriginalExtension();
                $path = Storage::disk('public')->putFileAs('courses', request()->feat_image,$imageName);
                $course->featured_image = $path;
            }
            $course->slug = Str::slug($course->title,'-');
            $course->gst = request()->gst === 'on' ? 1 : 0;
            $course->placements = request()->placements === 'on' ? 1 : 0;
            $course->active = request()->active === 'on' ? 1 : 0;
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }


    public function activeFaqs()
    {
        return $this->hasMany(Faq::class)->where('active',1);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
