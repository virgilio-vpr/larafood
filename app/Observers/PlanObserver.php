<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\Plan;

class PlanObserver
{
    /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Models\\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
        $plan->price= preg_replace('/(?<=\d),+(?=\d)/', '.', $plan->price);
    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Models\\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
        $plan->price= preg_replace('/(?<=\d),+(?=\d)/', '.', $plan->price);
    }
}
