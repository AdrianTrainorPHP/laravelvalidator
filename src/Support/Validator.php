<?php
namespace AdrianTrainor\LaravelValidator\Support\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

/**
 * Trait Validator
 * @package AdrianTrainor\LaravelValidator\Support\Validators
 */
trait Validator
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $data;

    /**
     * PostsValidator constructor.
     * @param Request|array $request
     */
    public function __construct($request)
    {
        $this->request = $request;

        if (is_array($request)) {
            $this->data = $request;
            return;
        }

        if (is_a(Request::class, $request)) {
            $this->data = $request->toArray();
            return;
        }

        $this->data = [];
    }

    /**
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function make(array $rules = [], array $messages = [], array $customAttributes = [])
    {
        return IlluminateValidator::make(
            $this->data,
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

    /**
     * @param Request $request
     * @return Validator
     */
    public static function create(Request $request)
    {
        return (new self($request));
    }
}