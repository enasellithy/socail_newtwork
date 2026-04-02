```json
// User Controller Definition (JSON format)

{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "User Controller",
  "description": "API end point to retrieve a list of admin users",
  "type": "object",
  "properties": {
    "index": {
      "description": "Retrieve a list of admin users",
      "type": "object",
      "properties": {
        "users": {
          "$ref": "#/definitions/User"
        },
        "filtered_users": {
          "$ref": "#/definitions/AdminUser"
        }
      }
    }
  },
  "definitions": {
    "User": {
      "description": "User model",
      "type": "array",
      "items": {
        "type": "object",
        "properties": {
          "id": {
            "type": "integer"
          },
          "name": {
            "type": "string"
          },
          "email": {
            "type": "string"
          },
          "is_admin": {
            "type": "boolean"
          }
        }
      }
    },
    "AdminUser": {
      "description": "List of admin users",
      "type": "array",
      "items": {
        "type": "object",
        "properties": {
          "id": {
            "type": "integer"
          },
          "name": {
            "type": "string"
          },
          "email": {
            "type": "string"
          },
          "is_admin": {
            "type": "boolean"
          }
        }
      }
    }
  }
}
```

```md
# User Controller Documentation
## API End Point: Retrieve list of admin users
### HTTP Method: GET
### Route: `/users/admin`

## Index Method
### Description: Retrieve a list of admin users from the database.
### Parameters: None

### Returns:
#### Users: An array of user models.
#### Filtered Users: An array of admin user models.

## Example Usage
```php
$users = User::all();
$filtered_users = $users->filter(fn ($user) => $user->isAdmin());
return $filtered_users;
```
```json
{
    "data": [
        {
            "id": 1,
            "name": "Admin User 1",
            "email": "admin1@example.com",
            "is_admin": true
        },
        {
            "id": 2,
            "name": "Admin User 2",
            "email": "admin2@example.com",
            "is_admin": true
        }
    ]
}
```
Note: This JSON response includes a basic skeleton for illustrating the definition. Depending on your actual application, you may want to include more properties or extend this structure.