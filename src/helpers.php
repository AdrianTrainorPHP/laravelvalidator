<?php
if (!function_exists('validatorFactory')) {
    function validatorFactory($class, $request)
    {
        return \AdrianTrainor\LaravelValidator\Factory\ValidatorFactory::generate($class, $request);
    }
}