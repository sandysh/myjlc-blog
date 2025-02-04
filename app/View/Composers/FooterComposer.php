<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\View\View;
class FooterComposer
{
    public function compose(View $view): void
    {
        $view->with('topCourses', Course::whereActive(1)->latest()->take(14)->get(['title','slug']));
    }
}
