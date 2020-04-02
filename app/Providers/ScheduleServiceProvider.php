<?php

namespace App\Providers;

use App\Cron;
use App\Services\WebCrawler;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->call(function (WebCrawler $crawler) {
                $crawler->fetch();
            })->everyMinute()->when(function() {
                return Cron::shouldIRun('fetch', 60);
            });;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
