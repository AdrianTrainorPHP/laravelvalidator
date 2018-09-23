<?php
namespace AdrianTrainor\LaravelValidator\Providers;

use Illuminate\Support\ServiceProvider;

use AdrianTrainor\LaravelValidator\Support\ValidatorFactory;
use AdrianTrainor\LaravelValidator\Facades\ValidatorFactory as ValidatorFactoryFacade;

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
        $this->app->singleton(ValidatorFactory::class, function () {
            return new ValidatorFactory();
        });

        $this->app->alias(ValidatorFactory::class, 'audit');

        $aliasLoader = \Illuminate\Foundation\AliasLoader::getInstance();
        $aliasLoader->alias('ValidatorFactory', ValidatorFactoryFacade::class);
    }
}
