<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\WebsiteDetail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\VisitorController;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ Check if table exists before querying
        if (Schema::hasTable('website_details')) {
            $website = WebsiteDetail::first();
        } else {
            $website = null;
        }

        View::share('website', $website);

        Paginator::defaultView('vendor.pagination.custom');
         View::composer('*', function ($view) {
        $view->with('visitorCount', VisitorController::getVisitorCount());
    });
    }
}
