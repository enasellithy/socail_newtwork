```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "ShareResource",
  "type": "object",
  "description": "Shared resource response",
  "properties": {
    "id": {
      "description": "Resource identifier",
      "type": "integer"
    },
    "user": {
      "$ref": "#/definitions/UserResource"
    }
  },
  "definitions": {
    "UserResource": {
      "$ref": "#/definitions/Resource"
    },
    "Resource": {
      "title": "Resource",
      "type": "object",
      "description": "Base resource response",
      "properties": {}
    }
  }
}
```

**Documentation**

# ShareResource Class

The `ShareResource` class is a custom JSON resource in Laravel, used to serialize share-related data for API responses.

## Properties

### id (integer)

Resource identifier.

### user (UserResource)

Serialized user resource.

#### UserResource

Serialized user data.

## Example Response

```json
{
  "id": 1,
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john.doe@example.com"
  }
}
```