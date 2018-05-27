<?php

namespace App\Providers;

use App\Contracts\IDriverRepository;
use App\Contracts\IHourRepository;
use App\Contracts\IProviderRepository;
use App\Contracts\IVehicleTypeRepository;
use App\Contracts\IZoneRepository;
use App\Repositories\DriverRepository;
use App\Repositories\HourRepository;
use App\Repositories\ProviderRepository;
use App\Repositories\VehicleTypeRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('alpha_spaces', function ($attribute, $value) {
            if (is_null($value)) {
                return true;
            }
            // This will only accept alpha, num and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[a-zA-Z0-9\s]+$/', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Driver Repository
        $this->app->bind(IDriverRepository::class, DriverRepository::class);
        // Vehicle Type Repo
        $this->app->bind(IVehicleTypeRepository::class, VehicleTypeRepository::class);
        // Provider Repo
        $this->app->bind(IProviderRepository::class, ProviderRepository::class);
        // Zone Repo
        $this->app->bind(IZoneRepository::class, ZoneRepository::class);
        // Hour Repo
        $this->app->bind(IHourRepository::class, HourRepository::class);
    }
}
