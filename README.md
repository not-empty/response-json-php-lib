# PHP Taurus Queue Publisher

[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)

PHP library to create a response json pattern to API's

### Installation

[Release 5.0.0](https://github.com/not-empty/response-json-php-lib/releases/tag/5.0.0) Requires [PHP](https://php.net) 8.1

[Release 4.0.0](https://github.com/not-empty/response-json-php-lib/releases/tag/4.0.0) Requires [PHP](https://php.net) 7.4

[Release 3.0.0](https://github.com/not-empty/response-json-php-lib/releases/tag/3.0.0) Requires [PHP](https://php.net) 7.3

[Release 2.0.0](https://github.com/not-empty/response-json-php-lib/releases/tag/2.0.0) Requires [PHP](https://php.net) 7.2

[Release 1.0.0](https://github.com/not-empty/response-json-php-lib/releases/tag/1.0.0) Requires [PHP](https://php.net) 7.1

The recommended way to install is through [Composer](https://getcomposer.org/).

```sh
composer require not-empty/response-json-php-lib
```

### Usage

Creating a response

```php
use ResponseJson\ResponseJson;
$responseJson = new ResponseJson();
$token = [
    'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.' .
        'eyJhdWQiOiJ0ZXN0IiwiZXhwIjozMCwiaWF0I' .
        'joxNTYyMTcwOTIwLCJpc3MiOiJ0ZXN0Iiwic3' .
        'ViIjoiIn0=.wPdhZtjpyBjObFWbxPx33GNJpv' .
        'KHIznPV0GQ2NiQp5A=',
    'valid_until' => '2020-06-16 12:36:34',
];
$data = [
    'data' => 'test',
];
$response = $responseJson->response(
    'd0684895-cb6c-4c9a-a0aa-0aed7cfc1f46',
    microtime(true)-0.1,
    $token,
    $data,
    'message'
);
var_dump($response);
```

if you want an environment to run or test it, you can build and install dependences like this

```sh
docker build --build-arg PHP_VERSION=8.1.4-cli -t not-empty/response-json-php-lib:php81 -f contrib/Dockerfile .
```

Access the container
```sh
docker run -v ${PWD}/:/var/www/html -it not-empty/response-json-php-lib:php81 bash
```

Verify if all dependencies is installed
```sh
composer install --no-dev --prefer-dist
```

and run
```sh
php sample/response-json-sample.php
```

### Development

Want to contribute? Great!

The project using a simple code.
Make a change in your file and be careful with your updates!
**Any new code will only be accepted with all validations.**

To ensure that the entire project is fine:

First you need to building a correct environment to install all dependences

```sh
docker build --build-arg PHP_VERSION=8.1.4-cli -t not-empty/response-json-php-lib:php81 -f contrib/Dockerfile .
```

Access the container
```sh
docker run -v ${PWD}/:/var/www/html -it not-empty/response-json-php-lib:php81 bash
```

Install all dependences
```sh
composer install --dev --prefer-dist
```

Run all validations
```sh
composer check
```

**Not Empty Foundation - Free codes, full minds**
