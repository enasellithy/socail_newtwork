### Redirect If Authenticated Middleware Documentation

#### Overview

The Redirect If Authenticated middleware is responsible for redirecting authenticated users to the home page when requests are made to URLs that are not protected by authentication.

#### Request Handling

The middleware handles incoming requests and performs the following actions:

1. Retrieves the guards array from the `$guards` parameter, defaulting to `[null]` if not provided.
2. Iterates through each guard in the array.
3. Checks if the current guard contains a valid user session using the `Auth::guard($guard)->check()` method.
4. If a valid user session is detected, returns a `302 Redirect` response to the home page.
5. If no valid user session is detected, proceeds to the next middleware in the pipeline.

#### Request Parameters

| Parameter | Data Type | Description |
| --- | --- | --- |
| $request | Illuminate\Http\Request | The incoming request object. |
| $next | Closure | The next middleware or route function to execute. |
| $guards | array | An optional array of authentication guards to check. Default: `[null]`. |

#### Response

| Response Type | Description |
| --- | --- |
| \Symfony\Component\HttpFoundation\Response | A response object representing the result of the middleware handling. |

#### Implementation

The middleware implementation is as follows:

```json
{
  "$id": "https://example.com/middlewares/redirect_if_authenticated.json",
  "title": "Redirect If Authenticated Middleware",
  "type": "object",
  "properties": {
    "handle": {
      "description": "Handles incoming requests and redirects authenticated users to the home page.",
      "type": "object",
      "properties": {
        "request": {
          "description": "The incoming request object.",
          "type": "object",
          "$ref": "https://laravel.com/api/v8/Illuminate/Http/Request.html"
        },
        "next": {
          "description": "The next middleware or route function to execute.",
          "type": "object",
          "$ref": "https://laravel.com/api/v8/Illuminate/Routing/Middleware/Closure.html"
        },
        "guards": {
          "description": "An optional array of authentication guards to check.",
          "type": "array",
          "items": {
            "type": "string"
          }
        }
      },
      "required": ["request", "next", "guards"]
    }
  },
  "required": ["handle"]
}
```

This JSON representation provides a clear, concise, and human-readable definition of the middleware's functionality, parameters, and implementation details.