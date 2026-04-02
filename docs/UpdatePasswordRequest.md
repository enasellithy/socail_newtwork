## Authentication JSON Request Definition

**Request Type:** `PUT Authentication/User/UpdatePassword`

**Request Body:**

```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Update User Password",
  "description": "Request body for updating user password",
  "type": "object",
  "required": ["email", "password", "password_confirm"],
  "properties": {
    "email": {
      "description": "User email",
      "type": "string",
      "format": "email",
      "required": true,
      "validations": {
        "type": "exist",
        "reference": {
          "path": "users",
          "column": "email"
        }
      }
    },
    "password": {
      "description": "User password",
      "type": "string",
      "format": "password",
      "required": true,
      "validations": [
        {
          "type": "min",
          "value": 6
        },
        {
          "type": "max",
          "value": 25
        }
      ]
    },
    "password_confirm": {
      "description": "User password confirmation",
      "type": "string",
      "required": true,
      "validations": [
        {
          "type": "same",
          "reference": {
            "path": "$.password"
          }
        }
      ]
    }
  },
  "validations": {
    "type": "object",
    "oneOf": [
      {
        "allOf": [
          {"required": ["email", "password"]},
          {"required": ["email", "password_confirm"]}
        ]
      }
    ]
  }
}
```

**Request Validation Errors:**

*   `invalid_email`: Email address is invalid.
*   `no_user_found`: User email does not exist.
*   `invalid_password_length`: Password must be between 6 and 25 characters.
*   `password_mismatch`: Password and password confirmation do not match.

**Status Codes:**

*   `200 OK`: Password updated successfully.
*   `400 Bad Request`: Password update failed due to invalid request data.
*   `401 Unauthorized`: Authentication failed.
*   `500 Internal Server Error`: Server encountered an unexpected error.