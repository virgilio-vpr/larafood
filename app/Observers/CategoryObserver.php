<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryObserver
{
     /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }
}
