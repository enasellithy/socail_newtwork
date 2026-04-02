```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Reset Password Request Validation",
  "description": "Validation rules for reset password request",
  "type": "object",
  "required": [
    "email"
  ],
  "properties": {
    "email": {
      "type": "string",
      "description": "User email address",
      "format": "email",
      "requirements": ["required", "exists:users"]
    }
  }
}

```
OR in technical documentation format:

## Reset Password Request Validation

### Overview

This API request validation is used to validate the password reset request data.

### Validation Rules

- `email`: 
  - **type**: `string`
  - **description**: User email address
  - **format**: `email`
  - **requirements**: `required`, `exists:users`