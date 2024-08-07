<?php

namespace App\Providers;

use App\Models\Collaborators;
use App\Models\Hoists;
use App\Models\Schedule;
use App\Models\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public ?Settings $settings = null;
    public ?Schedule $schedule = null;
    public ?Hoists $equipament = null;
    public ?Collaborators $collaborators = null;

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        # general setting shared
        if ($settings = Settings::first()) {
            $this->settings = $settings;

            View::share('setting', $settings);
        }
       
       
    }
}