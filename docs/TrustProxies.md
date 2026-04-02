**Trust Proxies Middleware**

### Description

This is a Trust Proxies middleware used in Laravel to trust proxies and allow them to be detected through specific headers.

### Properties

| Property            | Type                        | Description                                   |
| -------------------- | ---------------------------- | --------------------------------------------- |
| `$proxies`           | `array<string> | null`  | Trusted proxies for this application.        |
| `$headers`           | `int`                       | Headers that should be used to detect proxies. |

### Configuration Options

#### `$proxies`

* Type: `array<string>` or `string` or `null`
* Description: An array of trusted proxy IP addresses or strings, or a single trusted proxy IP address or string.

### Example Configuration

```json
{
  "proxies": ["192.168.1.100", "192.168.1.101"],
  "headers": [
    "X-Forwarded-For",
    "X-Forwarded-Host",
    "X-Forwarded-Port",
    "X-Forwarded-Proto",
    "X-Forwarded-Aws-Elb"
  ]
}
```

### Usage

This middleware can be registered in the `kernel.php` file within the `app/Http/` directory.

```php
protected $middleware = [
    \App\Http\Middleware\TrustProxies::class,
];
```

### Technical Details

This middleware extends the built-in `TrustProxies` middleware in Laravel. It specifies the trusted proxies and headers that should be used to detect proxies. The `$proxies` property is used to store an array of trusted proxy IP addresses or strings, or a single trusted proxy IP address or string. The `$headers` property is used to store an array of headers that should be used to detect proxies.