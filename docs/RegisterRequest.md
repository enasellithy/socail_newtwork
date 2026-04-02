```json
{
  "$schema": "https://json-schema.org/draft-07/schema#",
  "title": "Register Request",
  "description": "Validation rules for the user registration endpoint",
  "type": "object",
  "properties": {
    "name": {
      "type": "string",
      "description": "User's full name",
      "pattern": "^[a-zA-Z0-9 ]{3,25}$",
      "minLength": 3,
      "maxLength": 25
    },
    "email": {
      "type": "string",
      "description": "User's email address",
      "format": "email",
      "pattern": "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$",
      "maxLength": 100,
      "uniqueUser": true
    },
    "password": {
      "type": "string",
      "description": "User's password",
      "pattern": "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@*%^&])",
      "minLength": 6,
      "maxLength": 25
    },
    "password_confirm": {
      "type": "string",
      "description": "Confirmed password",
      "pattern": "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@*%^&])",
      "minLength": 6,
      "maxLength": 25
    }
  },
  "required": ["name", "email", "password", "password_confirm"],
  "anyOf": [
    {
      "not": {
        "properties": {
          "password": {"not": {}}
        }
      }
    },
    {
      "not": {
        "properties": {
          "password_confirm": {"not": {}}
        }
      }
    }
  ]
}
```