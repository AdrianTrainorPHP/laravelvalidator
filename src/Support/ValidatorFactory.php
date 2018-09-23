<?php
namespace AdrianTrainor\LaravelValidator\Support;

use Illuminate\Http\Request;
use Psy\Exception\TypeErrorException;
use Symfony\Component\Debug\Exception\ClassNotFoundException;
use Illuminate\Support\Facades\Validator;

/**
 * Class ValidatorFactory
 * @package AdrianTrainor\LaravelValidator\Support
 */
class ValidatorFactory
{
    /**
     * @param $class
     * @param Request|array $request
     * @return Validator
     * @throws ClassNotFoundException
     * @throws TypeErrorException
     */
    public function generate($class, $request)
    {
        if (!isset($class) || !is_string($class))
            throw new TypeErrorException('No class name provided');

        if (!class_exists($class))
            throw new ClassNotFoundException('Class "' . $class . '" not found', new \ErrorException(''));

        return new $class($request);
    }
}