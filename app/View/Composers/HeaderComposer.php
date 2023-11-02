<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\View\View;
class HeaderComposer
{
    public function compose(View $view): void
    {
        $view->with('courses', Course::whereActive(1)->get(['title','slug']));
    }
}
