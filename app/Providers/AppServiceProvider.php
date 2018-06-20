<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\News;
use Carbon\Carbon;
use App;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $news = News::latest('date')->take(3)->get();

        foreach ($news as $new) {
            $new->short_text_en = $new->text_en;
            $new->short_text_ru = $new->text_ru;
            $new->format_date = $new->date;
        }

        $now = Carbon::now()->year;

        view()->share(['news' => $news, 'now' => $now]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }        // ...
    }
}
