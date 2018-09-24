<?php
if (!function_exists('validatorFactory')) {
    function validatorFactory($class)
    {
        return \AdrianTrainor\LaravelValidator\Factory\ValidatorFactory::generate($class);
    }
}