# SparkPostBundle

The `SparkPostBundle` integrates the [SparkPost](https://github.com/SparkPost/php-sparkpost) PHP library with Symfony.

[![Latest Stable Version](https://poser.pugx.org/tlamedia/sparkpost-bundle/v/stable)](https://packagist.org/packages/tlamedia/sparkpost-bundle) 
[![Build Status](https://api.travis-ci.org/tlamedia/SparkPostBundle.svg?branch=master)](https://travis-ci.org/tlamedia/SparkPostBundle)
[![License](https://poser.pugx.org/tlamedia/sparkpost-bundle/license)](https://packagist.org/packages/tlamedia/sparkpost-bundle)

## Installation

Get the bundlle:

`composer require tlamedia/sparkpost-bundle`

Then enable it in your kernel:

```php
// config/bundles.php
return [
    //...
    Tla\SparkPostBundle\TlaSparkPostBundle::class => ['all' => true],
    //...
];
```


## Configuration

Configure the API key to use:

```yaml
# config/packages/tla_spark_post.yml
tla_spark_post:
    api_key: 'YOUR_API_KEY' # Replace with your own
```


## Usage

The bundle registers the service `tla_spark_post.api_client`, which allows you to use the SparkPost API.

### Send a mail from a controller

```php
class SomeController extends Controller
{
    public function sendAction()
    {

        $sparky = $this->getContainer()->get('tla_spark_post.api_client');
        
        $promise = $sparky->transmissions->post([
        
            'content' => [
                'from' => [
                    'name' => 'YOUR_NAME',
                    'email' => 'YOUR_EMAIL',
                ],
                'subject' => 'My first mail using SparkPostBundle',
                'html' => '<html><body><h1>Congratulations, {{name}}!</h1><p>You just sent your first mail!</p></body></html>',
                'text' => 'Congratulations, {{name}}!! You just sent your first mail!',
                
            ],
            'substitution_data' => ['name' => 'YOUR_FIRST_NAME'],
            'recipients' => [
                [
                    'address' => [
                        'name' => 'YOUR_NAME',
                        'email' => 'YOUR_EMAIL',
                    ],
                ],
            ],
            'cc' => [
                [
                    'address' => [
                        'name' => 'ANOTHER_NAME',
                        'email' => 'ANOTHER_EMAIL',
                    ],
                ],
            ],
            'bcc' => [
                [
                    'address' => [
                        'name' => 'AND_ANOTHER_NAME',
                        'email' => 'AND_ANOTHER_EMAIL',
                    ],
                ],
            ],
        ]);
        
        $promise = $sparky->transmissions->get();
        
        try {
            $promise->wait();
        } catch (\Throwable $t) {
            echo $t->getCode()."\n";
            echo $t->getMessage()."\n";
        }

    }
}
```


## Documentation

Detailed documentation on how to access each API method can be found in the documentation of the package that this bundle integrates: [Sparkpost API library](https://github.com/SparkPost/php-sparkpost/blob/master/README.md)


## License

This package is available under the [MIT license](LICENSE).
