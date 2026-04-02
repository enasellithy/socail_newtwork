```json
{
  "$id": "Login Controller",
  "title": "Login",
  "description": "Controller for handling user authentication",
  "extends": "Controller",
  "uses": [
    {
      "$ref": "#/$defs/AuthService"
    },
    {
      "$ref": "#/$defs/JsonTrait"
    }
  ],
  "properties": {},
  "methods": {
    "login": {
      "description": "Handle user login request",
      "request": "LoginRequest",
      "endpoint": "POST /login",
      "response": {
        "$ref": "#/$defs/AuthService/login"
      }
    },
    "reset_password": {
      "description": "Handle user password reset request",
      "request": "ResetPasswordRequest",
      "endpoint": "POST /reset-password",
      "response": {
        "$ref": "#/$defs/AuthService/reset_password"
      }
    },
    "updatePassword": {
      "description": "Handle user password update request",
      "request": "UpdatePasswordRequest",
      "endpoint": "POST /update-password",
      "response": {
        "description": "Password update response",
        "$ref": "#/$defs/AuthService/updatePassword"
      }
    }
  }
}

{
  "$id": "AuthService",
  "title": "Authentication Service",
  "description": "Service for handling user authentication",
  "properties": {},
  "methods": {
    "login": {
      "description": "Handle user login",
      "endpoint": "POST /login",
      "response": {
        "description": "Login response",
        "type": "object",
        "properties": {
          "token": {
            "type": "string"
          }
        }
      }
    },
    "reset_password": {
      "description": "Handle user password reset",
      "endpoint": "POST /reset-password",
      "response": {
        "description": "Password reset response",
        "type": "object",
        "properties": {
          "token": {
            "type": "string"
          }
        }
      }
    },
    "updatePassword": {
      "description": "Handle user password update",
      "endpoint": "POST /update-password",
      "response": {
        "description": "Password update response",
        "type": "object"
      }
    }
  }
}

{
  "$id": "#/definitions/LoginRequest",
  "title": "Login Request",
  "description": "Request for handling user login",
  "required": [
    "email",
    "password"
  ],
  "properties": {
    "email": {
      "type": "string"
    },
    "password": {
      "type": "string"
    }
  }
}

{
  "$id": "#/definitions/ResetPasswordRequest",
  "title": "Reset Password Request",
  "description": "Request for handling user password reset",
  "required": [
    "email"
  ],
  "properties": {
    "email": {
      "type": "string"
    }
  }
}

{
  "$id": "#/definitions/UpdatePasswordRequest",
  "title": "Update Password Request",
  "description": "Request for handling user password update",
  "required": [
    "email",
    "oldPassword",
    "newPassword"
  ],
  "properties": {
    "email": {
      "type": "string"
    },
    "oldPassword": {
      "type": "string"
    },
    "newPassword": {
      "type": "string"
    }
  }
}
```