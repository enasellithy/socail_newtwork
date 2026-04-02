```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Verify CSRF Token Middleware",
  "description": "Laravel middleware to verify CSRF token",
  "type": "object",
  "properties": {
    "namespace": {
      "type": "string",
      "description": "Namespace for the middleware",
      "default": "App\Http\Middleware"
    },
    "class": {
      "type": "string",
      "description": "Name of the middleware class",
      "default": "VerifyCsrfToken"
    },
    "extends": {
      "type": "string",
      "description": "Parent middleware class to extend",
      "default": "Illuminate\Foundation\Http\Middleware\VerifyCsrfToken"
    },
    "except": {
      "type": "array",
      "description": "URIs to exclude from CSRF verification",
      "items": {
        "type": "string"
      },
      "default": []
    }
  },
  "required": [
    "class",
    "except"
  ]
}

```

```json
{
  "VerifyCsrfToken": {
    "description": "Verify CSRF token middleware",
    "namespace": "App\Http\Middleware",
    "class": "VerifyCsrfToken",
    "extends": "Illuminate\Foundation\Http\Middleware\VerifyCsrfToken",
    "except": []
  }
}
```

**Technical Documentation**

### VerifyCsrfToken Middleware

The `VerifyCsrfToken` middleware is a built-in Laravel middleware used to verify the CSRF token in incoming HTTP requests.

#### Properties

| Property        | Type          | Description                                         |
| :-------------- | :------------ | :--------------------------------------------------- |
| $except         | array         | URIs to exclude from CSRF verification              |

#### Usage

The `VerifyCsrfToken` middleware is automatically registered in the Laravel core and does not need to be manually imported or registered.

#### Configuration

The `VerifyCsrfToken` middleware does not require any specific configuration, but you can add URIs to the `$except` array to exclude certain requests from CSRF verification.

### Example Use Case

To exclude a specific URI from CSRF verification, add it to the `$except` array:
```php
'except' => [
    'api/v1/users/*',
]
```