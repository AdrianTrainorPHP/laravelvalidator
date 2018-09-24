<?php
namespace AdrianTrainor\LaravelValidator\Providers;

use AdrianTrainor\LaravelValidator\Console\Commands\ValidatorMakeCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class ValidatorServiceProvider
 * @package AdrianTrainor\LaravelValidator\Providers
 */
class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            ValidatorMakeCommand::class,
        ]);
    }
}
