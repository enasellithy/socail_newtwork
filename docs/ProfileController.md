### Technical Documentation

#### Profile Controller
```markdown
# Overview
The Profile Controller is a Laravel API controller responsible for managing user profiles.

## API Endpoints

### Logout Endpoint

|| Method | URL                | Description   ||
|-------|--------------------|---------------|
| POST  | /logout            | Deletes the  user's tokens, effectively logging the user out. |

### Update Profile Endpoint

|| Method | URL                | Description   ||
|-------|--------------------|---------------|
| POST  | /updateProfile     | Updates the  user's profile with the provided details. |
```

#### API Endpoints Functions

### Logout Function
```json
{
  "$schema": "https://json-schema.org/draft-07/schema#",
  "title": "Logout Function",
  "type": "object",
  "properties": {
    "method": {
      "type": "string",
      "description": "HTTP method used for the logout request",
      "enum": ["POST"]
    },
    "url": {
      "type": "string",
      "description": "Endpoint URL for the logout request",
      "enum": ["/logout"]
    },
    "description": {
      "type": "string",
      "description": "Description of the logout endpoint"
    },
    "outcome": {
      "type": "string",
      "description": "Outcome of the logout request",
      "enum": ["Logout Done"]
    }
  }
}
```

### Update Profile Function
```json
{
  "$schema": "https://json-schema.org/draft-07/schema#",
  "title": "Update Profile Function",
  "type": "object",
  "properties": {
    "method": {
      "type": "string",
      "description": "HTTP method used for the update profile request",
      "enum": ["POST"]
    },
    "url": {
      "type": "string",
      "description": "Endpoint URL for the update profile request",
      "enum": ["/updateProfile"]
    },
    "description": {
      "type": "string",
      "description": "Description of the update profile endpoint"
    },
    "parameters": {
      "type": "array",
      "description": "JSON payload containing the user's profile details",
      "items": {"$ref": "#/definitions/ProfileUpdateParameters"}
    }
  },
  "definitions": {
    "ProfileUpdateParameters": {
      "type": "object",
      "properties": {
        "key": {
          "type": "string",
          "description": "User profile detail's key"
        },
        "value": {
          "type": "string",
          "description": "User profile detail's value"
        }
      }
    }
  }
}
```

#### Controller Functions

The Profile Controller uses the `AuthService` class to interact with the user's profile.
The `JsonTrait` is used for formatting the API responses.
The `auth()->user()` returns the current user instance and `tokens()->delete()` method is used to delete the user's tokens, effectively logging them out.