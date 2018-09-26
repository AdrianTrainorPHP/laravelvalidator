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

##### Example of a unique rule which can behave differently depending on whether the Post is being created or edited.


```
<?php
namespace App\Validators;

use AdrianTrainor\LaravelValidator\Traits\Validator;
use App\Models\Post;

class PostsValidator
{
    use Validator;

    /**
     * Define validator rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|unique'
    ];

    /**
     * Rename attributes
     *
     * @var array
     */
    protected $customAttributes = [
        'title' => 'name',
    ];

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function edit(Post $post)
    {
        return $this->make($post->toArray(), [
            'title' => [
                'required',
                Rule::unique('posts')->ignore($post->id),
            ]
        ]);
    }
}


<?php
namespace App\Http\Controllers;

use App\Validators\PostsValidator;

class PostsController extends Controller {

    public function create(Request $request) {
        
        // Validate using default rules
        $validator = validatorFactory(PostsValidator::class)->make($request->all());
        
    }

    public function edit(Request $request) {
        
        // Validate using a unique exception rule on edit
        $validator = validatorFactory(PostsValidator::class)->edit($post);
        
    }
}
    
```