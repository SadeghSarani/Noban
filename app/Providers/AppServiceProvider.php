<?php

namespace App\Providers;

use App\Handler\ValidateUserForGetTurn\ValidateProcess;
use App\Models\Doctor;
use App\Models\Turn;
use App\Observers\TurnObserver;
use App\Repository\DoctorRepository;
use App\Repository\TurnRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind('processValidate', function (){

            return new ValidateProcess();
        });

        $this->app->instance('request', new Request());
        $this->app->singleton('validateProcess', ValidateProcess::class);
        $this->app->singleton('turn', Turn::class);
        $this->app->instance('doctorRepository', new DoctorRepository());
        $this->app->instance('turnRepository', new TurnRepository());
        $this->app->instance('doctor', new Doctor());
        $this->app->instance('turn', new Turn());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Turn::observe(TurnObserver::class);
    }
}
