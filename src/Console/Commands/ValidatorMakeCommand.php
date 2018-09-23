<?php

namespace AdrianTrainor\LaravelValidator\Console\Commands;

use Illuminate\Console\GeneratorCommand;

/**
 * Class ValidatorMakeCommand
 * @package App\Console\Commands
 */
class ValidatorMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:validator {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new validator class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Validator';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/validator.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Validators';
    }
}
