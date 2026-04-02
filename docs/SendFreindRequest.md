**Send Friend Request API Request Definition**
=============================================

**Overview**
------------

This document outlines the definition of the `SendFriendRequest` API request, which is used to validate the data sent when sending a friend request to another user.

**Request Properties**
---------------------

### JSON Schema Definition

```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Send Friend Request API Request",
  "type": "object",
  "properties": {
    "id": {
      "type": "integer",
      "description": "The ID of the user to whom the friend request is being sent.",
      "required": true
    }
  },
  "required": [
    "id"
  ],
  "additionalProperties": false
}
```

### Request Rules

| Property | Rule |
| --- | --- |
| `id` | `required`, `exists:users` |

**Error Handling**
-----------------

### Error Messages

| Error Code | Error Message |
| --- | --- |
| `id.required` | The `id` field is required. |
| `id.exists` | The specified `id` does not exist in the `users` table. |

### Exception Handling

When validation fails, an `HttpResponseException` is thrown with a JSON response containing the error message.

**Code Review**
---------------

```json
// Successful response example
{
  "errors": {}
}

// Failed response example
{
  "errors": {
    "id": ["The id field is required."]
  }
}
```

This JSON format provides a clear definition of the request properties and error handling for the `SendFriendRequest` API request, making it easier to understand and implement the validation logic in your application.