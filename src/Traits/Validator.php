<?php
namespace AdrianTrainor\LaravelValidator\Traits;

use Illuminate\Support\Facades\Validator as IlluminateValidator;

/**
 * Trait Validator
 * @package AdrianTrainor\LaravelValidator\Traits
 */
trait Validator
{
    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function make(array $data = [], array $rules = [], array $messages = [], array $customAttributes = [])
    {
        return IlluminateValidator::make(
            $data,
            array_merge($this->getArray('rules'), $rules),
            array_merge($this->getArray('messages'), $messages),
            array_merge($this->getArray('customAttributes'), $customAttributes)
        );
    }

    /**
     * @param $attribute
     * @return array
     */
    private function getArray($attribute)
    {
        if (!isset($this->$attribute)) return [];
        if (!is_array($this->$attribute)) return [];
        return $this->$attribute;
    }
}