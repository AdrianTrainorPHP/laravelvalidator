<?php
if (!function_exists('validatorFactory')) {
    function validatorFactory($class, $request)
    {
        return app('validatorFactory')->generate($class, $request);
    }
}