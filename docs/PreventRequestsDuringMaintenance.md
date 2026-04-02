```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Prevent Requests During Maintenance Middleware",
  "description": "A Laravel middleware to prevent requests during maintenance.",
  "type": "object",
  "properties": {
    "namespace": {
      "type": "string",
      "default": "App\\Http\\Middleware"
    },
    "class": {
      "type": "object",
      "properties": {
        "name": {
          "type": "string",
          "default": "PreventRequestsDuringMaintenance"
        },
        "extends": {
          "type": "string",
          "default": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance"
        }
      }
    },
    "except": {
      "type": "object",
      "properties": {
        "allowedURIs": {
          "type": "array",
          "items": {
            "type": "string"
          }
        }
      },
      "required": ["allowedURIs"]
    }
  }
}
```