<?php
namespace AdrianTrainor\LaravelValidator\Factory;

use Illuminate\Http\Request;
use Psy\Exception\TypeErrorException;
use Symfony\Component\Debug\Exception\ClassNotFoundException;
use Illuminate\Support\Facades\Validator;

/**
 * Class ValidatorFactory
 * @package AdrianTrainor\LaravelValidator\Factory
 */
class ValidatorFactory
{
    /**
     * @param $class
     * @return Validator
     * @throws ClassNotFoundException
     * @throws TypeErrorException
     */
    public static function generate($class)
    {
        if (!isset($class) || !is_string($class))
            throw new TypeErrorException('No class name provided');

        if (!class_exists($class))
            throw new ClassNotFoundException('Class "' . $class . '" not found', new \ErrorException(''));

        return new $class();
    }
}