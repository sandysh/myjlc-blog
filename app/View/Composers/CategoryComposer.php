<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;
class CategoryComposer
{
    public function compose(View $view): void
    {
        $view->with('categories', Category::whereActive(1)->get());
    }
}
