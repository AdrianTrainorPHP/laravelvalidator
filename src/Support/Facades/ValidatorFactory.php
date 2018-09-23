<?php

namespace AdrianTrainor\LaravelValidator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ValidatorFactory
 * @package AdrianTrainor\LaravelValidator\Facades
 */
class ValidatorFactory extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validatorFactory';
    }
}
