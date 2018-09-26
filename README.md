# adriantrainor/laravelvalidator

##### Install the package
```
composer require adriantrainor/laravelvalidator
```


##### Register the provider
```
'providers' => [
    ...
    AdrianTrainor\LaravelValidator\Providers\ValidatorServiceProvider::class,
]
```


##### Create a new validator with the `make:validator` command
```
php artisan make:validator PostsValidator
```

##### Simple validator
```
<?php
namespace App\Validators;

use AdrianTrainor\LaravelValidator\Traits\Validator;

class PostsValidator
{
    use Validator;

    /**
     * Define validator rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required'
    ];

    /**
     * Set custom error messages
     *
     * @var array
     */
    protected $messages = [
        'title.required' => 'The title field is required.'
    ];

    /**
     * Rename attributes
     *
     * @var array
     */
    protected $customAttributes = [
        'title' => 'name',
    ];

}
```

##### Simple usage
```
<?php
namespace App\Http\Controllers;

use App\Validators\PostsValidator;

class PostsController extends Controller {
    
    public function create(Request $request) {
        
        $validator = validatorFactory(PostsValidator::class)->make($request);
        
        if ($validator->fails())
            return redirect()
                ->back()
                ->withErrors($validator->errors)
                ->withInput($request->all());
        
    }
}
```

##### 