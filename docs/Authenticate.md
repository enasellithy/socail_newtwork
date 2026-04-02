```json
{
  "middleware": "Authenticate",
  "namespace": "App\\Http\\Middleware",
  "extends": "Illuminate\\Auth\\Middleware\\Authenticate",
  "uses": [
    {
      "type": "class",
      "name": "Illuminate\\Http\\Request",
      "importedAs": "Request"
    }
  ],
  "methods": {
    "redirectTo": {
      "returnType": "?string",
      "parameters": [
        {
          "type": "class",
          "name": "Illuminate\\Http\\Request",
          "importedAs": "Request",
          "name": "$request"
        }
      ],
      "return": {
        "value": "$request->expectsJson() ? null : route('login');"
      },
      "description": "Get the path the user should be redirected to when they are not authenticated."
    }
  },
  "description": "Check if the user is authenticated.",
  "routes": {
    "login": {
      "name": "login",
      "description": "The route to redirect to when the user is not authenticated"
    }
  }
}
```