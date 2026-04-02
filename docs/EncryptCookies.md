### Tool Definition: Encrypt Cookies Middleware

#### Overview

The Encrypt Cookies Middleware is a Laravel middleware that encrypts cookies to ensure secure data transmission between the client and the server.

#### Configuration

The following configuration options are available:

##### `except` (array, default: empty)

 Specifies the names of the cookies that should not be encrypted. For example:

```json
{
  "name": "Encrypt Cookies Middleware",
  "description": "Encrypts cookies to ensure secure data transmission",
  "configuration": {
    "except": ["cookie1", "cookie2"] // List the names of cookies that should not be encrypted
  }
}
```

#### Technical Documentation

This middleware extends the `Illuminate\Cookie\Middleware\EncryptCookies` class.

#### Usage

1. Register the middleware in the `kernel.php` file under the `protected $middleware` array.

    ```php
protected $middleware = [
    // ...
    \App\Http\Middleware\EncryptCookies::class,
];
```
2. Specify the names of cookies that should not be encrypted in the `except` array.

    ```php
protected $except = [
    'cookie1',
    'cookie2',
    // ...
];
```

#### Notes

* It's recommended to keep the `except` list empty or include only necessary cookies to ensure secure data transmission.
* If the `except` list is not properly configured, it may lead to data corruption or other security issues.