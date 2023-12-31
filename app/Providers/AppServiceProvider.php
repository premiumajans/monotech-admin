<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\MetaTag;
use App\Models\Paylasim;
use App\Models\Setting;
use App\Models\SiteLanguage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $generalCategories = Category::all();
        view()->share([
            'generalCategories' => $generalCategories,
        ]);
    }
}
